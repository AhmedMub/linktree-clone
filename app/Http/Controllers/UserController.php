<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function edit()
    {
    }

    public function update()
    {
    }

    public function show(User $user)
    {

        return $user;
    }
}
