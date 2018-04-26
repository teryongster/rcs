<?php

Route::get('/', 'PagesController@index');
Route::get('restaurants', 'PagesController@restaurants');
Route::get('restaurants/{item}', 'PagesController@restaurantView');
Route::get('register', 'PagesController@register');
Route::post('register', 'UserController@register');

Route::post('login', 'UserController@login');
Route::post('logout', 'UserController@logout');

Route::get('my-restaurant', 'PagesController@myRestaurant');
Route::patch('my-restaurant', 'UserController@patch');
Route::post('restaurant/{item}/add-dish', 'RestaurantController@addDish');
Route::delete('delete-dish/{item}', 'RestaurantController@deleteDish');

Route::get('admin-panel', 'PagesController@adminpanel');