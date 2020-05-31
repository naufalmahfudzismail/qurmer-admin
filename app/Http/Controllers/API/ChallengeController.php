<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\Challenge;
use App\Model\History;
use App\Model\Progress;
use App\Model\Score;
use App\Services\SendResponse;
use Illuminate\Http\Request;
use Auth;

class ChallengeController extends Controller
{

    public function getChallenge()
    {
        try {
            $data  = Challenge::with('surah')->get();
            return SendResponse::success($data, 200);
        } catch (\Exception $e) {
            return SendResponse::fail('Gagal, karena: ' . $e->getMessage(), 500);
        }
    }


    public function getDailyChallenge()
    {
        try {
            $data  = Challenge::with('surah')->where('daily', true)->get();
            return SendResponse::success($data, 200);
        } catch (\Exception $e) {
            return SendResponse::fail('Gagal, karena: ' . $e->getMessage(), 500);
        }
    }


    public function joinChallenge(Request $request)
    {
        try {

            $data = [];
            $data_history = [];

            $data['challenge_id'] = $request['challenge_id'];
            $data['user_id'] = Auth::user()->id;
            $data['is_done'] = false;

            $data_history['activity_id'] = $request['challenge_id'];
            $data_history['activity_name'] = 'challenge';
            $data_history['user_id'] = Auth::user()->id;

            $progress = Progress::create($data);
            $history = History::create($data_history);

            $data['progress'] = $progress;
            $data['history'] = $history;

            return SendResponse::success($data, 200);
        } catch (\Exception $e) {
            return SendResponse::fail('Gagal, karena: ' . $e->getMessage(), 500);
        }
    }


    public function afterChallenge(Request $request)
    {
        try {
            $data = [];
            $progress = Progress::find($request['challenge_id']);
            $score = Score::find(Auth::User()->id);

            $progress->is_done = true;
            $score->total_score = $score->total_score + $request['challenge_score'];

            $result = $progress->save();
            $result_score = $score->save();

            $data['result'] = $result;
            $data['score'] = $result_score;

            return SendResponse::success($result, 200);
        } catch (\Exception $e) {
            return SendResponse::fail('Gagal, karena: ' . $e->getMessage(), 500);
        }
    }
}
