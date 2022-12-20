<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('alumno','App\Http\Controllers\alumnocontroller@getAlumno');

Route::get('alumno/{id}','App\Http\Controllers\alumnocontroller@getAlumnoxid');

Route::post('addAlumno','App\Http\Controllers\alumnocontroller@insertAlumno');

Route::put('updateAlumno/{id}','App\Http\Controllers\alumnocontroller@updateAlumno');

Route::delete('deleteAlumno/{id}','App\Http\Controllers\alumnocontroller@deleteAlumno');
