<?php

use Illuminate\Support\Facades\Route;



##################################CLIENT SIDE###################################
Route::group(['namespace' => 'App\Http\Controllers\client_side'], function () {
    Route::get('/', 'ClientSideController@index')->name('/');
    Route::get('/about', 'ClientSideController@about')->name('about');
    Route::get('/services', 'ClientSideController@services')->name('services');
    Route::get('/register-handyman', 'ClientSideController@registerHandyman')->name('register.handyman');
    Route::get('/contact', 'ClientSideController@contact')->name('contact');
});
#*****************************************#



##################################ADMIN SIDE###################################
Route::group(['namespace' => 'App\Http\Controllers\admins_side\admin', 'as' => 'admin.', 'prefix' => 'admin'], function () {
    #AUTH#

    Route::get('side', 'auth\LoginController@index')->name('side');
    Route::post('login', 'auth\LoginController@login')->name('login');
    Route::get('logout', 'auth\LogoutController@logout')->name('logout');

    #DASHBOARD#
    Route::group(['middleware' => ['auth:admin'], 'as' => 'dashboard.', 'prefix' => 'dashboard'], function () {
        Route::get('admin-index', 'dashboard\IndexController@index')->name('index');



        Route::get('category-index', 'dashboard\CategoryController@index')->name('category-index');
        Route::get('category-create-view', 'dashboard\CategoryController@createview')->name('category-create-view');
        Route::post('category-create', 'dashboard\CategoryController@create')->name('category-create');
        Route::get('category-view/{id}', 'dashboard\CategoryController@view')->name('category-view');
        Route::post('category-delete', 'dashboard\CategoryController@delete')->name('category-delete');
        Route::get('category-update-view/{id}', 'dashboard\CategoryController@updateView')->name('category-update-view');
        Route::post('category-update/{id}', 'dashboard\CategoryController@update')->name('category-update');
    });
});

#*****************************************#

