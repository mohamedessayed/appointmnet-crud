<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;

class ApiResposeService
{
    public static function onSuccess($respose_data=[]) : JsonResponse {
        return response()->json([
            "status"=>true,
            "message"=>"success operation",
            "data" => $respose_data
        ]);
    }

    public static function onError($message, $respose_data= [],$code =400) : JsonResponse {
        return response()->json([
            "status"=>false,
            "message"=> $message,
            "data" => $respose_data
        ],$code);
    }
}
