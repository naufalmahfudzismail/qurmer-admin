<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\History;
use App\Model\Progress;
use App\Services\SendResponse;
use Auth;

class HistoryController extends Controller
{

    public function getAllHistory()
    {
        try {
            $data = History::where('activity_name', 'progress')->where('user_id', Auth::user()->id)->get();
            foreach($data as $dt){
                $dt['progress'] = Progress::find($dt->activity_id)->with(
                    'challenge',
                    'challenge.level',
                    'challenge.surah'
                );
            }
            return SendResponse::success($data, 200);
        } catch (\Exception $e) {
            return SendResponse::fail('Gagal, karena: ' . $e->getMessage(), 500);
        }
    }
}
