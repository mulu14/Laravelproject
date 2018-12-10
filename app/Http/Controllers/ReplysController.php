<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread; 
class ReplysController extends Controller
{
    

    public function store($channelId, Thread $thread){

    	$this->validate(request(), [
        'body' =>'required', 
     
      ]); 

    	$thread->addReply([
    		'body'  =>request('body'),
    		'user_id' =>auth()->id()
    	])->load('owner'); 

    	return back(); 
    }
}
