<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Appeler le seeder pour le superadmin
        $this->call(SuperAdminSeeder::class);
    }
}
