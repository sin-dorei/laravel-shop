<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PageController@root')->name('root');

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('user_addresses', 'UserAddressController@index')->name('user_addresses.index');
});
