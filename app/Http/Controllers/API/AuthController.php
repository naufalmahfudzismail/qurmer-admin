<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Services\SendResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        try {
            $user = User::where('email', $request->email)->first();
            if(!$user){
                return SendResponse::fail('Akun anda tidak terdaftar', 200);
            }else{
                $check = Hash::check($request->password, $user->password);
                if(!$check){
                    return SendResponse::fail('Password salah', 200);
                }else{
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
            }else{
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
            //$request = $request->all();
            if ($checkEmail) {
                return SendResponse::fail("Email sudah terdaftar", 400);
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
                $data['password'] = Hash::make($request['password']);
                $user = User::create($data);
                //$data['token'] =  $user->createToken('nApp')->accessToken;

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

    public function userData()
    {
    }
}
