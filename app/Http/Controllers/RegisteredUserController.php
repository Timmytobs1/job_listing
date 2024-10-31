<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class RegisteredUserController extends Controller
{

    public function create()
    {
        return view('auth.register');
    }
    public function store()
    {
        // Validate
        $attributes = request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email', 'max:254', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6', 'confirmed'], // Use 'min:6' directly
        ]);

        $user = User::create($attributes);

        Auth::login($user);

        return redirect('/jobs');

    }
}
