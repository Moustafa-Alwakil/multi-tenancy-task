<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::query()->create([
            'name' => User::SUPER_ADMIN,
        ]);

        Role::query()->create([
            'name' => User::MERCHANT,
        ]);

        Role::query()->create([
            'name' => User::USER,
        ]);
    }
}
