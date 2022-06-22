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
    protected $fillable = [
        'name', 'role_id', 'email', 'password',
    ];

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


    public function incidents(){
        return $this->hasMany(Incident::class);
    }
    //Un usuario tiene un comentario a traves de un incident
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    // public function incidentComment(){
    //     return $this->hasOneThrough(Comment::class, Incident::class);   
    // }
    public function role(){
        return $this->belognsTo(Role::class);
    }
   /* public function operator(){
        return $this->hasOne(Operator::class);
    }*/
    
   
}
