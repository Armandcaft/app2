<?php

namespace App\Http\Controllers\Social;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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

            // $d = Carbon::now();
            // $current_user = DB::update('UPDATE users SET email_verified_at = $d AND is_verified = true where google_id = $user->id', ['John']);

            if($current_user) {

                Auth::login($current_user);

            } else {
                $new_user = User::updateOrCreate([
                    'email' => $user->email
                ], [
                    'name' => $user->name,
                    'google_id' => $user->id,
                    'password' => encrypt('password'),
                    'email_verified_at' => Carbon::now(),
                    'is_verified' => true,
                ]);

                Auth::login($new_user);
                // Auth::register($new_user);
            }

            return redirect()->intended('dashboard');
        } catch(Exception $e) {
            // return redirect('welcome');
            dd($e->getMessage());
        }
    }
}
