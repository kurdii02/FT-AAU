<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomepageContent;

class MissionController extends Controller
{
    public function index()
    {
        $missionContent = HomepageContent::where('section', 'mission')->first();

        return view('home.mission.index', ['missionContent' => $missionContent]);
    }
    public function edit()
    {
        $missionContent = HomepageContent::where('section', 'mission')->first();

        return view('home.mission.edit', ['missionContent' => $missionContent->content, 'mission' => $missionContent]);
    }
    public function update(Request $request, HomepageContent $featuresContent)
    {

        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'mission1' => 'nullable|string',
            'mission2' => 'nullable|string',
            'mission3' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',


        ]);



        $content = $featuresContent->where('section', 'mission')->get()->first()->content;


        // Update only the provided fields
        if ($request->has('title')) {
            $content['title'] = $request->input('title');
        }
        if ($request->has('description')) {
            $content['description'] = $request->input('description');
        }
        if ($request->has('mission1')) {
            $content['mission1'] = $request->input('mission1');
        }
        if ($request->has('mission2')) {
            $content['mission2'] = $request->input('mission2');
        }

        if ($request->has('mission3')) {
            $content['mission3'] = $request->input('mission3');
        }
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $content['image'] = $imagePath;
        }

        // Save updated content
        $featuresContent->where('section', 'mission')->get()->first()->update(['content' => $content]);

        return redirect()->route('mission.index')->with('success', 'Missions updated successfully.');
    }
}
