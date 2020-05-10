<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Surah extends Model
{
    protected $guarded = [
        'id',
	    'created_at',
	    'updated_at'
    ];
    //

    public function ayat(){
        return $this->hasMany('App\Model\Ayat');
    }

    public function audio(){
        return $this->hasOne('App\Model\Audio');
    }

    public function video(){
        return $this->hasMany('App\Model\Video');
    }
}
