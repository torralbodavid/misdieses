<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {

        $this->get('/')
            ->assertStatus(200)
            ->assertHeader('Cache-control','must-revalidate, no-cache, no-store, public')
            ->assertHeader('Content-Type','image/png');
    }
}
