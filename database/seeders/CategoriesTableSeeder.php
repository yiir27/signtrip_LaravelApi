<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //登録するレコードの準備
        $categories = [
            ['name' => 'silent'],
            ['name' => 'ジブリ'],
        ];

        foreach($categories as $category) {
            Category::create($category);
        }
    }
}
