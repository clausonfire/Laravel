<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    
    public function getAllSubject(Request $request){
        // return response()->json('Devuelvo todas las mascotas');
        $subjects = DB::table('subjects')->get();

        $response = [
            'success' => true,
            'message' => 'asignaturas obtenidos correctamente',
            'data' => $subjects
        ];
        return response()->json($response);
    }

    public function getById(Request $request, $id){
        //FROM pets
        return DB::table('subjects')->where('id', $id)->get();
        
        
    }

    public function createSubject (Request $request) {
        // return response()->json('Creo una mascota');

        //name, age, chip

        $datos = $request->validate([
            'nombre' => 'required|string'
        ]);

        DB::table('subjects')->insert($datos);

    }

    //si la ruta lleva un parametro, la funcion tambien tiene que recibirlo
    public function deleteSubject(Request $request, $id){
        
        //FROM pets
        DB::table('subjects')
        //WHERE id=$id
        ->where('id', $id)
        //DELETE
        ->delete();
        // return response()->json('Borro una mascota con id ' . $id);   
    }

    public function teacher(Request $request, $id){
        $subject = Subject::findorFail($id);
        return response()->json($subject->teacher);
    }





}
