<?php

namespace Tests\Feature\Api\RPC\Utils;

use App\Models\UserModel;
use Laravel\Passport\Passport;

trait CommonTest
{
    /**
     * Perform common empty requests given the endpoint and assert the given status.
     * 
     * @param string $endpoint
     * @param array $status
     * @return void
     */
    protected function commonEmptyRequests($endpoint, $status)
    {
        $methods = ['get', 'post', 'put', 'patch', 'delete'];

        for ($i = 0; $i < sizeof($status); $i++) {
            $response = $this->{$methods[$i] . 'Json'}($endpoint);
            $response->assertStatus($status[$i]);
        }
    }

    /**
     * Perform common requests without post given the endpoint and assert the given status.
     * 
     * @param string $endpoint
     * @param array $status
     * @return void
     */
    protected function commonRequestsWithoutPost($endpoint, $status)
    {
        $methods = ['get', 'put', 'patch', 'delete'];

        for ($i = 0; $i < sizeof($status); $i++) {
            $response = $this->{$methods[$i] . 'Json'}($endpoint);
            $response->assertStatus($status[$i]);
        }
    }

    /**
     * Perform common requests without put/patch given the endpoint and assert the given status.
     * 
     * @param string $endpoint
     * @param array $status
     * @return void
     */
    protected function commonRequestsWithoutPutPatch($endpoint, $status)
    {
        $methods = ['get', 'post', 'delete'];

        for ($i = 0; $i < sizeof($status); $i++) {
            $response = $this->{$methods[$i] . 'Json'}($endpoint);
            $response->assertStatus($status[$i]);
        }
    }

    /**
     * Perform authorized empty requests given the endpoint and assert the given status.
     * 
     * @param string $endpoint
     * @param array $status
     * @return void
     */
    protected function authorizedEmptyRequests($endpoint, $status)
    {
        $user = factory(UserModel::class)->create();
        Passport::actingAs($user, ['']);

        $this->commonEmptyRequests($endpoint, $status);
    }
}
