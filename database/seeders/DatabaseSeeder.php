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

        DB::table('user')->insert([
            [
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('Jhonlin@123'),
                'level' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // [
            //     'username' => 'sap-department',
            //     'password' => Hash::make('Jhonlin@123'),
            //     'level' => 'department',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
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
