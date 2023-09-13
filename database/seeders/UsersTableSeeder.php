<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            // Admin
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email'=> 'admin@gmail.com',
                'password' => Hash::make('1010'), // Hash the password
                'role' => 'admin',
                'status' => 'active'
            ],
            // teacher
            [
                'name' => 'Teacher',
                'username' => 'teacher',
                'email'=> 'teacher@gmail.com',
                'password' => Hash::make('1010'), // Hash the password
                'role' => 'teacher',
                'status' => 'active'
            ],
            // User
            [
                'name' => 'User',
                'username' => 'user',
                'email'=> 'user@gmail.com',
                'password' => Hash::make('1010'), // Hash the password
                'role' => 'user',
                'status' => 'active'
            ],
        ]);
    }
}
