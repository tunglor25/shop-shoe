<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserResourceCllection;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user= User::all();
        return new UserResourceCllection($user);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $user = new User();
        return $user->create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $user = User::find($id);
        return $user;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $user = User::find($id);
        return $user->update($request->all());
        // return User::find($id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        return User::destroy($id);
    }
}
