<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthorCollection;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends ApiController
{
    public function index()
    {
        $authors = Author::paginate();
        return $this->response(['success' => true, 'data' => new AuthorCollection($authors)]);
    }
}
