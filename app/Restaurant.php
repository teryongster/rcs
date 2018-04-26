<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
	protected $guarded = ['id', 'created_at'];
	
    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function products(){
    	return $this->hasMany(RestaurantProduct::class);
    }
}
