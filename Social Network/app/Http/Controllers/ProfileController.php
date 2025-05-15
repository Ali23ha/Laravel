<?php

namespace App\Http\Controllers;


use App\Models\User;

class ProfileController extends Controller
{
    public function profile(User $username)
    {

        return view('pages.profile',[
            'name' => $username->name,
            'posts' => $username->posts()->latest()->get()
        ]);

//        $Myposts = User::UserprofileWithPosts()->get();
//        return view('pages.profile', compact('Myposts'));


    }

}
