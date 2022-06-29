<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\PutovanjeController;
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
Route::get('paketi','App\Http\Controllers\PaketController@getAll');
Route::get('paketi/{id}','App\Http\Controllers\PaketController@getById');
Route::post('paketi', 'App\Http\Controllers\PaketController@save');
Route::delete('paketi/{id}', 'App\Http\Controllers\PaketController@delete');
Route::get('putovanja', 'App\Http\Controllers\PutovanjeController@getAll');
Route::get('putovanja/{id}', 'App\Http\Controllers\PutovanjeController@getById');
Route::post('putovanja', 'App\Http\Controllers\PutovanjeController@save');
Route::delete('putovanja/{id}', 'App\Http\Controllers\PutovanjeController@delete');
Route::get('rezervacije', 'App\Http\Controllers\RezervacijeController@getAll');
Route::post('rezervacije', 'App\Http\Controllers\RezervacijeController@save');
Route::delete('rezervacije/{id}', 'App\Http\Controllers\RezervacijeController@delete');
Route::get('rezervacije/{id}', 'App\Http\Controllers\RezervacijeController@getById');
Route::post('register','App\Http\Controllers\API\AuthController@register');
Route::post('login','App\Http\Controllers\API\AuthController@login');
Route::group(['middleware'=>['auth-sanctum']],function(){
    Route::get('/profile',function(Request $request){
        return auth()->user();
    });
    Route::resource('putovanja',PutovanjeController::class)->only(['save']);
    
});


