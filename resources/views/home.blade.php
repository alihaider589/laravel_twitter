@extends('layouts.app')

@section('content')
<div class="container">
   <div id="example"></div>
   <hr>
   <h2>Following</h2>
   @foreach ($following as $users) 
  <li> <a href="{{route('users',$users)}}">{{$users->username}}</a></li>
       
   @endforeach
   <hr>
   <h2>Followers</h2>
   @foreach ($followers as $users) 
  <li> <a href="{{route('users',$users)}}">{{$users->username}}</a></li>
       
   @endforeach
   </div>
@endsection
