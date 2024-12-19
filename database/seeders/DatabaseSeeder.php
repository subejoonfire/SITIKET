<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Seed Departments
        DB::table('departments')->insert([
            ['departmentname' => 'IT'],
            ['departmentname' => 'HR'],
            ['departmentname' => 'Finance'],
            ['departmentname' => 'Marketing'],
        ]);

        // Seed Companies
        DB::table('companies')->insert([
            ['companyname' => 'PT. Maju Mundur', 'companycode' => 'MM001'],
            ['companyname' => 'PT. Sukses Selalu', 'companycode' => 'SS002'],
        ]);

        // Seed Modules
        DB::table('modules')->insert([
            ['modulename' => 'FI'],
            ['modulename' => 'CO'],
            ['modulename' => 'FM'],
            ['modulename' => 'MM'],
            ['modulename' => 'PS'],
            ['modulename' => 'PP'],
            ['modulename' => 'HCM'],
            ['modulename' => 'PAYROLL'],
            ['modulename' => 'SD'],
        ]);

        // Seed Categories
        DB::table('categories')->insert([
            ['categoryname' => 'SOFTWARE'],
            ['categoryname' => 'HARDWARE'],
            ['categoryname' => 'SAP'],
            ['categoryname' => 'INFRASTRUKTUR'],
        ]);

        // Seed Priorities
        DB::table('priorities')->insert([
            ['priorityname' => 'LOW'],
            ['priorityname' => 'MEDIUM'],
            ['priorityname' => 'HIGH'],
        ]);

        // Seed Users
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('Jhonlin@123'),
                'level' => 1,
                'iddepartment' => 1,
                'idcompany' => 1,
            ],
            [
                'name' => 'Budi Santoso',
                'email' => 'budi.santoso@gmail.com',
                'password' => bcrypt('Jhonlin@123'),
                'level' => 2,
                'iddepartment' => 1,
                'idcompany' => 1,
            ],
            [
                'name' => 'Siti Aminah',
                'email' => 'siti.aminah@gmail.com',
                'password' => bcrypt('Jhonlin@123'),
                'level' => 2,
                'iddepartment' => 2,
                'idcompany' => 1,
            ],
            [
                'name' => 'Andi Prasetyo',
                'email' => 'andi.prasetyo@gmail.com',
                'password' => bcrypt('Jhonlin@123'),
                'level' => 2,
                'iddepartment' => 3,
                'idcompany' => 2,
            ],
            [
                'name' => 'Dewi Lestari',
                'email' => 'dewi.lestari@gmail.com',
                'password' => bcrypt('Jhonlin@123'),
                'level' => 2,
                'iddepartment' => 4,
                'idcompany' => 2,
            ],
        ]);
    }
}
