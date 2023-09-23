<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Auth\LoginUserHandler;
use App\Actions\Auth\LogoutUserHandler;
use App\Http\Requests\Admin\Auth\LoginRequest;

class AuthController extends Controller
{
    public function loginPage(Request $request)
    {
        return Inertia::render('Admin/Auth/Login');
    }

    public function login(LoginRequest $request)
    {
        (new LoginUserHandler($request))->handle();

        return Inertia::location(route('dashboard'));
    }

    public function logout(Request $request)
    {
        (new LogoutUserHandler($request))->handle();

        return Inertia::location(route('login'));
    }
}
