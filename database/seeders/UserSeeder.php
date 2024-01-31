<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User Superadmin
        DB::table('users')->insert([
            'name' => 'Superadmin',
            'username' => Str::random(10),
            'email' => 'superadmin@example.com',
            'role' => 'superadmin',
            'password' => Hash::make('123456'),
        ]);

        // User Admin
        DB::table('users')->insert([
            'name' => 'Admin',
            'username' => Str::random(10),
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => Hash::make('123456'),
        ]);

        // User Biasa
        DB::table('users')->insert([
            'name' => 'User Biasa',
            'username' => Str::random(10),
            'email' => 'user@example.com',
            'role' => 'pimpinan',
            'password' => Hash::make('123456'),
        ]);
    }
}
