<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\MakeLoginRequest;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function index(): View
    {
        return view('auth.login');
    }

    public function authentication(MakeLoginRequest $request)
    {
        if ($request->attempt()) {
            return to_route('user.dashboard');
        }

        return back()->with(['message' => 'Invalid email or password']);
    }
}
