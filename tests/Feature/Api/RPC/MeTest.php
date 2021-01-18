<?php

namespace Tests\Feature\Api\RPC;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MeTest extends TestCase
{
    use DatabaseMigrations,
        RefreshDatabase,
        Utils\CommonTest;

    protected $endpoint = 'api/v1/me';

    /**
     * Test Me RPC endpoint with unauthorized request.
     *
     * @return void
     */
    public function testMeNotLogin()
    {
        $this->commonEmptyRequests($this->endpoint, [401, 405, 401, 401, 405]);
    }

    /**
     * Test me RPC endpoint with authorized request.
     * 
     * @return void
     */
    public function testMeLogin()
    {
        $this->authorizedEmptyRequests($this->endpoint, [200, 405, 422, 422, 405]);
    }
}
