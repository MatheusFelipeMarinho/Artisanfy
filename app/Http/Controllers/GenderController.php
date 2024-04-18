<?php

namespace App\Http\Controllers;

use App\Enums\UserType;
use App\Http\Requests\GenderRequest;
use App\Models\Gender;
use Illuminate\Http\Request;

class GenderController extends Controller
{
    public function store(GenderRequest $request, Gender $gender)
    {
        if(auth()->user()->type !== UserType::UserAdmin){
            return response()->json(['message' => 'User does not have permission to create genders'], 401);
        }

        if(! $gender->create($request->validated())){
            return response()->json(['message' => 'Failed to create gender'], 500);
        }

        return response()->json(['message' => 'Gender created successfully'], 201);
    }
}
