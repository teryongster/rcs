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

    public function patch(Request $r){
        $this->validate($r, [
            'email' => 'required|email',
            'password' => 'sometimes|confirmed',
            'name' => 'required|string',
            'image' => 'sometimes|mimes:jpeg,jpg,bmp,png',
            'category' => 'required',
            'address' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'description' => 'required',
        ]);

        User::find(session('id'))->update([
            'email' => $r->email,
        ]);

        if($r->password){
            User::find(session('id'))->update([
                'password' => $r->password,
            ]);
        }

        if($r->image){
            $image = $r->image->store('/uploads/images');
            Restaurant::where('user_id', session('id'))->update([
                'image' => $image,
            ]);
        }

        Restaurant::where('user_id', session('id'))->update([
            'name' => $r->name,
            'category' => $r->category,
            'address' => $r->address,
            'long' => $r->longitude,
            'lat' => $r->latitude,
            'description' => $r->description,
        ]);

        session()->flash('success-message', 'Data has been updated.');
        return back();
    }

    public function login(Request $r){
        $user = User::where('username', $r->username)->where('password', $r->password)->first();
        if($user){
            session()->put('status', 1);
            session()->put('username', $user->username);
            session()->put('id', $user->id);
            session()->put('email', $user->email);
            session()->put('role', $user->role);
            session()->put('approved', $user->approved);
            return redirect('/');
        }else{
            session()->flash('login-error', 'Wrong credentials. Please try again.');
            return redirect('/');
        }
    }

    public function logout(){
        session()->forget('status');
        session()->forget('username');
        session()->forget('id');
        session()->forget('email');
        session()->forget('role');
        session()->forget('approved');

        return redirect('/');
    }

    public function approve(User $item){
        $item->update([
            'approved' => 1
        ]); 

        $item->restaurant->update([
            'approved' => 1
        ]);

        return back();
    }

    public function decline(User $item){
        $item->delete();
        return back();
    }
}
