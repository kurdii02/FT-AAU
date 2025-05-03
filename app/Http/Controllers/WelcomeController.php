<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomepageContent;

class WelcomeController extends Controller
{
    public function home()
    {
        $headerContent = HomepageContent::where('section', 'header')->first();
        $featuresContent = HomepageContent::where('section', 'features')->first();
        $missionContent = HomepageContent::where('section', 'mission')->first();
        return view('welcome', ['header' => $headerContent, 'features' => $featuresContent, 'missions' => $missionContent]);
    }
}
