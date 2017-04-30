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

use App\ResourceType;

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/citationstyles', 'CitationStyleController@index');
Route::get('/citationstyles/alternate', 'CitationStyleController@alternateIndex');
Route::post('/citationstyles/store', 'CitationStyleController@store');
Route::get('/citationstyles/{id}/edit', 'CitationStyleController@edit');
Route::get('/resourcetypes', 'ResourceTypeController@index');
Route::get('/resourcetypes/create', 'ResourceTypeController@create');
Route::get('/resourcetypes/{id}/edit', 'ResourceTypeController@edit');
Route::get('/resourcetypes/{id}',function($id){
    $types = ResourceType::where('citation_style_id', '=', $id)->get();
    return Response::json($types);
})->middleware('auth');
