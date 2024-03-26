<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $user = User::find(1);
        // Old: Traditional
        $user->name = 'Admin';
        $user->save();
        // New: Modern
        $property = 'name';
        $user->$property = 'Admin';
        $method = 'save';
        $result = $user->$method();
        if ($result) {
            return redirect()->to('/');
        }
    }

    public function register(Request $request)
    {
        $user = User::find(1);
        // Old: Traditional
        $user->name = 'Admin';
        $user->save();
        // New: Modern
        $property = 'name';
        $user->$property = 'Admin';
        $method = 'save';
        $result = $user->$method();
        if ($result) {
            return redirect()->to('dang-nhap');
        }
    }
}
