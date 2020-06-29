<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{


    protected $table = 'progress';
    protected $primaryKey = 'id';

    protected $guarded = [
        'id',
	    'created_at',
	    'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\Model\User', $this->user_id);
    }
    
    public function challenge()
    {
        return $this->belongsTo('App\Model\Challenge', $this->challenge_id);
    }
}
