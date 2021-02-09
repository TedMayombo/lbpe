<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Models\Message;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('messages', function() {
    // If the Content-Type and Accept headers are set to 'application/json', 
    // this will return a JSON structure. This will be cleaned up later.
    return Message::all(); });
 
Route::get('messages/{id}', function($id) {
    return Message::find($id); });

Route::post('messages', function(Request $request) {
    return Message::create($request->all); });

Route::put('messages/{id}', function(Request $request, $id) {
    $message = Message::findOrFail($id);
    $message->update($request->all());
    return $message;
});

Route::delete('messages/{id}', function($id) {
    Message::find($id)->delete();
    return 204;
});

/*Route::get('messages', 'MessageController@index');
Route::get('messages/{message}', 'MessageController@show');
Route::post('messages', 'MessageController@store');
Route::put('messages/{message}', 'MessageController@update');
Route::delete('messages/{message}', 'MessageController@delete');*/

Route::get('messages', 'App\Http\Controllers\MessageController@index');
Route::get('messages/{id}', 'App\Http\Controllers\MessageController@show');
Route::post('messages', 'App\Http\Controllers\MessageController@store');
Route::put('messages/{id}', 'App\Http\Controllers\MessageController@update');
Route::delete('messages/{id}', 'App\Http\Controllers\MessageController@delete');
Route::post('register', 'App\Http\Controllers\Auth\RegisterController@register');
Route::post('login', 'App\Http\Controllers\Auth\LoginController@login');
Route::post('logout', 'App\Http\Controllers\Auth\LoginController@logout');
