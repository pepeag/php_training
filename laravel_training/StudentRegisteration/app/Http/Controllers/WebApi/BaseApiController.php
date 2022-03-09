<?php

namespace App\Http\Controllers\WebApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseApiController extends Controller
{
    public function successResponse($data=[], $message=null){
        return response()->json([
            "success" => true,
            "message" => $message,
            "data" => $data
        ]);
    }

    public function errorResponse($data=[], $status_code=200, $message=null){
        return response()->json([
            "success" => false,
            "message" => $message,
            "data" => $data
        ], $status_code);
    }
}
