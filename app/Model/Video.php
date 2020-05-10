<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $guarded = [
        'id',
	    'created_at',
	    'updated_at'
    ];
    //

    public function surah()
    {
        return $this->belongsTo('App\Model\Surah', $this->surah_id);
    }
}
