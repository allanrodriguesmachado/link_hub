<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class BioLinkController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(User $user)
    {
        return view('bio_link', compact('user'));
    }
}
