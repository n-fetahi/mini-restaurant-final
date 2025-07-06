<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
        use ApiResponses;

    public function Login(LoginRequest $request)
    {
         $attributes = $request->validated();

        if (! Auth::attempt($attributes) ) {
            return $this->unauthorized('Sorry, those credentials do not match.');
        }

        /** @var \App\Models\User $user */
        $user = Auth::user();
        return $this->ok('Login successful',[
            'token' => $user->createToken('Toke For '. $user->email)->plainTextToken,
        ]);
}

    public function Logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return $this->ok('Logout successful');
    }

    public function register(Request $request){

        $userAttributes = $request->validate([
        'name' => ['required'],
        'email' => ['required', 'email', 'unique:users,email'],
        'password' => ['required', 'confirmed', Password::min(6)],
        ]);

        $user = User::create($userAttributes);
        Auth::login($user);

        return $this->created('Registered successful',[
            'token' => $user->createToken('Toke For '. $user->email)->plainTextToken,
        ] );

    }

}
