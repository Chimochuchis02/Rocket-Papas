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
            'email' => 'alfonso@fruteria.com.mx',
            'password' => Hash::make('F1234'),
            'role' => 'admin',
        ]);

        DB::table('users')->insert([
            'name' => 'Monse Reyes',
            'email'=> 'monse@fruteria.com.mx ',
            'password' => Hash::make('F1234'),
            'role' => 'admin',
        ]);
    }
}
