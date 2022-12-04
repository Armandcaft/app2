<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

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
