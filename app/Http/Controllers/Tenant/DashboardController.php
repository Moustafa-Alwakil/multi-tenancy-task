<?php

namespace App\Http\Controllers\Tenant;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Tenant\User\GetUserQuery;

class DashboardController extends Controller
{
    public function merchant(Request $request)
    {
        return Inertia::render('Tenant/Merchant/Dashboard', [
            'users' => (new GetUserQuery(auth()->user(), $request))->getUsers()
        ]);
    }

    public function user(Request $request)
    {
        return Inertia::render('Tenant/User/Dashboard');
    }
}
