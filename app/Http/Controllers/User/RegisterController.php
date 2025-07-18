<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.register');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $userAttributes = $request->validate([
        'name' => ['required'],
        'email' => ['required', 'email', 'unique:users,email'],
        'password' => ['required', 'confirmed', Password::min(6)],
        ]);

        $user = User::create($userAttributes);
        Auth::login($user);
        
        return redirect('/');
    }

}
