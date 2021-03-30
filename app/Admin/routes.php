<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->get('users', 'UserController@index');
    $router->get('products', 'ProductController@index');
    $router->get('products/create', 'ProductController@create');
    $router->post('products', 'ProductController@store');
    $router->get('products/{id}/edit', 'ProductController@edit');
    $router->put('products/{id}', 'ProductController@update');

    $router->get('orders', 'OrderController@index')->name('orders.index');
    $router->get('orders/{order}', 'OrderController@show')->name('orders.show');
    $router->post('orders/{order}/ship', 'OrderController@ship')->name('orders.ship');
    $router->post('orders/{order}/refund', 'OrderController@handleRefund')->name('orders.handle_refund');

    $router->get('coupon_codes', 'CouponCodeController@index');
});
