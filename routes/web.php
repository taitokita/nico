<?php

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', 'WelcomeController@index');

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('shops', 'ShopsController', ['only' => ['create']]);
});
Route::group(['middleware' => 'auth'], function () {
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
    Route::group(['prefix' => 'users/{id}'], function () {
        Route::post('favorite', 'UserFavoriteController@store')->name('user.favorite');
        Route::delete('unfavorite', 'UserFavoriteController@destroy')->name('user.unfavorite');
        Route::get('favoriteings', 'UsersController@favoriteings')->name('users.favoriteings');
    });

    Route::resource('shops', 'ShopsController', ['only' => ['store', 'destroy']]);
});

Route::get('/items', 'ItemController@index');
Route::match(['GET', 'POST'], '/create', 'ItemController@create');

Route::get('/shop', 'ShopsController@index');

Route::resource('shops', 'ShopsController');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
    Route::resource('shops', 'ShopsController');
});

//Route::get('/', 'ReviewsController@index');

// omit

Route::group(['middleware' => 'auth'], function () {
    Route::resource('reviews', 'ReviewsController', ['only' => ['index', 'show']]);
    Route::resource('reviews', 'ReviewsController', ['only' => ['store', 'destroy']]);
});

//Route::resource('reviews', 'ReviewsController');

// Ranking
Route::get('ranking/favorite', 'RankingController@favorite')->name('ranking.favorite');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('shops', 'ShopsController', ['only' => ['create', 'show']]);
    Route::post('favorite', 'UserFavoriteController@favorite')->name('userfavorite.favorite');
    Route::delete('favorite', 'UserFavoriteController@unfavorite')->name('userfavorite.unfavorite');
    Route::resource('users', 'UsersController', ['only' => ['show']]);
});


//tag
Route::group(['middleware' => 'auth'], function () {
    Route::resource('shops', 'ShopsController', ['only' => ['index', 'show']]);
    Route::group(['prefix' => 'shops/{id}'], function () {
        Route::post('tag', 'ShopTagController@store')->name('shop.tag');
        Route::delete('untag', 'ShopTagController@destroy')->name('shop.untag');
        Route::get('tagings', 'ShopsController@tagings')->name('shops.tagings');
    });

    Route::resource('shops', 'ShopsController', ['only' => ['store', 'destroy']]);
});