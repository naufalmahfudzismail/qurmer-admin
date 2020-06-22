<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\Level;
use App\Model\Challenge;
use App\Model\History;
use App\Model\Progress;
use App\Model\Score;
use App\Model\Surah;
use App\Services\SendResponse;
use Illuminate\Http\Request;
use Auth;

class ChallengeController extends Controller
{

    public function getChallenge()
    {
        try {
            $data = [];
            $data["level1"] = Challenge::where('daily', false)->with('level', 'surah')
                ->where('level_id', 1)->orWhere('level_id', 2)
                ->get();
            $data["level2"] = Challenge::where('daily', false)->with('level', 'surah')
                ->where('level_id', 3)->orWhere('level_id', 4)
                ->orWhere('level_id', 5)->orWhere('level_id', 6)
                ->get();
            $data["level3"] = Challenge::where('daily', false)->with('level', 'surah')
                ->where('level_id', 7)->orWhere('level_id', 8)
                ->get();

            $data["progress_challenge"] = $this->progressLevel(Progress::where('user_id', Auth::user()->id)
                        ->with(['challenge' => function ($query) {
                            $query->where('daily', false);
                        }])->get());

            return SendResponse::success($data, 200);

        } catch (\Exception $e) {
            return SendResponse::fail('Gagal, karena: ' . $e->getMessage(), 500);
        }
    }

    public function progressLevel($data)
    {

        $level_1 = 0;
        $level_2 = 0;
        $level_3 = 0;

        foreach($data as $dt){
            dd($dt);
            $level = Level::find($dt->challenge->level_id)->level;
            if($level == 1) $level_1++;
            if($level == 2) $level_2++;
            if($level == 3) $level_3++;
        }

        $progress = [];

        $progress['level_1'] = $level_1;
        $progress['level_2'] = $level_2;
        $progress['level_3'] = $level_3;

        return $progress;

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

            $data['progress_id'] = $progress->id;
            $data['history_id'] = $history->id;

            $data['challenge_score'] = $this->getTotalScoreChallenge($request['challenge_id']);

            return SendResponse::success($data, 200);
        } catch (\Exception $e) {
            return SendResponse::fail('Gagal, karena: ' . $e->getMessage(), 500);
        }
    }


    public function afterChallenge(Request $request)
    {
        try {
            $data = [];
            $progress = Progress::find($request['progress_id']);
            $score = Score::where('user_id', Auth::User()->id)->first();
            $final_score = $this->getTotalScoreChallenge($request['challenge_id']);
            if ($progress->is_done) {
                return SendResponse::fail('Challenge Sudah Dilakukan', 404);
            } else {
                $progress->is_done = true;
                $score->total_score = $score->total_score + $final_score;
                $result = $progress->save();
                $result_score = $score->save();
                if ($result and $result_score) {
                    $data['progress_status'] = $progress->is_done;
                    $data['final_score'] = $score->total_score;
                    return SendResponse::success($data, 200);
                } else {
                    return SendResponse::fail('Gagal, coba beberapa saat lagi', 404);
                }
            }
        } catch (\Exception $e) {
            return SendResponse::fail('Gagal, karena: ' . $e->getMessage(), 500);
        }
    }


    

    function getTotalScoreChallenge($challenge_id)
    {
        $challenge = Challenge::find($challenge_id);
        $level_score = Level::find($challenge->level_id)->bonus_score;
        $challenge_score = $challenge->score;
        $final_score = $challenge_score + $level_score;
        return $final_score;
    }
}
