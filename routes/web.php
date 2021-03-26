<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PageController@root')->name('root');

Auth::routes(['verify' => true]);
