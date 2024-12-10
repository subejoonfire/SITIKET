<?php

namespace Database\Seeders;

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
        // Truncate the users and departments table to avoid duplicate entries
        DB::table('users')->truncate();
        DB::table('departments')->truncate();

        // Seed users table
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'phone' => '084728188291',
                'level' => 1,
                'email' => 'admin@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Jhonlin@123'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ferdi Nurrahman',
                'phone' => '084728188291',
                'level' => 1,
                'email' => 'ferdinurrahman@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Jhonlin@123'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'helpdesk',
                'phone' => '084728188291',
                'level' => 2,
                'email' => 'helpdesk@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Jhonlin@123'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ferdi',
                'phone' => '083142170067',
                'level' => 3,
                'email' => 'ferdiart113@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Jhonlin@123'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'user',
                'phone' => '084728188291',
                'level' => 4,
                'email' => 'user@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Jhonlin@123'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Seed departments table
        $departments = [
            'GA',
            'HR',
            'HSE',
            'LOG',
            'ENGINEERING',
            'CDR',
            'PLANT',
            'PCR',
            'WAREHOUSE',
            'MPLANT',
            'FPLANT',
            'DREDGING',
            'PROJECT',
            'HRGA',
            'ACCOUNTING',
            'LOGISTIC',
            'SHE',
            'JSS',
            'COAL',
            'LEGAL',
            'FUEL',
            'MARKETING',
            'OPR',
            'BOD',
            'SCFUEL',
            'MPLANT'
        ];

        foreach ($departments as $department) {
            DB::table('departments')->insert([
                'departmentname' => $department,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
