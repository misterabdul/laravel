<?php

namespace Tests\Feature\Api\RPC;

use App\Models\UserModel;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

class SignUpTest extends TestCase
{
    use DatabaseMigrations,
        RefreshDatabase,
        Utils\CommonTest;

    protected $endpoint = 'api/v1/signup';

    /**
     * Test sign up RPC endpoint with unauthorized request.
     *
     * @return void
     */
    public function testSignUpNotLogin()
    {
        $postRequestValid = $this->postJson($this->endpoint, [
            'name'      => 'Test User',
            'email'     => 'testuser@example.com',
            'password'  => 'password',
            'password_confirmation' =>'password',
        ]);
        $postRequestValid->assertStatus(200);

        assert(UserModel::where('email', 'testuser@example.com')->first() !== null);

        $user = factory(UserModel::class)->create();
        $postRequestInvalid = $this->postJson($this->endpoint, [
            'name'      => $user->name,
            'email'     => $user->email,
            'password'  => 'password',
            'password_confirmation' =>'password',
        ]);
        $postRequestInvalid->assertStatus(422);

        $this->commonRequestsWithoutPost($this->endpoint, [404, 405, 405, 405]);
    }

    /**
     * Test sign up RPC endpoint with authorized request.
     *
     * @return void
     */
    public function testSignUpLogin()
    {
        $user = factory(UserModel::class)->create();
        Passport::actingAs($user, ['']);
        
        $postRequestValid = $this->postJson($this->endpoint, [
            'name'      => 'Test User',
            'email'     => 'testuser@example.com',
            'password'  => 'password',
            'password_confirmation' =>'password',
        ]);
        $postRequestValid->assertStatus(302);

        $user = factory(UserModel::class)->create();
        $postRequestInvalid = $this->postJson($this->endpoint, [
            'name'      => $user->name,
            'email'     => $user->email,
            'password'  => 'password',
            'password_confirmation' =>'password',
        ]);
        $postRequestInvalid->assertStatus(302);

        $this->commonRequestsWithoutPost($this->endpoint, [404, 405, 405, 405]);
    }
}
