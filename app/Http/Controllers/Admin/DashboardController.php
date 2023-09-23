<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\User\GetUserQuery;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        return Inertia::render('Admin/Dashboard', [
            'merchants' => (new GetUserQuery(auth()->user(), $request))->getMerchants()
        ]);
    }
}
