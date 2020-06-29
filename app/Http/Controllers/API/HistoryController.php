<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\History;
use App\Services\SendResponse;
use Illuminate\Http\Request;
use Auth;

class HistoryController extends Controller
{

    public function getAllHistory()
    {
        try {
            $data = History::where('activity_name', 'progress')->where('user_id', Auth::user()->id)
                ->with(
                    'progress',
                    'progress.challenge',
                    'progress.challenge.surah',
                    'progress.challenge.level'
                )->get();
            return SendResponse::success($data, 200);
        } catch (\Exception $e) {
            return SendResponse::fail('Gagal, karena: ' . $e->getMessage(), 500);
        }
    }
}
