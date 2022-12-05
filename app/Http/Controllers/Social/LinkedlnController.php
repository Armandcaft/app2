<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Exception;

class LinkedlnController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToLinkedln()
    {
        return Socialite::driver('linkedln')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleLinkedlnCallback()
    {
        try {

            $user = Socialite::driver('linkedln')->user();

            $finduser = User::where('linkedln_id', $user->id)->first();

            if($finduser){

                Auth::login($finduser);

                return redirect()->intended('dashboard');

            }else{
                $newUser = User::updateOrCreate([
                    'email' => $user->email
                ], [
                    'name' => $user->name,
                    'github_id'=> $user->id,
                    'password' => encrypt('password')
                ]);

                Auth::login($newUser);

                return redirect()->intended('dashboard');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
