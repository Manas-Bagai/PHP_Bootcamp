<?php

use App\Models\User;
use GuzzleHttp\Promise\Create;
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

Route::post('/user',function(Request $request){
    User::create($request->all());
    return 200;
});

Route::get('/user',function(){
    return User::all();
});

Route::get('/user/{id}',function($id){
    return User::find($id);
});

Route::delete('/user/{id}',function($id){
    User::find($id)->delete();
    return 204;
});