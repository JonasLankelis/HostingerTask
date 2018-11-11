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

Route::get('/', ['uses'=>'CatController@recursiveTree']);
Route::get('recursiveTree',['uses'=>'CatController@manageCategory']);
/*{
    return View::make('layout');
});*/

//Route::get('category-tree-view',['uses'=>'CatController@manageCategory']);


//Route::post('create', 'CatController@create');

Route::post('create',['as'=>'create.new','uses'=>'CatController@create']);


