<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserMovieStoreRequest;
use App\Rating;

class UserController extends Controller
{
    public function store(UserMovieStoreRequest $request)
    {
        $user = auth()->user();
        $uniqueData = collect($request->only('movie_id'))
            ->merge(['user_id' => $user->id]);

        $insertData = $request->except('movie_id');

        Rating::updateOrCreate(
            $uniqueData->toArray(),
            $insertData);

        return redirect()->back();
    }
}
