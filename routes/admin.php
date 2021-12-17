<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Admins
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


define('PAGINATION_COUNT',10);

Route::group(['namespace' => 'Admin','middle ware' => 'auth:admin'],function(){
    Route::get('/','DashbordController@index')->name('admin.dashbord');


    ########################### Begin Routing Languages ########################

    Route::group(['prefix' => 'language'],function()
    {
        Route::get('/','LangaugesController@index')->name('admin.language');
        Route::get('/create','LangaugesController@create')->name('admin.language.create');
        Route::post('/store','LangaugesController@store')->name('admin.language.store');


        Route::get('/edit/{id}','LangaugesController@edit')->name('admin.language.edit');
        Route::post('/update/{id}','LangaugesController@updated')->name('admin.language.update');

        Route::get('/delete/{id}','LangaugesController@destroy')->name('admin.language.delete');
    });

    ########################### End Routing Languages ########################



 ########################### Begin Routing Main_Categories ########################

 Route::group(['prefix' => 'main_catergories'],function()
 {
     Route::get('/','MainCategoriesController@index')->name('admin.mainCategories');
     Route::get('/create','MainCategoriesController@create')->name('admin.mainCategories.create');
     Route::post('/store','MainCategoriesController@store')->name('admin.mainCategories.store');

     Route::get('edit/{id}','MainCategoriesController@edit') -> name('admin.maincategories.edit');
     Route::post('update/{id}','MainCategoriesController@update') -> name('admin.maincategories.update');

     Route::get('/delete/{id}','MainCategoriesController@destroy')->name('admin.mainCategories.delete');
 });

 ########################### End Routing Languages ########################


 ####################### Begin Routing Vendors ##################

 Route::get('/','VendorsController@index')->name('admin.vendors');

 ####################### Begin Routing Vendors ##################






});


Route::group(['namespace' => 'Admin','middleware' => 'guest:admin'],function(){
    Route::get('login','LoginController@getLogin')->name('get.admin.login');
    Route::post('login','LoginController@login')->name('admin.login');
});


