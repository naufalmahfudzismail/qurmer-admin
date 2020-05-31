<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\History;
use Auth;

class PlayListController extends Controller
{


    public function makePlaylist()
    {
    }

    public function getPlayList()
    {
    }

    public function recapHistory(Request $request)
    {
        try {

            $data_history = [];
            $data_history['activity_id'] = $request['surah_id'];
            $data_history['activity_name'] = 'audio';
            $data_history['user_id'] = Auth::user()->id;

            $history = History::create($data_history);
            $data['history'] = $history;

            return SendResponse::success($data, 200);
        } catch (\Exception $e) {
            return SendResponse::fail('Gagal, karena: ' . $e->getMessage(), 500);
        }
    }
}
