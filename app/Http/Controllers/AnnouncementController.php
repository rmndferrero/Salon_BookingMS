<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use Illuminate\Support\Facades\Storage;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the announcements.
     */
    public function index()
    {
        $announcements = Announcement::latest()->get();
        return view('manager.announcements', compact('announcements'));
    }

    /**
     * Store a newly created announcement.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string|max:400', // Matches your Alpine.js limit
            'image'   => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Handle Image Upload
        $path = $request->file('image')->store('announcements', 'public');

        // Logic: If there are currently less than 3 announcements, 
        // make this new one "featured" (Live) by default.
        $currentCount = Announcement::count();
        $isFeatured = $currentCount < 3;

        Announcement::create([
            'title'       => $request->title,
            'content'     => $request->content,
            'image_path'  => $path,
            'is_featured' => $isFeatured,
        ]);

        return back()->with('success', 'Announcement published successfully!');
    }

    /**
     * Show the form for editing the specified announcement.
     */
    public function edit(Announcement $announcement)
    {
        return view('manager.announcements_edit', compact('announcement'));
    }

    /**
     * Update the specified announcement.
     */
    public function update(Request $request, Announcement $announcement)
    {
        $validated = $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string|max:400',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $imagePath = $announcement->image_path;

        if ($request->hasFile('image')) {
            // Remove old image
            if ($announcement->image_path) {
                Storage::disk('public')->delete($announcement->image_path);
            }
            $imagePath = $request->file('image')->store('announcements', 'public');
        }

        $announcement->update([
            'title'      => $validated['title'],
            'content'    => $validated['content'],
            'image_path' => $imagePath,
        ]);

        return redirect()->route('manager.announcements.index')->with('success', 'Announcement updated successfully!');
    }

    /**
     * Remove the specified announcement.
     */
    public function destroy(Announcement $announcement)
    {
        if ($announcement->image_path) {
            Storage::disk('public')->delete($announcement->image_path);
        }

        $announcement->delete();

        return back()->with('success', 'Announcement deleted successfully!');
    }

    /**
     * Update the featured (Live) status for the feed.
     */
    public function updateFeatured(Request $request)
    {
        Announcement::query()->update(['is_featured' => false]);

        if ($request->has('featured_ids')) {
            $selectedIds = array_slice($request->featured_ids, 0, 3);
            
            Announcement::whereIn('id', $selectedIds)
                ->update(['is_featured' => true]);
        }

        return back()->with('success', 'Homepage feed updated successfully.');
    }
}