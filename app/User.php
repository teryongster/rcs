<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function restaurant(){
    	return $this->hasOne(Restaurant::class);
    }
}
