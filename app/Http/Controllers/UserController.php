<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function edit()
    {

        return view('dashboard.user.edit', ['user' => Auth::user()]);
    }

    public function update()
    {
    }

    public function show(User $user)
    {

        return $user;
    }
}
