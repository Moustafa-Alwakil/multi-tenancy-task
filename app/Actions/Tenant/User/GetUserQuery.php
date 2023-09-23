<?php

namespace App\Actions\Tenant\User;

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

    public function getUsers(): Collection|array
    {
        return User::query()
            ->get();
    }
}
