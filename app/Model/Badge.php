<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{

    protected $guarded = [
        'id',
	    'created_at',
	    'updated_at'
    ];
    //

    public function surah(){
        return $this->hasMany('App\Model\Surah');
    }

}
