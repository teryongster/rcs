<?php

Route::get('/', 'PagesController@index');
Route::get('restaurants', 'PagesController@restaurants');
Route::get('restaurants/{item}', 'PagesController@restaurantView');
Route::get('register', 'PagesController@register');
Route::post('register', 'UserController@register');