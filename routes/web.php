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

Route::get('/', function(){

    return view('layout');
});
Route::get('/recursiveTree',['uses'=>'CatController@recursiveTree']);

Route::get('/iterativeTree',['uses'=>'CatController@iterativeTree']);
/*{
    return View::make('layout');
});*/

//Route::get('category-tree-view',['uses'=>'CatController@manageCategory']);


//Route::post('create', 'CatController@create');

Route::post('create',['as'=>'create.new','uses'=>'CatController@create']);


