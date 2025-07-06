<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

         User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => 12345678,
            'role' => true,
        ],);

        User::factory()->create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => 12345678,
            'role' => false,
        ],);


        Order::factory()->create([
            'user_id' => 2,
            'total_amount' => 100.00,
            'status' => 'pending',
            'shipping_address' => '123 Main St, City, Country',

        ],);

        $this->call(ProductSeeder::class);
    }
}
