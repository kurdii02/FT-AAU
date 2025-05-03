<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomepageContent;

class FeaturesController extends Controller
{
    public function index()
    {
        $featuresContent = HomepageContent::where('section', 'features')->first();

        return view('home.features.index', ['featuresContent' => $featuresContent]);
    }
    public function edit()
    {
        $featuresContent = HomepageContent::where('section', 'features')->first();

        return view('home.features.edit', ['featuresContent' => $featuresContent]);
    }

    public function update(Request $request, HomepageContent $featuresContent)
    {

        $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'feature1' => 'nullable|string',
            'feature1_description' => 'nullable|string',
            'feature2' => 'nullable|string',
            'feature2_description' => 'nullable|string',
            'feature3' => 'nullable|string',
            'feature3_description' => 'nullable|string',
        ]);



        $content = $featuresContent->where('section', 'features')->get()->first()->content;


        // Update only the provided fields
        if ($request->has('title')) {
            $content['title'] = $request->input('title');
        }
        if ($request->has('subtitle')) {
            $content['sub_title'] = $request->input('subtitle');
        }
        if ($request->has('feature1')) {
            $content['feature1'] = $request->input('feature1');
        }
        if ($request->has('feature1_description')) {
            $content['feature1_description'] = $request->input('feature1_description');
        }
        if ($request->has('feature2')) {
            $content['feature2'] = $request->input('feature2');
        }
        if ($request->has('feature2_description')) {
            $content['feature2_description'] = $request->input('feature2_description');
        }
        if ($request->has('feature3')) {
            $content['feature3'] = $request->input('feature3');
        }
        if ($request->has('feature3_description')) {
            $content['feature3_description'] = $request->input('feature3_description');
        }

        // Save updated content
        $featuresContent->where('section', 'features')->get()->first()->update(['content' => $content]);

        return redirect()->route('features.index')->with('success', 'Features updated successfully.');
    }
}
