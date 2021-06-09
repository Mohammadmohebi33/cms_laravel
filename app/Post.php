<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{


   // protected $fillable = ['user_id' , 'title' , 'post_image' , 'body'];

    protected $guarded  =  [] ;


    public  function user(){
        return $this->belongsTo(User::class) ;
    }

    public  function category(){

        return $this->belongsToMany(Category::class) ;
    }
}
