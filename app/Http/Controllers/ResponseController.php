<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResponseController extends Controller
{
    //

    public function successResponse($result=[], $message="success", $status_code=200) {

        $response = [
            'result' => $result,
            'message' => $message

        ];

        return response()->json($response, $status_code);
    }

    public function errorResponse($detail=[], $status_code=404) {

        $response = [
            'detail' => $detail

        ];

        return response()->json($response, $status_code);
    }
}
