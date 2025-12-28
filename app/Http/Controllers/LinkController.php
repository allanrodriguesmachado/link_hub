<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreLinkRequest;
use App\Http\Requests\UpdateLinkRequest;
use App\Models\Link;

class LinkController extends Controller
{
    public function create()
    {
        return view('link.create');
    }

    public function store(StoreLinkRequest $request)
    {
        auth()->user()->links()->create($request->validated());

        return to_route('user.dashboard')->with('success', 'Link created successfully');
    }

    public function edit(Link $link)
    {
        $this->authorize('authUpdate', $link);

        return view('link.edit', compact('link'));
    }

    public function update(UpdateLinkRequest $request, Link $link)
    {
        $this->authorize('authUpdate', $link);

        $link->fill($request->validated())->save();

        return to_route('user.dashboard')->with('success', 'Link updated successfully');
    }

    public function destroy(Link $link)
    {
        $link->delete();

        return to_route('user.dashboard')->with('success', 'Link deleted successfully');
    }

    public function up(Link $link)
    {
        $order = $link->sort;
        $newOrder = $order - 1;

        $user = auth()->user();

        $swapWith = $user->links()->where('sort', '=', $newOrder)->first();

        $link->fill(['sort' => $newOrder])->save();
        $swapWith->fill(['sort' => $order])->save();

        return back();
    }

    public function down(Link $link)
    {
        $order = $link->sort;
        $newOrder = $order + 1;

        $user = auth()->user();

        $swapWith = $user->links()->where('sort', '=', $newOrder)->first();

        $link->fill(['sort' => $newOrder])->save();
        $swapWith->fill(['sort' => $order])->save();

        return back();
    }
}
