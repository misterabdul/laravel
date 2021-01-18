<?php

namespace App\Http\Controllers\Api\RPC;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\Rest\UserController;
use App\Http\Requests\User\SignUpRequest;

class SignUpController extends Controller
{
    /**
     * The json reponse instance.
     * 
     * @var UserController
     */
    protected $userRest;

    /**
     * Create a new controller instance.
     * 
     * @param UserController $response
     */
    public function __construct(UserController $userRest)
    {
        $this->userRest = $userRest;
    }

    /**
     * Handle the incoming request.
     *
     * @param  SignUpRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(SignUpRequest $request)
    {
        return $this->userRest->store($request);
    }
}
