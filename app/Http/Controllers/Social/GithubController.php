<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Exception;

class GithubController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGithubCallback()
    {
        try {

            $user = Socialite::driver('github')->user();

            $finduser = User::where('github_id', $user->id)->first();

            if($finduser){

                Auth::login($finduser);

                return redirect()->intended('dashboard');

            }else{
                $newUser = User::updateOrCreate([
                    'github_id'=> $user->id,
                ], [
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => encrypt('password'),
                    // 'github_token' => $user->token,
                    // 'github_refresh_token' => $user->refreshToken,
                ]);

                Auth::login($newUser);

                return redirect()->intended('dashboard');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
