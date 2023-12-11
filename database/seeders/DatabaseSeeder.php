<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //CategoriesTableSeederファイルをシーディングの対象にする
        $this->call(CategoriesTableSeeder::class);
        $this->call(UsersSeeder::class);
    }
}
