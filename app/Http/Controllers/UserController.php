<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Restaurant;

class UserController extends Controller
{
    public function register(Request $r){
    	$this->validate($r, [
    		'username' => 'required|string|unique:users',
    		'email' => 'required|email|unique:users',
    		'password' => 'required|confirmed',
    		'name' => 'required|string',
    		'image' => 'required|mimes:jpeg,jpg,bmp,png',
    		'category' => 'required',
    		'address' => 'required',
    		'longitude' => 'required',
    		'latitude' => 'required',
    		'description' => 'required',
    	]);

    	$user = User::create([
    		'username' => $r->username,
    		'email' => $r->email,
    		'password' => $r->password,
    	]);

    	$image = $r->image->store('/uploads/images');

    	Restaurant::create([
    		'user_id' => $user->id,
    		'name' => $r->name,
    		'image' => $image,
    		'category' => $r->category,
    		'address' => $r->address,
    		'long' => $r->longitude,
    		'lat' => $r->latitude,
    		'description' => $r->description,
    	]);

    	session()->flash('success-message', 'Thank you for registering. Please wait for your account\'s confirmation');

    	return redirect('/register');
    }
}
