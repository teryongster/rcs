<?php

Route::get('/', 'PagesController@index');
Route::get('restaurants', 'PagesController@restaurants');
Route::get('restaurants/{item}', 'PagesController@restaurantView');
Route::get('register', 'PagesController@register');
Route::post('register', 'UserController@register');

Route::post('login', 'UserController@login');
Route::post('logout', 'UserController@logout');

Route::get('my-restaurant', 'PagesController@myRestaurant');