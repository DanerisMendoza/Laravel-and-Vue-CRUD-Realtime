<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/message',function(){
    return "Hello API's";
});

Route::get('/messageWithProperResponse',function(){
    return response()->json([
        'message' => 'Hello',
        'status code' => '200'
    ]);
});

//insert something to db 
            //api name  //user controller name //function name
Route::post('/createStudent', 'App\Http\Controllers\ApiController@create');

Route::get('/viewStudent', 'App\Http\Controllers\ApiController@viewStudent');

Route::get('/viewStudent/{id}', 'App\Http\Controllers\ApiController@viewStudentById');

Route::put('/updateStudentById/{id}', 'App\Http\Controllers\ApiController@updateStudentById');

Route::delete('/deleteStudentByFname/{Fname}', 'App\Http\Controllers\ApiController@deleteStudentByFname');

Route::delete('/deleteStudentById/{id}', 'App\Http\Controllers\ApiController@deleteStudentById');

Route::get('/getChecksum', 'App\Http\Controllers\ApiController@getChecksum');