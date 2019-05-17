<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('product/{id}', function () {
    return view('product');
})->name('product.show');
