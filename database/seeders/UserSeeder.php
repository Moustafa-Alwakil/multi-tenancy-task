<?php

namespace Database\Seeders;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = User::query()->create([
            'name' => fake()->name(),
            'email' => "super_admin@gmail.com",
            'password' => bcrypt(123123123),
        ]);

        $superAdmin->assignRole(User::SUPER_ADMIN);

        foreach (Tenant::all() as $tenant) {
            $merchant = User::query()->create([
                'name' => fake()->name(),
                'email' => "tenant_merchant_$tenant->id@gmail.com",
                'password' => bcrypt(123123123),
                'tenant_id' => $tenant->id
            ]);

            $merchant->assignRole(User::MERCHANT);

            for ($i = 1; $i <= 100; $i++) {
                $user = User::query()->create([
                    'name' => fake()->name(),
                    'email' => "tenant_user_{$tenant->id}_$i@gmail.com",
                    'password' => bcrypt(123123123),
                    'tenant_id' => $tenant->id
                ]);

                $user->assignRole(User::USER);
            }
        }
    }
}
