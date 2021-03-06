<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $fillable = [
//        'name', 'email', 'password',
//    ];

    protected $guarded  =  [] ;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function  posts(){
        return $this->hasMany(Post::class) ;
    }


    public function permissions(){
        return $this->belongsToMany(Permission::class) ;
    }

    public function roles(){
        return $this->belongsToMany(Role::class) ;
    }


    public function userHasRole($role_name){

        foreach ($this->roles as $role)
        {

            if ($role_name == $role->name)
            {
                return true ;
            }
        }

                return false ;

        }



    public function userHasPermission($permission_name)
    {
        foreach ($this->permissions as $permission)
        {
            if ($permission_name    ==  $permission->name)
            {
                return  true    ;
            }

        }

        return false    ;
    }


    public function  cats()
    {
        return $this->hasMany(Category::class) ;
    }


    public function news()
    {
        return  $this->hasMany(news::class) ;
    }



    public function message()
    {
        return $this->hasMany(Message::class)   ;
    }


    public function contact()
    {
        return$this->hasMany(Contact::class)    ;
    }

}
