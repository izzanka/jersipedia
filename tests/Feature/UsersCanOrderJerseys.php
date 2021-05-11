<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UsersCanOrderJerseys extends TestCase
{
    use DatabaseMigrations;
    // test
    public function it_order_a_jersey(){
        $user = factory(User::class)->create();
        $jersey = factory(Jersey::class)->create();
    }

}
