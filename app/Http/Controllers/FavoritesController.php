<?php

namespace App\Http\Controllers;
use App\Reply; 
use App\Favorite; 
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
	public function __constuct(){

		$this->middleware('auth');
	}
    public function store(Reply $reply){

    	 $reply->favorite(); 
    	 return back(); 
    }
}
