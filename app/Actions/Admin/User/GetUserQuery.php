<?php

namespace App\Actions\Admin\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class GetUserQuery
{
    public function __construct(
        public User $user,
        public Request $request
    ) {
        //
    }

    public function getMerchants(): Collection|array
    {
        return User::query()
            ->role('merchant')
            ->with('tenant')
            ->get();
    }

    public function getUsersForMerchant(User $merchant): Collection|array
    {
        return User::query()
            ->where('tenant_id', $merchant->tenant_id)
            ->role('user')
            ->with('tenant')
            ->get();
    }
}
