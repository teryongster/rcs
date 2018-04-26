<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\RestaurantProduct;
use App\User;

class RestaurantController extends Controller
{
    public function addDish(Restaurant $item, Request $r){
    	$this->validate($r, [
    		'name' => 'required|string',
    		'image' => 'required|mimes:jpeg,jpg,bmp,png',
    		'description' => 'required',
    	]);

    	$image = $r->image->store('/uploads/images');

    	RestaurantProduct::create([
    		'restaurant_id' => $item->id,
    		'name' => $r->name,
    		'description' => $r->description,
    		'image' => $image,
    	]);

    	return back();
    }

    public function deleteDish(RestaurantProduct $item){
    	$item->delete();
    	return back();
    }
}
