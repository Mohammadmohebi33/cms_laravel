<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    protected $table    =   'message'   ;
    protected $guarded  =   []  ;


    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
