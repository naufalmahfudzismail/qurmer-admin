<?php

namespace App\Services;

class SendResponse
{
    public static function success($data, $code){
        $response['Error'] = false;
        $response['Message'] = 'success';
        $response['Data'] = $data;
        
        return response()->json($response, $code);
    }

    public static function delete(){
        $response['Error'] = false;
        $response['Message'] = 'success delete data';
        
        return response()->json($response,200);
    }

    public static function fail(String $message, $code){
        $response['Error'] = true;
        $response['Message'] = $message;
        
        return response()->json($response,$code);
    }

    public static function message(String $message, $code){
        $response['Error'] = false;
        $response['Message'] = $message;
        
        return response()->json($response, $code);
    }

    public static function successWithMeta($data, $meta, $code){
        $response['Error'] = false;
        $response['Message'] = 'success';
        $response['Data'] = $data;
        $response['Meta'] = $meta;
        
        return response()->json($response, $code);
    }
}
