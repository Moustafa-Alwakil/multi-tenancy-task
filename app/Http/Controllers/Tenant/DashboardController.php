<?php

namespace App\Http\Controllers\Tenant;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Tenant\User\GetUserQuery;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        return Inertia::render('Tenant/Dashboard', [
            'users' => (new GetUserQuery(auth()->user(), $request))->getUsers()
        ]);
    }
}
