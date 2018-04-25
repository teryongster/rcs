<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
	protected $guarded = ['id', 'created_at'];
	
    public function user(){
    	return $this->belongsTo(User::class);
    }
}
