<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PropertiesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/api/v1/products');

        $response->assertStatus(200);
    }
}
