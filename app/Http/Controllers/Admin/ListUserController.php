<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\User\GetUserQuery;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class ListUserController extends Controller
{
    public function __invoke(Request $request, $merchant_id)
    {
        $merchant = User::query()
            ->role(User::MERCHANT)
            ->where('id', $merchant_id)
            ->firstOrFail();

        return Inertia::render('Admin/Users', [
            'users' => (new GetUserQuery(auth()->user(), $request))->getUsersForMerchant($merchant)
        ]);
    }
}
