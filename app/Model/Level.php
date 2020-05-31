<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    
    public function challenge(){
        return $this->hasMany('App\Model\Challenge');
    }
}
