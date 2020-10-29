<?php
Auth::routes();

Route::get('/', 'Item\ItemController@index')->name('item.index');
Route::get('/detail/{id}', 'Item\ItemController@detail')->name('item.detail');
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'cart', 'middleware' => 'auth'], function () {
    Route::get('/', 'Item\CartController@index')->name('cart.index');
    Route::post('add', 'Item\CartController@add')->name('cart.add');
    Route::post('delete', 'Item\CartController@delete')->name('cart.delete');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('login', 'Admin\LoginController@showLogin')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::get('/index', 'Admin\ItemController@index')->name('admin.index');
    Route::get('home', 'Admin\HomeController@index')->name('admin.home');
    Route::get('detail/{id}', 'Admin\ItemController@detail')->name('admin.detail');
    Route::get('create', 'Admin\ItemController@create')->name('admin.create');
    Route::post('store', 'Admin\ItemController@store')->name('admin.store');
    Route::get('edit/{id}', 'Admin\ItemController@edit')->name('admin.edit');
    Route::post('update/{id}', 'Admin\ItemController@update')->name('admin.update');
    Route::post('logout', 'Admin\LoginController@logout')->name('admin.logout');
});

Route::get('/sample', function () {
    return view('sample.index');
});

Route::get('/test', function () {
    $test = app()->make('test');
    return $test->checkTest();
});

Route::get('/make', function () {
    $make = app()->make('make');
    return $make;
});

Route::get('/practice', function () {
    $practice = app()->make('practice');
    return $practice;
});
