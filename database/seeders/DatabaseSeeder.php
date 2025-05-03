<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
            CompaniesTableSeeder::class,
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            TrainingsTableSeeder::class,

        ]);
    }
}
