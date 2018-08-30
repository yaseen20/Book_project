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


Route::group(['prefix' => 'book'], function () {
  Route::get('create', 'BookController@create');
  Route::post('create', ['as' => 'book.store' ,'uses' => 'BookController@store']);
  Route::get('all', ['as' => 'book.index', 'uses' => 'BookController@index']);
  Route::get('destroy/{id?}', ['as' => 'book.destroy', 'uses' => 'BookController@destroy']);
  Route::get('edit/{id}', ['as' => 'book.edit', 'uses' => 'BookController@edit']);
  Route::put('update/{id}', ['as' => 'book.update', 'uses' => 'BookController@update']);
});

Route::group(['prefix' => 'category'], function () {
  Route::get('create',['as'=>'catagory.show_cat',  'uses'=>'catContoller@show_cat']);
  Route::post('create',['as'=>'catagory.store','uses'=>'catContoller@store']);
  Route::put('update/{id}',['as'=>'catagory.update','uses'=>'catContoller@update']);
  Route::get('all', ['as' => 'catagory.index', 'uses' => 'catContoller@index']);
  Route::get('delet/{id}',['as' => 'catagory.destroy','uses' => 'catContoller@destroy']);
  Route::get('edit/{id}', ['as' => 'catagory.edit', 'uses' => 'catContoller@edit']);   
});


Route::group(['prefix'=>'library'],function(){
  Route::get('create',['as'=>'library.create','uses'=>'librController@create']);
  Route::post('create',['as'=>'library.store','uses'=>'librController@store']);
  Route::get('all', ['as' => 'library.index', 'uses' => 'librController@index']);
  Route::put('update/{id}', ['as' => 'library.update', 'uses' => 'librController@update']);
  Route::get('edit/{id}', ['as' => 'library.edit', 'uses' => 'librController@edit']);
  Route::get('delet/{id}',['as' => 'library.destroy','uses' => 'librController@destroy']);
  Route::get('show',['as' => 'library.show_info','uses' => 'librController@show_info']);

});
   











   //Route::get('lang/{lang?}',['as'=>'language.change','uses'=>'langContoller@change']);

