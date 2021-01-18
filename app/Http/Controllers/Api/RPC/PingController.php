<?php

namespace App\Http\Controllers\Api\RPC;

use App\Contracts\JsonResponseContract;
use App\Http\Controllers\Controller;

class PingController extends Controller
{
    /**
     * The json reponse instance.
     * 
     * @var JsonResponseContract
     */
    protected $response;

    /**
     * Create a new controller instance.
     * 
     * @param JsonResponseContract $response
     */
    public function __construct(JsonResponseContract $response)
    {
        $this->response = $response;
    }

    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return $this->response->json('Pong.', 200, null);
    }
}
