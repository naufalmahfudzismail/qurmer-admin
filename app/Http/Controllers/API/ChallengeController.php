<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\Challenge;
use App\Services\SendResponse;

class ChallengeController extends Controller{

    public function getChallenge(){
        try{
            $data  = Challenge::with('surah')->get();
            return SendResponse::success($data, 200);
        }catch( \Exception $e){
            return SendResponse::fail('Gagal, karena: ' . $e->getMessage(), 500);
        }
    }


    public function getDailyChallenge(){
        try{
            $data  = Challenge::with('surah')->where('daily', true)->get();
            return SendResponse::success($data, 200);
        }catch( \Exception $e){
            return SendResponse::fail('Gagal, karena: ' . $e->getMessage(), 500);
        }
    }


    public function joinChallenge(){
        try{
            $data  = Challenge::with('surah')->get();
            return SendResponse::success($data, 200);


        }catch( \Exception $e){
            return SendResponse::fail('Gagal, karena: ' . $e->getMessage(), 500);
        }
    }

    
}