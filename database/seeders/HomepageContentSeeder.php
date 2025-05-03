<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HomepageContent;

class HomepageContentSeeder extends Seeder
{
    public function run()
    {
        HomepageContent::insert([
            [
                'section' => 'header',
                'content' => json_encode([
                    'title' => 'Experience the Real World 8 Weeks of Hands-On Learning ',
                    'subtitle' => 'Field Training Program',
                    'description' => 'The Field Training Course is an 8-week program totaling 240 hours, giving students hands-on experience in real-world projects. It’s a chance to apply what you’ve learned in class, build practical skills, and work with professionals to prepare for your future career. ',
                    'image' => 'http://127.0.0.1:8000/images/logo.png'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'section' => 'features',
                'content' => json_encode([
                    'title' => 'Training That Makes a Difference',
                    'sub_title' => 'Experience a comprehensive training program designed to bridge the gap between academia and industry',
                    'feature1' => 'Student Support',
                    'feature1_description' => 'Get personalized guidance and support throughout your training journey. Our platform makes it easy to track progress and stay connected with mentors.',
                    'feature2' => 'Trainer Management',
                    'feature2_description' => 'Efficient coordination between trainers and students ensures optimal learning outcomes. Monitor progress and provide timely feedback.',
                    'feature3' => 'Supervisor Dashboard',
                    'feature3_description' => 'Comprehensive oversight tools for university supervisors to monitor student progress and ensure training quality standards.'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'section' => 'mission',
                'content' => json_encode([
                    'title' => 'Bridging Education and Industry',
                    'description' => 'To provide top-notch web solutions.',
                    'mission1' => ' Practical skill development',
                    'mission2' => ' Industry networking',
                    'mission3' => 'Career preparation'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
