<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
        $password = Hash::make('Jhonlin@123');

        DB::table('users')->insert([
            [
                'id' => 1,
                'idmodule' => null,
                'name' => 'admin',
                'image' => null,
                'phone' => '084728188291',
                'level' => '1',
                'email' => 'admin@example.com',
                'email_verified_at' => now(),
                'password' => $password,
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'idmodule' => null,
                'name' => 'Ferdi Nurrahman',
                'image' => null,
                'phone' => '084728188291',
                'level' => '1',
                'email' => 'ferdinurrahman@gmail.com',
                'email_verified_at' => now(),
                'password' => $password,
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'idmodule' => null,
                'name' => 'helpdesk',
                'image' => null,
                'phone' => '084728188291',
                'level' => '2',
                'email' => 'helpdesk@gmail.com',
                'email_verified_at' => now(),
                'password' => $password,
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'idmodule' => null,
                'name' => 'Ferdi',
                'image' => null,
                'phone' => '083142170067',
                'level' => '3',
                'email' => 'ferdiart113@gmail.com',
                'email_verified_at' => now(),
                'password' => $password,
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'idmodule' => null,
                'name' => 'Andre',
                'image' => null,
                'phone' => '084728188291',
                'level' => '4',
                'email' => 'user@gmail.com',
                'email_verified_at' => now(),
                'password' => $password,
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'idmodule' => '1',
                'name' => 'RAUL',
                'image' => null,
                'phone' => '1232423',
                'level' => '3',
                'email' => 'PIC1@gmail.com',
                'email_verified_at' => null,
                'password' => $password,
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

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
        DB::table('tickets')->insert([
            [
                'id' => 1,
                'idmodule' => 1,
                'idcategory' => 1,
                'ticketcode' => 'TKT5202412130',
                'status' => 'DIAJUKAN',
                'issue' => 'dsaf',
                'detailissue' => 'adsf',
                'priority' => 'Bisa Menunggu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        foreach ($departments as $department) {
            DB::table('departments')->insert([
                'departmentname' => $department,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        DB::table('modules')->insert([
            [
                'id' => 1,
                'modulename' => 'TANK',
                'created_at' => Carbon::parse('2024-12-13 07:48:29'),
                'updated_at' => Carbon::parse('2024-12-13 07:48:29'),
            ],
        ]);
        DB::table('categories')->insert([
            [
                'id' => 1,
                'categoryname' => 'SOFTWARE',
                'created_at' => Carbon::parse('2024-12-13 07:49:34'),
                'updated_at' => Carbon::parse('2024-12-13 07:49:34'),
            ],
        ]);
    }
}
