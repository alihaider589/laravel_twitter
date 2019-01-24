@extends('layouts.app')

@section('content')
<div class="container">
 <h2> {{$user->username}}</h2>
 <hr> 
 @if (Auth::user()->isNotTheUser($user))
    
   @if (Auth::user()->isFollowing($user))
     <a href="{{route('users.Unfollow',$user)}}">Unfollow</a>
  @else
     <a href="{{route('users.follow', $user)}}">Follow</a>
 @endif


 @endif


 <center><h4>Recent Tweets</h4></center>
 <hr>
 @foreach ($user->posts as $post)
 <center>
 <div class="col-md-8 card text-left">
  <div class="card-body">
  <p>{{$post->created_at}}</p>
  <h4 class="card-text">{{$post->body}}</h4>
  </div>
</div>
 </center> <br>
 @endforeach

 
</div>

@endsection
