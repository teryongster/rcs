<?php

Route::get('/', 'PagesController@index');
Route::get('restaurants', 'PagesController@restaurants');
Route::get('register', 'PagesController@register');
Route::post('register', 'UserController@register');