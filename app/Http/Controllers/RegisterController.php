<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterRequest $request, User $user)
    {
       if(! $user->create($request->validated())){
           return response()->json(['message' => 'Failed to create user'], 500);
       }

        return response()->json(['message' => 'User created successfully'], 201);
    }
}
