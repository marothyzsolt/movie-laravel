<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserMovieStoreRequest;

class UserController extends Controller
{
    public function store(UserMovieStoreRequest $request)
    {
        dd($request->all());
    }
}
