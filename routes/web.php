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
        #INDEX#
        Route::get('admin-index', 'dashboard\IndexController@index')->name('index');

        #CUSTOMER#
        Route::get('customer-index', 'dashboard\CustomerController@index')->name('customer-index');
        Route::get('customer-create-view', 'dashboard\CustomerController@createview')->name('customer-create-view');
        Route::post('customer-create', 'dashboard\CustomerController@create')->name('customer-create');
        Route::get('customer-view/{id}', 'dashboard\CustomerController@view')->name('customer-view');
        Route::post('customer-activate-deactivate', 'dashboard\CustomerController@activateDeactivate')->name('customer-activate-deactivate');
        Route::post('customer-delete', 'dashboard\CustomerController@delete')->name('customer-delete');
        Route::get('customer-update-view/{id}', 'dashboard\CustomerController@updateView')->name('customer-update-view');
        Route::post('customer-update/{id}', 'dashboard\CustomerController@update')->name('customer-update');
        Route::post('customer-profile-delete-image', 'dashboard\CustomerController@deleteProfileImage')->name('customer-profile-delete-image');

        #HANDYMAN#
        Route::get('handyman-index', 'dashboard\HandyManController@index')->name('handyman-index');
        Route::get('handyman-create-view', 'dashboard\HandyManController@createview')->name('handyman-create-view');
        Route::post('handyman-create', 'dashboard\HandyManController@create')->name('handyman-create');
        Route::get('handyman-view/{id}', 'dashboard\HandyManController@view')->name('handyman-view');
        Route::post('handyman-activate-deactivate', 'dashboard\HandyManController@activateDeactivate')->name('handyman-activate-deactivate');
        Route::post('handyman-delete', 'dashboard\HandyManController@delete')->name('handyman-delete');
        Route::get('handyman-update-view/{id}', 'dashboard\HandyManController@updateView')->name('handyman-update-view');
        Route::post('handyman-update/{id}', 'dashboard\HandyManController@update')->name('handyman-update');


        #CATEGORY#
        Route::get('category-index', 'dashboard\CategoryController@index')->name('category-index');
        Route::get('category-create-view', 'dashboard\CategoryController@createview')->name('category-create-view');
        Route::post('category-create', 'dashboard\CategoryController@create')->name('category-create');
        Route::get('category-view/{id}', 'dashboard\CategoryController@view')->name('category-view');
        Route::post('category-delete', 'dashboard\CategoryController@delete')->name('category-delete');
        Route::get('category-update-view/{id}', 'dashboard\CategoryController@updateView')->name('category-update-view');
        Route::post('category-update/{id}', 'dashboard\CategoryController@update')->name('category-update');
        Route::post('category-activate-deactivate', 'dashboard\CategoryController@activateDeactivate')->name('category-activate-deactivate');

        #SERVICE#
        Route::get('service-index', 'dashboard\ServiceController@index')->name('service-index');
        Route::get('service-create-view', 'dashboard\ServiceController@createview')->name('service-create-view');
        Route::post('service-create', 'dashboard\ServiceController@create')->name('service-create');
        Route::get('service-view/{id}', 'dashboard\ServiceController@view')->name('service-view');
        Route::post('service-activate-deactivate', 'dashboard\ServiceController@activateDeactivate')->name('service-activate-deactivate');
        Route::post('service-delete', 'dashboard\ServiceController@delete')->name('service-delete');
        Route::get('service-update-view/{id}', 'dashboard\ServiceController@updateView')->name('service-update-view');
        Route::post('service-update/{id}', 'dashboard\ServiceController@update')->name('service-update');
        Route::post('service-profile-delete-image', 'dashboard\ServiceController@deleteProfileImage')->name('service-profile-delete-image');

        #BACKGROUND IMAGES#
        Route::get('background-image-index', 'dashboard\BackgroundImagesController@index')->name('background-image-index');
        Route::get('background-image-create-view', 'dashboard\BackgroundImagesController@createview')->name('background-image-create-view');
        Route::post('background-image-create', 'dashboard\BackgroundImagesController@create')->name('background-image-create');
        Route::get('background-image-view/{id}', 'dashboard\BackgroundImagesController@view')->name('background-image-view');
        Route::post('background-image-delete', 'dashboard\BackgroundImagesController@delete')->name('background-image-delete');
        Route::get('background-image-update-view/{id}', 'dashboard\BackgroundImagesController@updateView')->name('background-image-update-view');
        Route::post('background-image-update/{id}', 'dashboard\BackgroundImagesController@update')->name('background-image-update');
        Route::post('background-image-delete-image', 'dashboard\BackgroundImagesController@deleteImage')->name('background-image-delete-image');
    });
});

#*****************************************#

