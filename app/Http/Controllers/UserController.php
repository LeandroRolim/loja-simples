<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return UserResource::collection(User::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(UserRequest $request, User $user)
    {
        $user->fill($request->only(['name', 'email']));
        $user->password = Hash::make($request->input('password'));
        $user->save();
        return $user;
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->id == Auth::id()) {
            return response('', 403);
        }
        $user->delete();
        return response('', 204);
    }
}
