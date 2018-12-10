<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations; 

class ThreadTest extends TestCase
{
    use DatabaseMigrations; 
    /**
     * A basic test example.
     * @test
     * @return void
     */


    public function a_user_can_brows_threads()
    {
        $thread = factory('App\Thread')->create(); 
        $response = $this->get('/threads');

        $response->assertSee($thread->title);
    }

    function a_user_can_read_s_single_thread(){
        $thread = factory('App\Thread')->create(); 

        $response = $this->get('/threads/'. $thread->id); 
        $response->assertSee($thread->title); 
    }

/*
    function a_user_can_read_replies_assocate_a_thred(){
        
          $thread = factory('App\Thread')->create(); 

          $reply =  factory('App\Replay')->create(['thread_id'=>$thread->id]); 
          $response = $this->get('/threads/'. $reply->id);
          $response->assertSee($reply->body); 
    }*/
}
