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

Route::group(['middleware' => 'api'], function(){
    
    // index
    Route::get('/contact', 'API\ContactController@index');



    // axios
    // Get the data
    Route::get('/contact/all', 'API\ContactController@getData');

    // Insert new data
    Route::post('/contact', 'API\ContactController@store');

    // Show id data
    Route::get('/contact/{id}', 'API\ContactController@show');

    // Edit the id data
    Route::patch('/contact/{contact}', 'API\ContactController@update');

    // Delete the id data
    Route::delete('/contact/{contact}', 'API\ContactController@destroy');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
