<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\History;
use App\Model\Progress;
use App\Services\SendResponse;
use Illuminate\Http\Request;
use Auth;

class HistoryController extends Controller
{

    public function getAllHistory()
    {
        try {
            $data = History::where('activity_name', 'progress')->where('user_id', Auth::user()->id)
                ->orderBy('created_at', 'DESC')->get();
            foreach ($data as $dt) {
                $dt['progress'] = Progress::where('id', $dt->activity_id)->with(
                    'challenge',
                    'challenge.surah',
                    'challenge.level'
                )->first();
            }
            return SendResponse::success($data, 200);
        } catch (\Exception $e) {
            return SendResponse::fail('Gagal, karena: ' . $e->getMessage(), 500);
        }
    }
}
