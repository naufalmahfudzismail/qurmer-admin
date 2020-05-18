<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;


class MediaController extends Controller{


    public function downloadAudio($file){
        $path = public_path() . '/audio-asset/'.$file;
        return response()->file($path);
    }

    public function downloadVideo($file){
        $path = public_path() . '/video-asset/'.$file;
        return response()->file($path);
    }

}



