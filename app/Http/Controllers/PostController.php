<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
public function index(Request $request,Post $post){

    
    $allPosts = $post->whereIn('user_id', $request->user()->following()->pluck('follower_id')->push($request->user()->id))->with('user');
    // dd($allpost->get());

$posts= $allPosts->orderBy('created_at', 'desc')->get();

return response()->json([
    'posts' => $posts,
]);
}

    public function create(Request $request, Post $post){
      //Yahan Post create ki request mang rha h! 
       $CreatedPost = $request->user()->posts()->create([
            'body' => $request->body,
        ]);
//ye json ki request mang rha h sary posts ki 
        return response()->json($post->with('user')->find($CreatedPost->id));
    }
}
