<?php
use illuminate\Support\Facades\Route;
Route::group(['middleware' => ['preventbackbutton', 'auth']], function () {
    Route::group(['prefix' => 'generalSettings'], function () {
        Route::get('/', ['as' => 'generalSettings.index', 'uses' => 'Setting\GeneralSettingController@index']);
        Route::post('/', ['as' => 'generalSettings.store', 'uses' => 'Setting\GeneralSettingController@store']);
        Route::get('/{generalSettings}/edit', ['as' => 'generalSettings.edit', 'uses' => 'Setting\GeneralSettingController@edit']);
        Route::put('/{generalSettings}', ['as' => 'generalSettings.update', 'uses' => 'Setting\GeneralSettingController@update']);
        Route::post('printHeadSettings', ['as' => 'printHeadSettings.store', 'uses' => 'Setting\GeneralSettingController@printHeadSettingsStore']);
        Route::put('printHeadSettings/{id}', ['as' => 'printHeadSettings.update', 'uses' => 'Setting\GeneralSettingController@printHeadSettingsUpdate']);
        Route::resource('meeting', 'Setting\LiveMettingController');
    
    });

    // front end setting
    Route::resource('service', 'Setting\ServicesController');
    Route::resource('slider', 'Setting\SlidersController');
    Route::resource('banner', 'Setting\BannerController');
    Route::resource('product', 'Setting\ProductController');
    // front end settings control
    Route::get('setting-front-page', 'Setting\FrontSettingController@index')->name('front.setting');
    Route::get('setting-front-orders', 'Setting\ProductController@list_orders')->name('order.list');
    Route::post('setting-front-page-submit', 'Setting\FrontSettingController@store')->name('front.setting.submit');
    Route::get('message', 'Setting\MessageController@index')->name('message.index');
    Route::get('message-create', 'Setting\MessageController@create')->name('message.create');
    Route::get('message-edit/{id}', 'Setting\MessageController@edit')->name('message.edit');
    Route::post('message-save', 'Setting\MessageController@store')->name('message.store');
    Route::delete('message-remove/{id}', 'Setting\MessageController@destroy')->name('message.delete');
    Route::put('message-update/{id}', 'Setting\MessageController@update')->name('message.update');
    Route::get('message-sent', 'Setting\MessageController@show')->name('message.show');
    Route::get('loan', 'Setting\LoanController@index')->name('loan.index');
    Route::get('loan-create', 'Setting\LoanController@create')->name('loan.create');
    Route::get('loan-edit/{id}', 'Setting\LoanController@edit')->name('loan.edit');
    Route::post('loan-save', 'Setting\LoanController@store')->name('loan.store');
    Route::put('loan-update/{id}', 'Setting\LoanController@update')->name('loan.update');
    Route::delete('loan-remove/{id}', 'Setting\LoanController@destroy')->name('loan.delete');
});