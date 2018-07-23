<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('email/verify', 'Auth\VerificationController@verify')
    ->middleware('signed')
    ->name('email.verify');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/main', 'PostController@index')->name('main');
Route::get('show/{slug}', 'PostController@show')->name('post.show');

Route::group(['middleware' => ['role:super-admin']], function () {
    Route::get('admin', 'AdminController@index')->name('admin.panel');
    Route::get('create', 'PostController@create')->name('post.create');
    Route::post('create', 'PostController@store')->name('post.store');
    Route::get('edit/{slug}', 'PostController@edit')->name('post.edit');
    Route::post('edit/{slug}', 'PostController@update')->name('post.update');
    Route::get('delete/{id}', 'PostController@destroy')->name('post.destroy');
});


//Ajax
Route::get('like/{postId}', 'Ajax\LikeController@createOrDestroy')->name('like');
