<?php

namespace Tests\Feature\Api\Rest;

use App\Models\UserModel;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseMigrations,
        RefreshDatabase;

    /**
     * Test User REST endpoint with unauthorized request.
     *
     * @return void
     */
    public function testNotLogin()
    {
        $user = factory(UserModel::class)->create();

        $indexResponse = $this->getJson('/api/v1/user');
        $indexResponse->assertStatus(401);
        
        $showResponse = $this->getJson('/api/v1/user/'.$user->uid);
        $showResponse->assertStatus(401);

        $createResponse = $this->postJson('/api/v1/user', [
            'name'      => 'Test User',
            'email'     => 'testuser@example.com',
            'passowrd'  => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
        ]);
        $createResponse->assertStatus(405);

        $updateResponse = $this->putJson('/api/v1/user/'.$user->uid);
        $updateResponse->assertStatus(405);
        
        $updateResponse = $this->patchJson('/api/v1/user/'.$user->uid);
        $updateResponse->assertStatus(405);

        $updateResponse = $this->deleteJson('/api/v1/user/'.$user->uid);
        $updateResponse->assertStatus(405);
    }

    /**
     * Test User REST endpoint with authorized request.
     *
     * @return void
     */
    public function testLogin()
    {
        $user = factory(UserModel::class)->create();
        Passport::actingAs($user, ['']);

        $indexResponse = $this->getJson('/api/v1/user');
        $indexResponse->assertStatus(200);
        
        $showResponse = $this->getJson('/api/v1/user/'.$user->uid);
        $showResponse->assertStatus(200);

        $createResponse = $this->postJson('/api/v1/user', [
            'name'      => 'Test User',
            'email'     => 'testuser@example.com',
            'passowrd'  => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
        ]);
        $createResponse->assertStatus(405);

        $updateResponse = $this->putJson('/api/v1/user/'.$user->uid);
        $updateResponse->assertStatus(405);
        
        $updateResponse = $this->patchJson('/api/v1/user/'.$user->uid);
        $updateResponse->assertStatus(405);

        $updateResponse = $this->deleteJson('/api/v1/user/'.$user->uid);
        $updateResponse->assertStatus(405);
    }
}
