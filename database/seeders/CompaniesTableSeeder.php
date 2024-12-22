<?php

namespace Database\Seeders;

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;

class CompaniesTableSeeder extends Seeder
{
    public function run()
    {
        // Create 5 sample companies (you can adjust this number as needed)
        Company::factory()->count(10)->create();
    }
}

