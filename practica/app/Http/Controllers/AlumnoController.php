<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlumnoController extends Controller
{
        
    public function getAll(Request $request){
        // return response()->json('Devuelvo todas las mascotas');
        $alumnos = DB::table('alumnos')->get();

        $response = [
            'success' => true,
            'message' => 'alumnos obtenidos correctamente',
            'data' => $alumnos
        ];
        return response()->json($response);
    }

    public function getById(Request $request, $id){
        //FROM pets
        DB::table('alumnos')->where('id', $id)->get();
        
        
    }

    public function create (Request $request) {
        // return response()->json('Creo una mascota');

        //name, age, chip

        $datos = $request->validate([
            'nombre' => 'required|string',
            'telefono' => 'required|string',
            'edad' => 'required|integer',
            'password' => 'required|string',
            'email' => 'required|string|unique:alumnos',
            'sexo' => 'required|string',

        ]);

        DB::table('alumnos')->insert($datos);

    }

    //si la ruta lleva un parametro, la funcion tambien tiene que recibirlo
    public function delete(Request $request, $id){
        
        //FROM pets
        DB::table('alumnos')
        //WHERE id=$id
        ->where('id', $id)
        //DELETE
        ->delete();
        // return response()->json('Borro una mascota con id ' . $id);
        
    }
}
