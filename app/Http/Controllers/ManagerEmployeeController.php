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

    // 1. Show the Edit Form
    public function edit(Employee $employee)
    {
        // Get all unique categories for the checkboxes
        $categories = \App\Models\Service::select('category')->distinct()->pluck('category');
        return view('manager.employees-edit', compact('employee', 'categories'));
    }

    // 2. Process the Update
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'can_do' => 'nullable|array', // Nullable in case they uncheck all boxes
            'can_do.*' => 'string'
        ]);

        $employee->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            // If they uncheck all boxes, $request->can_do is null, so we default to an empty array []
            'can_do' => $request->can_do ?? [], 
            // The HTML checkbox only sends data if it is checked
            'is_active' => $request->has('is_active'), 
        ]);

        return redirect()->route('manager.employees.index')->with('success', 'Employee profile updated successfully!');
    }

    // 3. Process the Delete
    public function destroy(Employee $employee)
    {
        $employeeName = $employee->first_name;
        $employee->delete();
        
        return redirect()->route('manager.employees.index')->with('success', "$employeeName has been permanently removed from the system.");
    }
}