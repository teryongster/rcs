<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	protected $guarded = ['id', 'created_at'];

    public function restaurant(){
    	return $this->hasOne(Restaurant::class);
    }
}
