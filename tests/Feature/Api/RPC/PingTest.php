<?php

namespace Tests\Feature\Api\RPC;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PingTest extends TestCase
{
    use DatabaseMigrations,
        RefreshDatabase,
        Utils\CommonTest;

    protected $endpoint = 'api/v1/ping';

    /**
     * Test Ping RPC endpoint with unauthorized request.
     *
     * @return void
     */
    public function testPingNotLogin()
    {
        $this->commonEmptyRequests($this->endpoint, [200, 200, 200, 200, 200]);
    }

    /**
     * Test Ping RPC endpoint with authorized request.
     *
     * @return void
     */
    public function testPingLogin()
    {
        $this->authorizedEmptyRequests($this->endpoint, [200, 200, 200, 200, 200]);
    }
}
