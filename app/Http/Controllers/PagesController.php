<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\User;

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
    
    public function myRestaurant(){
        $user = User::find(session('id'));
        return view('myRestaurant', compact('user'));
    }

    public function adminpanel(){
        return view('adminpanel');
    }

    public function registrationRequests(){
        $users = User::where('approved', 0)->orderBy('created_at')->get();
        return view('registrationRequests', compact('users'));
    }
}
