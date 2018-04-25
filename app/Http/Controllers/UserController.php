<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Restaurant;

class UserController extends Controller
{
    public function store(Request $r){
    	$this->validate([
    		''
    	]);
    }
}
