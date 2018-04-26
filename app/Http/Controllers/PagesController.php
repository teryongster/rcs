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

    public function search(Request $r){
        $query = $r->q;
        $category = $r->category;
        if($r->category){
            $restaurants = Restaurant::where('name', 'like', '%'.$r->q.'%')->where('category', $r->category)->get();
        }else{
            $restaurants = Restaurant::where('name', 'like', '%'.$r->q.'%')->get();
        }
        return view('restaurants', compact('restaurants', 'query', 'category'));
    }

    public function restaurants(Request $r){
        if($r->sort){
            $sort = $r->sort;
            $restaurants = Restaurant::orderBy($r->sort, 'asc')->get();
        }else{
            $restaurants = Restaurant::orderBy('created_at', 'desc')->get();
        }
    	return view('restaurants', compact('restaurants', 'sort'));
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
