<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('signup','Auth\RegisterController@showRegistrationForm')->name('signup');
Route::post('signup','Auth\RegisterController@register')->name('signup.post');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'users_{id}'], function () {
        Route::post('follow', 'UserFollowController@store')->name('follow');
        Route::delete('unfollow', 'UserFollowController@destroy')->name('unfollow');
    });
    Route::group(['prefix' => 'users/{id}'], function() {
        Route::get('followings', 'UsersController@followings')->name('followings');
        Route::get('followers', 'UsersController@followers')->name('followers');
    });
});
Route::get('search', 'PostsController@search')->name('post.search');
Route::get('/', 'PostsController@index');

Route::group(['prefix' => 'user/{id}'],function(){
    Route::get('/', 'UsersController@show')->name('user.show');
    Route::get('favorites', 'UsersController@favorites')->name('favorites');
});

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('users')->group(function () {
        Route::get('{id}/edit', 'UsersController@edit')->name('users.edit');
        Route::put('{id}', 'UsersController@update')->name('users.update');
        Route::delete('{id}', 'UsersController@destroy')->name('users.delete');
    });
    Route::prefix('posts')->group(function () {
        Route::post('', 'PostsController@store')->name('posts.store');
        Route::get('{id}/edit', 'PostsController@edit')->name('posts.edit');
        Route::put('{id}', 'PostsController@update')->name('posts.update');
    });   
    Route::group(['prefix' => 'posts/{id}'],function(){
        Route::post('favorite', 'FavoriteController@store')->name('favorite');
        Route::delete('unfavorite', 'FavoriteController@destroy')->name('unfavorite');
    });
});


