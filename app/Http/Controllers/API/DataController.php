<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\Audio;
use App\Model\Ayat;
use App\Model\Badge;
use App\Services\SendResponse;
use App\Model\Surah;
use Faker\Provider\Base;

class DataController extends Controller
{
    public function getSurahAndAyat($surah_id){
        try{
            $data['surat'] = Surah::find($surah_id)->nama;
            $data['ayat'] = Ayat::where('surah_id', $surah_id)->get();
            return SendResponse::success($data, 200);
        }catch(\Exception $e){
            return SendResponse::fail($e->getMessage(), 500);
        }
    }

    public function getSurahBadge($badge_id){
        try{
            $data['badge'] = Badge::find($badge_id)->nama;
            $data['surah'] = Surah::where('badge_id', $badge_id)->get();
            return SendResponse::success($data, 200);

        }catch(\Exception $e){
            return SendResponse::fail($e->getMessage(), 500);
        }
    }

    public function getQuote(){
        try{
            $data['quote'] = Quote::all();
            return SendResponse::success($data, 200);

        }catch(\Exception $e){
            return SendResponse::fail($e->getMessage(), 500);
        }
    }

    public function getAllAudioSurah(){
        try{
            $data['audio'] = Audio::with('surah')->get();
            $data['ayat'] = Ayat::all();
            return SendResponse::success($data, 200);

        }catch(\Exception $e){
            return SendResponse::fail($e->getMessage(), 500);
        }
    }

    public function getAudioBySurah($surah_id){
        try{
            $data['surah_name'] = Surah::find($surah_id)->name;
            $data['surah_id'] = $surah_id;
            $data['audio'] = Audio::with('surah', $surah_id);
            return SendResponse::success($data, 200);

        }catch(\Exception $e){
            return SendResponse::fail($e->getMessage(), 500);
        }
    }

    public function getAudioByLevel($badge_id){
        try{
            $data['audio'] = Audio::with('surah')->where('badge_id', $badge_id)->get();
            return SendResponse::success($data, 200);

        }catch(\Exception $e){
            return SendResponse::fail($e->getMessage(), 500);
        }
    }
}
