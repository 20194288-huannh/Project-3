<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends ApiController
{
    public function index()
    {
        $users = User::paginate();
        return $this->response(['message' => 'success', 'data' => UserResource::collection($users)]);
    }
}
