<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Alfonso Del Toro',
            'email' => 'alfonsodtoro@rocketpapas.com',
            'password' => Hash::make('Torillo2026'),
            'role' => 'admin',
        ]);

        DB::table('users')->insert([
            'name' => 'Montse Reyes',
            'email'=> 'montser@rocketpapas.com',
            'password' => Hash::make('Reyes2026'),
            'role' => 'admin',
        ]);
    }
}
