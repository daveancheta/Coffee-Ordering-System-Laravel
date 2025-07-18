<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\OrderDone;
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
            'table' => 'tableone',
            'password' => 'nigga',
        ]);

        OrderDone::factory()->create([
            'id' => '2',
            'user_id' => '5',
            'table' => 'tablefive',
            'coffee_id' => '5',
            'coffee' => 'choco',
            'price' => '10',
            'quantity' => '10',
        ]);
    }
}
