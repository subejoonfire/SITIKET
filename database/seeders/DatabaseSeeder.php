<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table('users')->insert([
            [
                'name' => 'admin',
                'iddepartment' => NULL,
                'email' => 'admin@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Jhonlin@123'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'sap-department',
                'iddepartment' => 1,
                'email' => 'sap-department@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Jhonlin@123'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // [
            //     'username' => 'it-department',
            //     'password' => Hash::make('Jhonlin@123'),
            //     'level' => 'department',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
        ]);
    }
}
