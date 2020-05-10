<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
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
}
