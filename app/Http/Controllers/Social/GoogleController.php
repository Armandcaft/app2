<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Exception;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();

            /*
            // OAuth 2.0 providers...
            $token = $user->token;
            $refreshToken = $user->refreshToken;
            $expiresIn = $user->expiresIn;

            // OAuth 1.0 providers...
            $token = $user->token;
            $tokenSecret = $user->tokenSecret;

            // All providers...
            $user->getId();
            $user->getNickname();
            $user->getName();
            $user->getEmail();
            $user->getAvatar();
            */

            $current_user = User::where('google_id', $user->id)->first();

            if($current_user) {

                Auth::login($current_user);

                return redirect()->intended('dashboard');

            } else {
                $new_user = User::updateOrCreate([
                    'email' => $user->email
                ], [
                    'name' => $user->name,
                    'google_id' => $user->id,
                    'password' => encrypt('password'),
                ]);

                Auth::login($new_user);
                // Auth::register($new_user);

                return redirect()->intended('dashboard');
            }
        } catch(Exception $e) {
            // return redirect('welcome');
            dd($e->getMessage());
        }
    }
}
