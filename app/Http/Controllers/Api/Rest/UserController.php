<?php

namespace App\Http\Controllers\Api\Rest;

use App\Contracts\JsonResponseContract;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Http\Requests\User\SignUpRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * The json reponse instance.
     * 
     * @var App\Contracts\JsonResponseContract
     */
    protected $response;

    /**
     * The user model instance
     * 
     * @var App\Models\UserModel
     */
    protected $model;

    /**
     * Create a new controller instance.
     * 
     * @param JsonResponseContract $response
     */
    public function __construct(JsonResponseContract $response, UserModel $model)
    {
        $this->response = $response;
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->response->json(
            'Success',
            200,
            new UserCollection($this->model->paginate())
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\User\SignUpRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SignUpRequest $request)
    {
        $user = $this->model->create($this->hashPassword($request->validated()));
        return $this->response->json(
            'User created.',
            200,
            new UserResource($user)
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserModel $user
     * @return \Illuminate\Http\Response
     */
    public function show(UserModel $user)
    {
        return $this->response->json(
            'Success.',
            200,
            new UserResource($user)
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\User\UpdateRequest  $request
     * @param  \App\Models\UserModel $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, UserModel $user)
    {
        $user->update($this->hashPassword($request->validated()));
        return $this->response->json(
            'User updated.',
            200,
            new UserResource($user)
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserModel $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserModel $user)
    {
        $user->forceDelete();
        return $this->response->json(
            'User deleted',
            200,
            new UserResource($user)
        );
    }

    /**
     * Hash the given password inside array.
     * 
     * @param array $data
     * @return array
     */
    protected function hashPassword($data)
    {
        $data['password'] = Hash::make($data['password'] ?? 'password');

        return $data;
    }
}
