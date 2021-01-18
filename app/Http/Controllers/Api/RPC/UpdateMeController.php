<?php

namespace App\Http\Controllers\Api\RPC;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\Rest\UserController;
use App\Http\Requests\User\UpdateRequest;

class UpdateMeController extends Controller
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
     * @param  UpdateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UpdateRequest $request)
    {
        return $this->userRest->update($request, $request->user());
    }
}
