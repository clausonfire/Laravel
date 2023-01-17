<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    public function getAllTeacher(Request $request){
        // return response()->json('Devuelvo todas las mascotas');
        $teachers = DB::table('teachers')->get();

        $response = [
            'success' => true,
            'message' => 'profesores obtenidos correctamente',
            'data' => $teachers
        ];
        return response()->json($response);
    }

    public function getById(Request $request, $id){
        //FROM pets
        return DB::table('teachers')->where('id', $id)->get();
        
        
    }

    public function createTeacher (Request $request) {
        // return response()->json('Creo una mascota');

        //name, age, chip

        $datos = $request->validate([
            'nombre' => 'required|string',
            'asignatura' => 'required|string',
            'telefono' => 'required|string',
            'edad' => 'required|integer',
            'password' => 'required|string',
            'email' => 'required|string|unique:alumnos',
            'sexo' => 'required|string',

        ]);

        DB::table('teachers')->insert($datos);

    }

    //si la ruta lleva un parametro, la funcion tambien tiene que recibirlo
    public function deleteTeacher(Request $request, $id){
        
        //FROM pets
        DB::table('teachers')
        //WHERE id=$id
        ->where('id', $id)
        //DELETE
        ->delete();
        // return response()->json('Borro una mascota con id ' . $id);
        
    }


    public function alumnos(Request $request, $id){
        $teacher = Teacher::findorFail($id);
        return response()->json($teacher->alumno);
    }
    public function subject(Request $request, $id){
        $teacher = Teacher::findorFail($id);
        return response()->json($teacher->subject);
    }
    
}
