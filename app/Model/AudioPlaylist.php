<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AudioPlaylist extends Model
{
    protected $table = "audio_playlist";


    public function playlist()
    {
        return $this->belongsTo('App\Model\Playlisth', $this->playlist_id);
    }

    public  function audio()
    {
        return $this->belongsTo('App\Model\Audio', $this->audio_id);
    }
}
