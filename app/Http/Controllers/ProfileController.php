<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index(): View
    {
        return view('profile', ['user' => auth()->user()]);
    }

    public function update(ProfileRequest $request)
    {
        $user = auth()->user();
        $data = $request->validated();

       if ($file = $request->photo) {
           $data['photo'] = $file->store('photos', 'public');
       }

        $user->fill($data)->save();

        return back()->with(['message' => 'Profile updated successfully']);
    }
}
