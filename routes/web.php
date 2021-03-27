<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PageController@root')->name('root');
Route::get('products', 'ProductController@index')->name('products.index');

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('user_addresses', 'UserAddressController@index')->name('user_addresses.index');
    Route::get('user_addresses/create', 'UserAddressController@create')->name('user_addresses.create');
    Route::post('user_addresses', 'UserAddressController@store')->name('user_addresses.store');
    Route::get('user_addresses/{user_address}', 'UserAddressController@edit')->name('user_addresses.edit');
    Route::put('user_addresses/{user_address}', 'UserAddressController@update')->name('user_addresses.update');
    Route::delete('user_addresses/{user_address}', 'UserAddressController@destroy')->name('user_addresses.destroy');

    // Route::resource('products', 'ProductController', ['except' => ['index']]);
});
