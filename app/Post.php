<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
//mass assigment 
    protected $fillable = ['body'];

    //user function 

    public function user(){
        return $this->belongsto(user::class);
    }

    //ye assending order mai post ko render karwaye ga 
    public function scopePosts($query)
{
    return $query->orderBy('created_at', 'asc')->get();
}
}
