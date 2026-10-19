<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Membuat 5 akun user dummy
        for ($i = 0; $i < 5; $i++) {
            DB::table('users')->insert([
                'name'     => $faker->name,
                'email'    => $faker->unique()->safeEmail,
                'password' => Hash::make('password'), // Password standar: "password"
            ]);
        }

        // Membuat 1 akun admin khusus
        DB::table('users')->insert([
            'name'     => 'Administrator',
            'email'    => 'admin@example.com',
            'password' => Hash::make('admin123'), // Password admin: "admin123"
        ]);
    }
}