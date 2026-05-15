<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AssignRoleSeeder extends Seeder
{
    /**
     * RUN
     */
    public function run(): void
    {
        /**
         * GET USER
         */
        $user = User::where(

            'email',
            'admin@perpus.com'

        )->first();

        /**
         * ASSIGN ROLE
         */
        if ($user && !$user->hasRole('admin-perpustakaan')) {

            $user->assignRole(
                'admin-perpustakaan'
            );

        }
    }
}