<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function edit()
    {
        $auth = User::findOrFail(Auth::id());

        return response()->json([

            'data' =>  $auth
        ]);
    }

    public function update(Request $request)
    {
        $auth = User::findOrFail(Auth::id());

        $validator = Validator::make($request->all(), [

            'username' => ['required', 'max:20', 'string'],
            'email' => ['required', 'email', 'unique:links,link,' . $auth],
            'background_color' => ['required', 'max:20', 'string', 'email', 'unique:links,link,' . $auth],
            'text_color' => ['required', 'max:20', 'string', 'email', 'unique:links,link,' . $auth],
            'image' => ['mimes:jpeg,png,jpg', 'max:500'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
        ]);

        if ($validator->fails()) {

            return response()->json([

                'status' => 'fails',
                'data' => $validator->errors()->toArray()
            ]);
        }

        return response()->json([

            'status' => 'success',
            'data' => 'data'
        ]);
    }

    public function show(User $user)
    {

        return $user;
    }
}
