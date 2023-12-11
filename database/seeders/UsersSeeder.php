<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'taro',
                'email' => 'taro@gmail.com',
                'password' => Hash::make('12345678'),    
            ],
            [
                'name' => 'test',
                'email' => 'test@gmail.com',
                'password' => Hash::make('testtest'),    
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
