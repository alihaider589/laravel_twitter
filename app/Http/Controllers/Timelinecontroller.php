<?php

namespace App\Http\Controllers;
use App\Post;
use Auth;

class Timelinecontroller extends Controller
{

 
    public function index(){
        $following = Auth::user()->following;
        $followers = Auth::user()->followers;
        return view('home',compact('following','followers'));
    }
}
