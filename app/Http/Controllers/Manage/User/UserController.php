<?php

namespace App\Http\Controllers\Manage\User;

use App\Http\Controllers\Manage\CrudController;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends CrudController
{
    public static function getModel(array $attributes = [])
    {
        return new User($attributes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
        $requestFields = $request->all();
        $requestFields['password'] = bcrypt($request['password']);
        $user = new User($requestFields);
        $user->save();
        return response()->json('Saved');
    }

    /**
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'max:255',
            'email' => "max:255|email|unique:users,email,{$user->id}",
            'password' => 'min:6|confirmed',
            'status' => 'boolean',
        ]);
        $requestFields = $request->all();
        if(!empty($request['password'])) {
            $requestFields['password'] = bcrypt($request['password']);
        }
        $user->update($requestFields);
        return response()->json('Saved');
    }


    /**
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json('User was destroyed', 200);
    }
}
