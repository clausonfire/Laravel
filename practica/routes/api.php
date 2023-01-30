<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/alumnos')->group(function() {
    Route::get('', [AlumnoController::class, 'getAll']);
    Route::middleware('validate.id')->get('/{id}', [AlumnoController::class, 'getById']);
    Route::middleware('validate.id')->get('/{id}/teacher', [AlumnoController::class, 'teacher']);
    // Route::get('/{id}' []);
    Route::post('', [AlumnoController::class, 'create']);
    Route::middleware('validate.id')->delete('/{id}', [AlumnoController::class, 'delete']);
});

Route::prefix('/teachers')->group(function() {
    Route::get('', [TeacherController::class, 'getAllTeacher']);
    Route::middleware('validate.id')->get('/{id}', [TeacherController::class, 'getById']);
    Route::middleware('validate.id')->get('/{id}/alumnos', [TeacherController::class, 'alumnos']);
    Route::middleware('validate.id')->get('/{id}/subject', [TeacherController::class, 'subject']);
    // Route::get('/{id}' []);
    Route::post('', [TeacherController::class, 'createTeacher']);
    Route::middleware('validate.id')->delete('/{id}', [TeacherController::class, 'deleteTeacher']);
});

Route::prefix('/subjects')->group(function() {
    Route::get('', [SubjectController::class, 'getAllSubject']);
    Route::middleware('validate.id')->get('/{id}', [SubjectController::class, 'getById']);
    Route::middleware('validate.id')->get('/{id}/teachers', [SubjectController::class, 'teacher']);
    // Route::get('/{id}' []);
    Route::post('', [SubjectController::class, 'createSubject']);
    Route::middleware('validate.id')->delete('/{id}', [SubjectController::class, 'deleteSubject']);
});

Route::post('/login', [LoginController::class, 'login']);
Route::middleware('islogged')->get('/me', [LoginController::class, 'whoAmI']);

Route::middleware('islogged')->post('/logout', [LoginController::class, 'logout']);

Route::get('/noidentify', [LoginController::class, 'noidentified']);
