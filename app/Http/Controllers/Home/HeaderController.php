<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomepageContent;

class HeaderController extends Controller
{
    public function index()
    {
        $headerContent = HomepageContent::where('section', 'header')->first();


        return view('home.header.index', ['headerContent' => $headerContent->content, 'header' => $headerContent]);
    }

    public function edit()
    {
        $headerContent = HomepageContent::where('section', 'header')->first();
        return view('home.header.edit', ['headerContent' => $headerContent]);
    }

    public function update(Request $request, HomepageContent $headerContent)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);



        $content = $headerContent->get()->first()->content;

        // Update only the provided fields
        if ($request->has('title')) {
            $content['title'] = $request->input('title');
        }

        if ($request->has('subtitle')) {
            $content['subtitle'] = $request->input('subtitle');
        }
        if ($request->has('description')) {
            $content['description'] = $request->input('description');
        }
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $content['image'] = $imagePath;
        }
        // Save updated content
        $headerContent->get()->first()->update(['content' => $content]);

        return redirect()->route('header.index')->with('success', 'Header updated successfully.');
    }
}
