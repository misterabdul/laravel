<?php

namespace Tests\Feature\Web;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeTest extends TestCase
{
    /**
     * Test HTTP request for home page.
     *
     * @return void
     */
    public function testHome()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Test 404 request.
     *
     * @return void
     */
    public function test404()
    {
        $response = $this->get('/404');

        $response->assertStatus(404);
    }
}
