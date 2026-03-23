<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ManagerServiceController extends Controller
{
    // READ: Show all services
    public function index()
    {
        // Fetch all services, ordered by newest first
        $services = Service::latest()->get(); 
        return view('manager.services', compact('services'));
    }

    // CREATE: Save a new service
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'is_package' => 'sometimes|boolean',
        ]);

        Service::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'is_package' => $request->boolean('is_package'),
        ]);

        return redirect()->back()->with('success', 'New service added successfully!');
    }

    // UPDATE: Update an existing service
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'is_package' => 'sometimes|boolean',
        ]);

        $service->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'is_package' => $request->boolean('is_package'),
        ]);

        return redirect()->back()->with('success', 'Service updated successfully!');
    }

    // DELETE: Remove a service
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->back()->with('success', 'Service removed.');
    }
}