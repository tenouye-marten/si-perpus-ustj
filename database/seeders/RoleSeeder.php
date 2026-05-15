<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * RUN
     */
    public function run(): void
    {
        /**
         * CREATE ROLE
         */
        Role::firstOrCreate([

            'name' => 'admin-perpustakaan'

        ]);
    }
}