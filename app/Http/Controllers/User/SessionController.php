<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
        /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (! Auth::attempt($attributes) || Auth::user()->role) {
            throw ValidationException::withMessages([
                'error' => 'Sorry, those credentials do not match.',
            ]);

        }

        request()->session()->regenerate();
        return redirect('/');   
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }
}
