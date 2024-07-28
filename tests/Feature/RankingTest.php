<?php

namespace Tests\Feature;

use GuzzleHttp\Psr7\Message;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RankingTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

     use RefreshDatabase;

    /** @test */
    public function ランキングの表示()
    {
        Message::create(['body' => 'hello']);

        $response = $this->get('/ranking');
        $response->assertOk();
        $response->assertSee('hello');
    }
}
