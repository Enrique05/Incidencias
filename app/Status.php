<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    //Un estatus tiene muchos incidentes
    public function incidents(){
        return $this->hasMany(Incident::class);
    }
    
}
