<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class History extends Model
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
    
    public function progress(){
        return $this->belongsTo('App\Model\Progress', $this->activity_id);
    }

    /* public function audio(){

        return $this->belongsTo('App\Model\Audio', $this->activity_id)
                 ->where($this->activity_name, 'audio');
    }

    public function task(){

        return $this->belongsTo('App\Model\Task', $this->activity_id)
        ->where($this->activity_name, 'task');
    } */
}
