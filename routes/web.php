<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/citationstyles', 'CitationStyleController@index');
Route::get('/citationstyles/create', 'CitationStyleController@create');
Route::get('/citationstyles/{photo}/edit', 'CitationStyleController@edit');
Route::get('/resourcetypes', 'ResourceTypeController@index');
Route::get('/resourcetypes/create', 'ResourceTypeController@create');
Route::get('/resourcetypes/{photo}/edit', 'ResourceTypeController@edit');
