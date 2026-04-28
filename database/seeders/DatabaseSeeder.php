<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory(10)->create();
        User::factory()->create_admin()->create();
        User::factory()->create_user()->create();
        User::factory()->create_guest()->create();

        Category::factory(4)->create();

        Product::factory(20)->create();

        Order::factory(30)->create();
    }
}
