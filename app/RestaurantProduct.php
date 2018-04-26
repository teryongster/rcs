<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantProduct extends Model
{
    protected $guarded = ['id', 'created_at'];

    public function restaurant(){
    	return $this->belongsTo(Restaurant::class);
    }
}
