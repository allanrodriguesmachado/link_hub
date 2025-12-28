<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\MakeRegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function index(): View
    {
        return view('auth.register');
    }

    public function store(MakeRegisterRequest $request)
    {
        if ($user = $request->registerUser()) {
            Auth::login($user);

            return to_route('user.dashboard');
        }

        return back()->with(['message' => 'Invalid email or password']);
    }
}
