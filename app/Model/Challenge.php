<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    protected $guarded = [
        'id',
	    'created_at',
	    'updated_at'
    ];
    //

    public function surah(){
        return $this->belongsTo('App\Model\Surah', $this->surah_id);
    }

    public function level(){
        return $this->belongsTo('App\Model\Level'. $this->level_id);
    }

}
