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
                'level' => 1,
                // 'iddepartment' => NULL,
                'email' => 'admin@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Jhonlin@123'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        DB::table('departments')->insert([
            [
                'departmentname' => 'SAP',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
