<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {

        User::factory()->superAdmin()->create();

        // Create 10 student users
        User::factory()->count(10)->student()->create();

        // Create 10 trainer users
        User::factory()->count(10)->trainer()->create();

        User::factory()->count(10)->admin()->create();
    }
}
