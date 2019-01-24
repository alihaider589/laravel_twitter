<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


     //mass assigment 

    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [
        'password', 'remember_token',
    ];

    // public $appends=['avatar'];

    //has many relation ship kai aik user kai bht sary post ho skty hn 
public function posts(){
    return $this->hasMany(Post::class);

}





//user apny aap ko follow na krsky isliye ye function bnaya h 

public function isNotTheUser(User $user){
    return $this->id !== $user->id;
}


//ye wala function check kry ga kai aap user ko follow krskty ho ya nhi 
public function canFollow(user $user){

    if (!$this->isNotTheUser($user))
    {
        return false;
    }
    return !$this->isFollowing($user);
}

//ye wala function check kry ga kai agar tum phely sai user ko follow krrhy ho to wapis sai follow nhi krskty

public function isFollowing(User $user){

    return (bool) $this->following->where('id',$user->id)->count();
}


public function getRouteKeyname(){
    return 'username'; 
}

//check kry ga agar follow krrha h to unfollow krdy 

public function canunfollow(User $user){
    return $this->isFollowing($user);
}
//aik user bht sary users ko follow krskta h 
public function following(){

    return $this->belongsToMany(
        'App\User','follows','user_id','follower_id'
    );
}
//aik user bht bar follow hoskta h 
public function followers(){
      return $this->belongsToMany(   'App\User','follows','follower_id','user_id' );
}


}

