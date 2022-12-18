<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;


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
    Route::get('/alumnos', [AlumnoController::class, 'getAll']);
    Route::get('/{id}' []);
    Route::post('/alumnos', [AlumnoController::class, 'create']);
    Route::delete('/alumnos/{id}', [AlumnoController::class, 'delete']);
    Route::middleware('validate.id')->delete('/{id}', [AlumnoController::class, 'delete']);
});


