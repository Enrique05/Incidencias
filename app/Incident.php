<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    protected $fillable = ["nameIncident","body"];
    //Un incidente tiene muchos comentarios
    public function comments(){
        return $this->hasMany(Comment::class);//La llave esta en comment    
    }
    //Un incidente tiene un status
    public function status(){
        return $this->belongsTo(Status::class);//La llave esta en incident
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    /*public function operator(){
        return $this->belongsTo(Operator::class);
    }*/
    
}
