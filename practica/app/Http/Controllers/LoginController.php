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
        // $data = $request->validate([
        //     'name' => 'required',
        //     'password' => 'required'
        // ]);

        if ($request->has('name')) {

            $data = $request->validate([
                'name' => 'required',
                'password' => 'required'
            ]);

        }else if($request->has('email')){
            
            $data = $request->validate([
                'email' => 'required',
                'password' => 'required'
            ]);
        }

        if (Auth::guard(name: 'api')->check()) { //guarda el token
            $response = [
                'success' => true,
                'message' => 'ya esta logueado',
                'data' => $data
            ];
            return response()->json($response); 

        }else if (Auth::attempt($data)) { // valida que existan las credenciales en la bd
            return Auth::user()->createToken("token"); //le crea el token al uruarios
        } 

        return 'Usuario no logged F';
    }

    public function whoAmI(Request $request)
    {
        return response()->json(Auth::guard('api')->user());
    }

    public function logout(Request $request)
    {
        Auth::guard(name: 'api')->user()->tokens()->delete(); //deletea todos los tokens del usuarios

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

