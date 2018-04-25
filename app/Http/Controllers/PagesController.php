<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;

class PagesController extends Controller
{
    public function index(){
    	return view('index');
    }

    public function restaurants(){
        $restaurants = Restaurant::orderBy('created_at', 'desc')->get();
    	return view('restaurants', compact('restaurants'));
    }

    public function register(){
    	return view('register');
    }

    public function restaurantView(Restaurant $item){
        $res = $item;
    	return view('restaurantView', compact('res'));
    }
}
