<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function login(Request $request)
    {
        // return 'Soy el metodo login';
        $data = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard(name: 'sanctum')->check()) {
            $response = [
                'success' => true,
                'message' => 'ya esta logueado',
                'data' => $data
            ];
            return response()->json($response); 

        }else if (Auth::attempt($data)) {
            return Auth::user()->createToken("token");
        } 

        return 'Usuario no logged F';
    }

    public function whoAmI(Request $request)
    {
        return response()->json(Auth::guard('sanctum')->user());
    }

    public function logout(Request $request)
    {
        Auth::guard(name: 'sanctum')->user()->tokens()->delete();

        $response = [
            'success' => true,
            'message' => 'ha cerrado sesion',
            'data' => ''
        ];
        return response()->json($response);
    }

    public function noidentified(Request $request)
    {
        $response = [
            'success' => true,
            'message' => 'mensaje randommm',
            'data' => null
        ];
        return response()->json($response); 
    }

}

