<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{
    public function index(User $user){

        return view('users.index',compact("user"));

    }
    
    public function follow(Request $request ,User $user )
    {
        if ($request->user()->CanFollow($user)) {

            $request->user()->Following()->attach($user->id);
        }
        return redirect()->back();
    }

    public function unfollow(Request $request ,User $user )
    {
        if ($request->user()->canunFollow($user)) {

            $request->user()->Following()->detach($user->id);
        }
        return redirect()->back();
    }


}
