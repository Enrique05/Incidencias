<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //Un comentario pertenece a un usuario
    /*public function user(){
        return belongTo(User::class);
    }*/
    public function incident(){
        return $this->belongsTo(Incident::class);
    }
    
    public function user(){
    	 return $this->belongsTo(User::class);
    }
}
