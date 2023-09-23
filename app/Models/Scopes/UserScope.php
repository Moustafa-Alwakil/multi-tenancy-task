<?php

namespace App\Models\Scopes;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;


class UserScope implements Scope
{
    public function apply(Builder $builder, Model $model): void
    {
        $builder->when(
            isTenant(),
            callback: function (Builder $builder) {
                $builder->where('tenant_id', tenant()->id)
                    ->when(
                        auth()->check(),
                        callback: function (Builder $builder) {
                            $builder->when(
                                auth()->user()->hasRole(User::MERCHANT),
                                callback: fn (Builder $builder) => $builder->where('tenant_id', auth()->user()->tenant_id)->role(User::USER),
                                default: fn (Builder $builder) => $builder->whereNull('id')
                            );
                        },
                    );
            }
        );
    }
}
