<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\Level;
use App\Model\Progress;
use App\Model\Score;
use App\Model\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Services\SendResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        try {
            $user = User::where('email', $request->email)->orWhere('username', $request->email)->first();
            if (!$user) {
                return SendResponse::fail('Akun anda tidak terdaftar', 200);
            } else {
                $check = Hash::check($request->password, $user->password);
                if (!$check) {
                    return SendResponse::fail('Password salah', 200);
                } else {
                    $data = [];
                    $data['token'] = $user->createToken('nApp')->accessToken;
                    $data['user'] = $user;
                    return SendResponse::success($data, 200);
                }
            }
        } catch (\Exception $e) {
            return SendResponse::fail('Gagal, karena: ' . $e->getMessage(), 500);
        }
    }

    public function loginProvider(Request $request, $provider)
    {
        try {
            $data = [];
            $user = User::where('email', $request->email)->first();
            if (!$user) {
                $user = $this->registerProvider($request);
                $data['created_new'] = true;
            } else {
                $data['created_new'] = false;
            }
            $data['token'] =  $user->createToken('nApp')->accessToken;
            $data['user'] = $user;

            return SendResponse::success($data, 200);
        } catch (\Exception $e) {
            return SendResponse::fail('Gagal, karena: ' . $e->getMessage(), 500);
        }
    }





    public function register(Request $request)
    {
        try {
            $checkEmail = User::where('email', $request->email)->first();
            if ($checkEmail) {
                return SendResponse::fail("Akun sudah terdaftar", 400);
            } else {
                $data = [];
                $data['email'] = $request['email'];
                $data['nama'] = $request['nama'];
                $data['tanggal_lahir'] = $request['tanggal_lahir'];
                $data['alamat'] = $request['alamat'];
                $data['pekerjaan'] = $request['pekerjaan'];
                $data['gender'] = $request['gender'];
                $data['foto_profil'] = null;
                $data['google_id'] = null;
                $data['username'] = $request['username'];
                $data['password'] = Hash::make($request['password']);
                $user = User::create($data);
                $score = Score::create([
                    'user_id' => $user->id,
                    'total_score' => 0
                ]);

                $data['user'] = $user;
                $data['score'] = $score;

                return SendResponse::success($data, 200);
            }
        } catch (\Exception $e) {
            return SendResponse::fail('Gagal, karena: ' . $e->getMessage(), 500);
        }
    }

    public function registerProvider($request)
    {
        $data = [];
        $data['email'] = $request['email'];
        $data['nama'] = $request['nama'];
        $data['tanggal_lahir'] = null;
        $data['alamat'] = null;
        $data['pekerjaan'] = null;
        $data['gender'] = null;
        $data['foto_profil'] = null;
        $data['google_id'] = $request['google_id'];
        $data['password'] = null;
        $user =  User::create($data);

        return $user;
    }

    public function checkUsername($username)
    {
        try {
            $data = [];
            $user = User::where('username', $username)->first();
            $data['username'] = $username;
            if ($user) {
                $data['terdaftar'] = true;
            } else {
                $data['terdaftar'] = false;
            }
            return SendResponse::success($data, 200);
        } catch (\Exception $e) {
            return SendResponse::fail('Gagal, karena: ' . $e->getMessage(), 500);
        }
    }


    public function getUserData(){

        try{
            $data = [];
            $user = User::find(Auth::user()->id);
            $score = Score::where('user_id', $user->id)->first();

            $progress_static =  $data["progress"] = $this->progressLevel(Progress::where('user_id', Auth::user()->id)->where('is_done', true)
            ->with(['challenge' => function ($query) {
                $query->where('daily', false);
            }])->get());;

        
            $rank = Score::orderBy('total_score', 'DESC')->with('user')->get();
            foreach($rank as $key => $us){
                if($us->user->id == $user->id){
                    $user['rank'] = $key+1;
                }
            }
            $data['user'] = $user;
            $data['score'] = $score;
            $data['progress'] = $progress_static;

            return SendResponse::success($data, 200);

        }catch(\Exception $e){

            return SendResponse::fail('Gagal, karena: ' . $e->getMessage(), 500);

        }
    }

    public function getRank(){
        try{

            $data = [];
            $data['rank'] = Score::orderBy('total_score', 'DESC')->with('user')->get();
            foreach($data['rank'] as $key => $us){
                $us['progress'] = Progress::where('user_id', $us->user->id)->with('challenge')->get();
                if($us->user->id == Auth::user()->id){
                    $data['current_user'] = $us['user'];
                    $data['current_user']['rank'] = $key +1;
                    $data['current_user']['progress'] =  Progress::where('user_id', $us->user->id)->with('challenge')->get();
                    $data['current_user']['score'] = Score::where('user_id', $us->user->id )->first();
                }
            }
            return SendResponse::success($data, 200);

        }catch(\Exception $e){
            return SendResponse::fail('Gagal, karena: ' . $e->getMessage(), 500);
        }
    }


    public function progressLevel($data)
    {

        $level_1 = 0;
        $level_2 = 0;
        $level_3 = 0;

        $progress = array();

        foreach ($data as $key => $dt) {
            $level = Level::find($dt->challenge->level_id)->level;
            $surah = Surah::find($dt->challenge->surah_id);
            $progress[$key]['surah']  = $surah;
            $progress[$key]['level'] = $level;
            if ($level == 1) {
                $level_1++;
                $progress[$key]['order_level'] = $level_1;
            }
            if ($level == 2) {
                $level_2++;
                $progress[$key]['order_level'] = $level_2;
            }
            if ($level == 3) {
                $level_3++;
                $progress[$key]['order_level'] = $level_3;
            }
        }


        return $progress;
    }

}
