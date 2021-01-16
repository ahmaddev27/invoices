<?php

use Illuminate\Support\Facades\Route;

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


Auth::routes(['register'=>false]);


Route::group(['middleware' => 'auth'],function (){
    Route::get('/', 'HomeController@index')->name('home');



    Route::group(['as'=>'invoices.','prefix'=>'invoices'],function (){
        Route::get('/', 'InvoicesController@index')->name('index');
        Route::get('create', 'InvoicesController@create')->name('create');
        Route::post('store', 'InvoicesController@store')->name('store');
        Route::get('show/{id}', 'InvoicesController@show')->name('show');
        Route::get('edit/{id}', 'InvoicesController@edit')->name('edit');
        Route::post('update/{id}', 'InvoicesController@update')->name('update');
        Route::post('delete', 'InvoicesController@destroy')->name('delete');
        Route::post('archive', 'InvoicesController@archive')->name('archive');
        Route::post('status', 'InvoicesController@status')->name('status');
        Route::get('index/archive', 'InvoicesController@indexArchive')->name('index.archive');
        Route::post('unarchive', 'InvoicesController@unarchive')->name('unarchive');
        Route::get('print/{id}', 'InvoicesController@print')->name('print');
        Route::get('excel', 'InvoicesController@excel')->name('excel');




    });
    Route::get('section/{id}', 'InvoicesController@getProducts');////////////****** get products jason from section id



    Route::group(['as'=>'sections.','prefix'=>'sections'],function (){
        Route::get('/', 'SectionController@index')->name('index');
        Route::post('store', 'SectionController@store')->name('store');
        Route::post('update', 'SectionController@update')->name('update');
        Route::post('delete', 'SectionController@destroy')->name('delete');


    });
    Route::group(['as'=>'products.','prefix'=>'products'],function (){
        Route::get('/', 'ProductController@index')->name('index');
        Route::post('store', 'ProductController@store')->name('store');
        Route::post('update', 'ProductController@update')->name('update');
        Route::post('delete', 'ProductController@destroy')->name('delete');


    });


   Route::group(['as'=>'roles.','prefix'=>'roles'],function (){
        Route::get('/', 'RoleController@index')->name('index');
        Route::get('create', 'RoleController@create')->name('create');
        Route::post('/', 'RoleController@store')->name('store');
        Route::get('edit/{id}', 'RoleController@edit')->name('edit');
        Route::post('update/{id}', 'RoleController@update')->name('update');
        Route::post('delete', 'RoleController@destroy')->name('delete');


    });


   Route::group(['as'=>'users.','prefix'=>'users'],function (){
        Route::get('/', 'UserController@index')->name('index');
        Route::get('create', 'UserController@create')->name('create');
        Route::post('/', 'UserController@store')->name('store');
        Route::get('edit/{id}', 'UserController@edit')->name('edit');
        Route::post('update/{id}', 'UserController@update')->name('update');
        Route::post('delete', 'UserController@destroy')->name('delete');

    });

   Route::group(['as'=>'reports.','prefix'=>'reports'],function (){
        Route::get('/', 'ReportController@index')->name('index');
        Route::POST('search', 'ReportController@search')->name('search');
    });

    Route::get('/read-all', 'HomeController@MarkReadAll')->name('MarkReadAll');

});



