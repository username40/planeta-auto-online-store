<?php

namespace App\Http\Controllers\Manage\Personal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $user = $request->user();

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);

        return tap($user)->update($request->only('name', 'email'));
    }
}
