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
            ['departmentname' => 'Logistics'],
            ['departmentname' => 'Legal'],
            ['departmentname' => 'R&D'],
            ['departmentname' => 'Training'],
            ['departmentname' => 'Warehouse'],
        ]);

        // Seed Companies
        DB::table('companies')->insert([
            ['companyname' => 'PT. Jhonlin Baratama', 'companycode' => 'JB001'],
            ['companyname' => 'PT. Jhonlin Agro Raya', 'companycode' => 'JAR002'],
            ['companyname' => 'PT. Jhonlin Marine Trans', 'companycode' => 'JMT003'],
            ['companyname' => 'PT. Jhonlin Marine Lines', 'companycode' => 'JML004'],
            ['companyname' => 'PT. Jhonlin Group', 'companycode' => 'JG005'],
            ['companyname' => 'PT. Dua Samudra Perkasa', 'companycode' => 'DSP006'],
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
            ['modulename' => 'CRM'],
            ['modulename' => 'SCM'],
        ]);

        // Seed Categories
        DB::table('categories')->insert([
            ['categoryname' => 'SOFTWARE'],
            ['categoryname' => 'HARDWARE'],
            ['categoryname' => 'SAP'],
            ['categoryname' => 'INFRASTRUKTUR'],
            ['categoryname' => 'NETWORKING'],
        ]);

        // Seed Priorities
        DB::table('priorities')->insert([
            ['priorityname' => 'LOW'],
            ['priorityname' => 'MEDIUM'],
            ['priorityname' => 'HIGH'],
        ]);

        // Seed Jhonlins
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('Jhonlin@123'),
                'email_verified_at' => now(),
                'phone_verified_at' => now(),
                'phone' => '08232323123',
                'level' => 1,
                'iddepartment' => 1,
                'idcompany' => 1,
            ],
            [
                'name' => 'Budi Santoso',
                'email' => 'budi.santoso@gmail.com',
                'password' => bcrypt('Jhonlin@123'),
                'email_verified_at' => now(),
                'phone_verified_at' => now(),
                'phone' => '08252323111',
                'level' => 2,
                'iddepartment' => 1,
                'idcompany' => 1,
            ],
            [
                'name' => 'Siti Aminah',
                'email' => 'siti.aminah@gmail.com',
                'password' => bcrypt('Jhonlin@123'),
                'email_verified_at' => now(),
                'phone_verified_at' => now(),
                'phone' => '0823232313',
                'level' => 2,
                'iddepartment' => 2,
                'idcompany' => 1,
            ],
            [
                'name' => 'Andi Prasetyo',
                'email' => 'andi.prasetyo@gmail.com',
                'password' => bcrypt('Jhonlin@123'),
                'email_verified_at' => now(),
                'phone_verified_at' => now(),
                'phone' => '08232323311',
                'level' => 2,
                'iddepartment' => 3,
                'idcompany' => 2,
            ],
            [
                'name' => 'Dewi Lestari',
                'email' => 'dewi.lestari@gmail.com',
                'password' => bcrypt('Jhonlin@123'),
                'email_verified_at' => now(),
                'phone_verified_at' => now(),
                'phone' => '08232323621',
                'level' => 2,
                'iddepartment' => 4,
                'idcompany' => 2,
            ],
            [
                'name' => 'Ahmad Ramadhan',
                'email' => 'ahmad.ramadhan@gmail.com',
                'password' => bcrypt('Jhonlin@123'),
                'email_verified_at' => now(),
                'phone_verified_at' => now(),
                'phone' => '08212345678',
                'level' => 2,
                'iddepartment' => 1,
                'idcompany' => 1,
            ],
            [
                'name' => 'Nurul Hidayati',
                'email' => 'nurul.hidayati@gmail.com',
                'password' => bcrypt('Jhonlin@123'),
                'email_verified_at' => now(),
                'phone_verified_at' => now(),
                'phone' => '08298765432',
                'level' => 2,
                'iddepartment' => 2,
                'idcompany' => 1,
            ],
            [
                'name' => 'Hendri Setiawan',
                'email' => 'hendri.setiawan@gmail.com',
                'password' => bcrypt('Jhonlin@123'),
                'email_verified_at' => now(),
                'phone_verified_at' => now(),
                'phone' => '08287654321',
                'level' => 2,
                'iddepartment' => 3,
                'idcompany' => 2,
            ],
            [
                'name' => 'Rini Kartika',
                'email' => 'rini.kartika@gmail.com',
                'password' => bcrypt('Jhonlin@123'),
                'email_verified_at' => now(),
                'phone_verified_at' => now(),
                'phone' => '08276543219',
                'level' => 2,
                'iddepartment' => 4,
                'idcompany' => 2,
            ],
            [
                'name' => 'Fajar Maulana',
                'email' => 'helpdesk@gmail.com',
                'password' => bcrypt('Jhonlin@123'),
                'email_verified_at' => now(),
                'phone_verified_at' => now(),
                'phone' => '08265432121',
                'level' => 2,
                'iddepartment' => 5,
                'idcompany' => 2,
            ],
            [
                'name' => 'PIC Testing',
                'email' => 'PIC1@gmail.com',
                'password' => bcrypt('Jhonlin@123'),
                'email_verified_at' => now(),
                'phone_verified_at' => now(),
                'phone' => '08265432191',
                'level' => 3,
                'iddepartment' => 5,
                'idcompany' => 2,
            ],
            [
                'name' => 'Harlan Muradi',
                'email' => 'harlanmuradi@gmail.com',
                'password' => bcrypt('Jhonlin@123'),
                'email_verified_at' => now(),
                'phone_verified_at' => now(),
                'phone' => '08265432199',
                'level' => 4,
                'iddepartment' => 5,
                'idcompany' => 2,
            ],
            [
                'name' => 'Ferdi Nurrahman',
                'email' => 'ferdi@gmail.com',
                'password' => bcrypt('Jhonlin@123'),
                'email_verified_at' => now(),
                'phone_verified_at' => now(),
                'phone' => '082251945796',
                'level' => 4,
                'iddepartment' => 5,
                'idcompany' => 2,
            ],
        ]);
    }
}
