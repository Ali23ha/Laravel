<?php

namespace App\Http\Controllers;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use mysql_xdevapi\Exception;

class SocialiteController extends Controller
{

    public function googleLogin()
    {
        return socialite::driver('google')->redirect();
    }
    public function googleAuthentication()
    {
        try {
            $googleUser = socialite::driver('google')->user();
            $user = User::where('google_id', $googleUser->id)->first();

            if($user){
                auth()->login($user);
                return redirect()->route('Index-post-trainee');
            } else {
                $userData = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'password' => bcrypt('12341234'),
                    'google_id' => $googleUser->id
                ]);
            };

            if($userData){
                auth()->login($userData);
                return redirect()->route('Index-post-trainee');
            }

        }catch (Exception $e){
            dd($e);
        }

    }

}
