<?php

namespace App\Http\Controllers\Manage\Personal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PasswordController extends Controller
{
    /**
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|confirmed|min:6',
        ]);

        $request->user()->update([
            'password' => bcrypt($request->password),
        ]);
    }
}
