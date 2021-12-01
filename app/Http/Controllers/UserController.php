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

            'username' => ['required', 'max:20', 'regex:/^[a-z0-9\s]*$/i'],
            'email' => ['required', 'email'],
            'background_color' => ['min:2', 'regex:/^[a-z0-9\s]*$/i', 'nullable'],
            'text_color' => ['max:20', 'regex:/^[a-z0-9\s]*$/i', 'nullable'],
            'image' => ['mimes:jpeg,png,jpg', 'max:500'],
        ]);


        if ($validator->fails()) {

            return response()->json([

                'status' => 'fails',
                'errors' => $validator->errors()->toArray()
            ]);
        }

        if ($request->image) {

            $request->image->store('images');
        }

        if (!empty($request->password)) {

            $request->validate([
                'password' => ['regex:/^[a-z0-9\s]*$/i', 'min:3', 'confirmed'],
            ]);

            User::whereId($auth->id)->update([
                'password' => $request->password
            ]);
        }

        //TODO detect image changes
        if ($request->username !== $auth->username || $request->email !== $auth->email || $request->background_color !== $auth->background_color || $request->text_color !== $auth->text_color || $request->image !== $auth->image) {
            return response()->json([

                'status' => 'test',
                'data' => 'changed'
            ]);
        } else {
            return response()->json([

                'status' => 'test',
                'data' => 'nochange'
            ]);
        }

        // $user = User::whereId($auth->id)->update([
        //     'username' => $request->username,
        //     'email' => $request->email,
        //     'background_color' => $request->background_color,
        //     'text_color' => $request->text_color,

        // ]);

        // if ($user) {

        //     return response()->json([

        //         'status' => 'success',
        //         'data' => 'success'
        //     ]);
        // } else {
        //     return response()->json([

        //         'status' => 'noChanges',
        //         'data' => 'no content has been added'
        //     ]);
        // }
    }

    public function show(User $user)
    {

        return $user;
    }
}
