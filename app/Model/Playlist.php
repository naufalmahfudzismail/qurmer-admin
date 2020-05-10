<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $guarded = [
        'id',
	    'created_at',
	    'updated_at'
    ];
    //

    public function user()
    {
        return $this->belongsTo('App\Model\User', $this->user_id);
    }
}
