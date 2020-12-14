<?php

use Illuminate\Http\Request;

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


Route::get('sections', 'SectionController@index');

Route::prefix('section')->group(function() {
    Route::post('/add', 'SectionController@store');

    Route::prefix('{section_id}')->group(function() {
        Route::get('/', 'SectionController@show');
        Route::post('edit', 'SectionController@update');
        Route::post('delete', 'SectionController@delete');
    });

});