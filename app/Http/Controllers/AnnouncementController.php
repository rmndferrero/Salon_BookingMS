<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use Illuminate\Support\Facades\Storage;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::latest()->get();
        return view('manager.announcements', compact('announcements'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('announcements', 'public');
            $validated['image_path'] = $path;
        }

        Announcement::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'image_path' => $validated['image_path'],
        ]);

        return back()->with('success', 'New announcement posted successfully!');
    }

    // --- NEW: EDIT METHOD ---
    public function edit(Announcement $announcement)
    {
        return view('manager.announcements_edit', compact('announcement'));
    }

    // --- NEW: UPDATE METHOD ---
    public function update(Request $request, Announcement $announcement)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $imagePath = $announcement->image_path;

        if ($request->hasFile('image')) {
            // Delete the old image file to save space
            Storage::disk('public')->delete($announcement->image_path);
            // Store the new one
            $imagePath = $request->file('image')->store('announcements', 'public');
        }

        $announcement->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'image_path' => $imagePath,
        ]);

        return redirect()->route('manager.announcements.index')->with('success', 'Announcement updated successfully!');
    }

    // --- NEW: DELETE METHOD ---
    public function destroy(Announcement $announcement)
    {
        // Delete the image file from the storage folder
        if ($announcement->image_path) {
            Storage::disk('public')->delete($announcement->image_path);
        }

        $announcement->delete();

        return back()->with('success', 'Announcement deleted successfully!');
    }
}