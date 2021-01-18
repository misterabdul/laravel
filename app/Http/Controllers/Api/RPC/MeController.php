<?php

namespace App\Http\Controllers\Api\RPC;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\Rest\UserController;
use Illuminate\Http\Request;

class MeController extends Controller
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
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return $this->userRest->show($request->user());
    }
}
