<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * RUN
     */
    public function run(): void
    {
        /**
         * CREATE ADMIN
         */
        User::firstOrCreate(

            [
                'email' => 'admin@perpus.com'
            ],

            [
                'name' => 'Administrator',

                'password' => Hash::make('password'),
            ]

        );
    }
}