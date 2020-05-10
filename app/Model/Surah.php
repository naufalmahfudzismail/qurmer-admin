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
}
