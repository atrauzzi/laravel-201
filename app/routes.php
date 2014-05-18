<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Typical rest style routing.
Route::get('/', 'Laravel201\Web\Controller\Image@index');
Route::get('/create', ['as' => 'image.create', 'uses' => 'Laravel201\Web\Controller\Image@create']);
Route::get('/{id}', ['as' => 'image.show', 'uses' => 'Laravel201\Web\Controller\Image@show']);
Route::post('/', ['as' => 'image.store', 'uses' => 'Laravel201\Web\Controller\Image@store']);
// Customized batch uploading.
Route::get('/batch-create', ['as' => 'image.batch_create', 'uses' => 'Laravel201\Web\Controller\Image@create']);
Route::post('/batch-create', ['as' => 'image.batch_store', 'uses' => 'Laravel201\Web\Controller\Image@store']);
