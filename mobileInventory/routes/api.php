<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

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

Route::post('/user',[UserController::class,'create']);

Route::get('/user',[UserController::class,'getAllUsers']);

Route::get('/user/name/{name}',[UserController::class,'getUsersByName']);

Route::get('/user/mobile_number/{mobile_number}',[UserController::class,'getUsersByMobileNumber']);

Route::get('/user/email/{email}',[UserController::class,'getUsersByEmail']);

Route::delete('/user/mobile_number/{mobile_number}',[UserController::class,'deleteUsersByMobileNumber']);

Route::delete('/user/name/{name}',[UserController::class,'deleteUsersByName']);

Route::delete('/user/email/{email}',[UserController::class,'deleteUsersByEmail']);
