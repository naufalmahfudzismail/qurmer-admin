<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $guarded = [
        'id',
	    'created_at',
	    'updated_at'
    ];
    //
}
