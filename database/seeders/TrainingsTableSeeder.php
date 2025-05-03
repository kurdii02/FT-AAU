<?php

namespace Database\Seeders;

use App\Models\Training;
use App\Models\User;
use Illuminate\Database\Seeder;

class TrainingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = User::where('role_id', 3)->get(); // Assuming role_id 4 is for students
        $trainers = User::where('role_id', 4)->get(); // Assuming role_id 3 is for trainers
        $admins = User::where('role_id', 2)->get();
        foreach ($students as $student) {
            $trainer = $trainers->random();
            $admin = $admins->random();
            Training::create([
                'student_id' => $student->id,
                'trainer_id' => $trainer->id,
                'admin_id' => $admin->id, // Assuming you have an admin_id for trainers
                'company_id' => $trainer->company_id, // Ensure the company_id is set from the trainer
            ]);
        }
    }


}
