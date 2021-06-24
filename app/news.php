<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class news extends Model
{


    protected $table    =   'news'   ;



    protected $guarded  =   []  ;

    public function user()
    {
        return  $this->belongsTo(User::class)   ;
    }


}
