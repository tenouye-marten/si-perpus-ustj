<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * SEED DATABASE
     */
    public function run(): void
    {
        $this->call([

            RoleSeeder::class,

            UserSeeder::class,

            AssignRoleSeeder::class,

            StaffSeeder::class,
        FakultasSeeder::class,
            ProdiSeeder::class,
                        BookSeeder::class,

         SkripsiSeeder::class,
        
                        ]);
    }
}