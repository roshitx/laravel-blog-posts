<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;


class RegisterController extends Controller
{
    public function index() 
    {
        // view register
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request)
    {
        // validate data
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => [ 'required', Password::min(3)->letters()->numbers()->uncompromised()],
        ]);

        // encrypt password
        $validatedData['password'] = Hash::make($validatedData['password']);

        // create new user
        User::create($validatedData);

        // redirect page login with flash message successfull
        return redirect('/login')->with('success', 'Registration successfull! Please login.');
    }
}
