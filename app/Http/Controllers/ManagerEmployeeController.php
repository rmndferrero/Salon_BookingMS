<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Service;
use Illuminate\Http\Request;

class ManagerEmployeeController extends Controller
{
    public function index()
    {
        // Fetch all employees
        $employees = Employee::orderBy('first_name')->get();
        
        // Dynamically grab all unique categories currently in your database
        $categories = Service::select('category')->distinct()->pluck('category');
        
        return view('manager.employees', compact('employees', 'categories'));
    }

    public function store(Request $request)
    {
        // 1. Validate the input
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'can_do' => 'required|array|min:1', // Must select at least one skill
            'can_do.*' => 'string'
        ]);

        // 2. Save the employee (Laravel automatically casts 'can_do' to JSON!)
        Employee::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'can_do' => $request->can_do,
            'is_active' => true,
        ]);

        return redirect()->back()->with('success', 'New staff member successfully added!');
    }
}