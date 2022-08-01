<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ResponseController as ResponseController;
use Illuminate\Support\Facades\Auth;

class AuthController extends ResponseController
{
    //

    public function test() {


        return $this->successResponse('haylaaa', 'success', 200);

    }




    public function loginUser(Request $request) {
        if(!$request->has('nisn')) {
           
            return $this->errorResponse([
                "nisn" => "Nisn masih kosong"
            ],400);
        }
        if(!$request->has('password')) {
            // $errorDetail['password'] = "Password belum terisi";
            return $this->errorResponse([
                "password" => "password masih kosong"
            ] ,400);
        }

        $credentials = $request->only('nisn', 'password');

        if(!Auth::attempt($credentials)) {
           
            return $this->errorResponse([
                'nisn' => 'Nisn atau password salah'
            ], 403);
        }


    return $this->successResponse([], 'Successfuly login e book', 200);
    }
}
