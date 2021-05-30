<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded  =  [] ;

    protected $table = 'categorys' ;



    public function user(){
       return $this->belongsTo(User::class) ;
    }
}
