<?php

namespace Tests\Feature\Api\RPC;

use App\Models\UserModel;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

class UpdateMeTest extends TestCase
{
    use DatabaseMigrations,
        RefreshDatabase,
        Utils\CommonTest;

    protected $endpoint = 'api/v1/me';

    /**
     * Test Update Me RPC endpoint with unauthorized request.
     *
     * @return void
     */
    public function testUpdateMeNotLogin()
    {
        $putResponse = $this->putJson($this->endpoint, [
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => 'password',
        ]);
        $putResponse->assertStatus(401);

        $patchResponse = $this->patchJson($this->endpoint, [
            'name' => 'Test User 2',
            'email' => 'testuser2@example.com',
            'password' => 'password',
        ]);
        $patchResponse->assertStatus(401);

        $this->commonRequestsWithoutPutPatch($this->endpoint, [401, 405, 405]);
    }

    /**
     * Test Update Me RPC endpoint with authorized request.
     *
     * @return void
     */
    public function testUpdateMeLogin()
    {
        $user = factory(UserModel::class)->create();
        Passport::actingAs($user, ['']);

        $putResponse = $this->putJson($this->endpoint, [
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => 'password',
        ]);
        $putResponse->assertStatus(200);
        assert($user->email === 'testuser@example.com');

        $patchResponse = $this->patchJson($this->endpoint, [
            'name' => 'Test User 2',
            'email' => 'testuser2@example.com',
            'password' => 'password',
        ]);
        $patchResponse->assertStatus(200);
        assert($user->email === 'testuser2@example.com');

        $this->commonRequestsWithoutPutPatch($this->endpoint, [200, 405, 405]);
    }
}
