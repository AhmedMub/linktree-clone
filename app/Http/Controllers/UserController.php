<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
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
            'background_color' => ['min:2', 'regex:/^[#a-z0-9\s]*$/i', 'required'],
            'text_color' => ['max:20', 'regex:/^[#a-z0-9\s]*$/i', 'required'],
            'text_bg' => ['max:20', 'regex:/^[#a-z0-9\s]*$/i', 'required'],
            'image' => ['mimes:jpeg,png,jpg', 'max:500'],
        ]);


        if ($validator->fails()) {

            return response()->json([

                'status' => 'fails',
                'errors' => $validator->errors()->toArray()
            ]);
        }


        if ($request->password) {

            $request->validate([
                'password' => ['regex:/^[a-z0-9\s]*$/i', 'min:3', 'confirmed'],
            ]);
            $auth->password = Hash::make($request->password);
        }

        if ($request->image) {

            //to delete old image if the new image is updated
            Storage::disk('public')->delete($auth->image);

            $auth->image =  $request->image->store('images');
        }
        $auth->username = $request->username;
        $auth->email = $request->email;
        $auth->background_color = $request->background_color;
        $auth->text_color = $request->text_color;
        $auth->text_bg = $request->text_bg;

        $auth->save();
        if ($auth) {

            return response()->json([

                'status' => 'success',
            ]);
        }
    }

    public function show($user)
    {
        //* when you use the $userLinks in foreach loop and use the links relationship this cause a secondary sql query to DB which is can effect performance for big projects,

        //*Remedy for such case is to call the load method for the user object and pass the name of relationship by that it will lazy load the relationship automatically on to the $userLinks object before passing it to the view

        $userLinks = User::whereUsername($user)->get();

        $userLinks->load('links');

        return view('public_pages.user', compact('userLinks'));
    }
}
