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
    		'price' => 'required',
    	]);

    	$image = $r->image->store('/uploads/images');

    	RestaurantProduct::create([
    		'restaurant_id' => $item->id,
    		'name' => $r->name,
    		'description' => $r->description,
            'image' => $image,
    		'price' => $r->price,
    	]);

        session()->flash('success-message', 'Data has been updated.');
    	return back();
    }

    public function deleteDish(RestaurantProduct $item){
    	$item->delete();

        session()->flash('success-message', 'Data has been deleted.');
    	return back();
    }
}
