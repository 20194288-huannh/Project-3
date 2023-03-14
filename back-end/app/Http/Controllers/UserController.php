<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends ApiController
{
    public function index()
    {
        $users = User::paginate();
        return $this->response(['message' => 'success', 'data' => new UserCollection($users)]);
    }
    public function show($id)
    {
        $user = User::findOrFail($id);
        return $this->response(['message' => 'success', 'data' => new UserResource($user)]);
    }
    public function store(Request $request)
    {
        $user = User::create($request->only(['name', 'phone', 'email', 'password', 'address']));
        return $this->responseOk(new UserResource($user));
    }
    public function profile()
    {
        $user = new UserResource(auth()->user());
        return $this->responseOk($user);
    }
}
