<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = \App\Models\Department::all();
        return view('departments.index', compact('departments'));
    }
    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:departments|max:255',
            'code' => 'required|unique:departments|max:255',
            'phone' => 'required|unique:departments|max:255',
            'email' => 'required|unique:departments|max:255',
            'website' => 'required|unique:departments|max:255',
            'address' => 'required|unique:departments|max:255',

        ]);
        Department::create($request->all());
        return redirect()->route('departments.index')->with('success', 'Department created successfully');
    }
    public function show(string $id)
    {
        $department = \App\Models\Department::find($id);
        return view('departments.show', compact('department'));
    }
    public function edit(string $id)
    {
        return view('departments.edit', compact('department'));   
    }
    public function update(Request $request, Department $department)
    {
        $request->validate([
            'name' => 'required|unique:departments|max:255',
            'code' => 'required|unique:departments|max:255',
            'phone' => 'required|unique:departments|max:255',
            'email' => 'required|unique:departments|max:255',
            'website' => 'required|unique:departments|max:255',
            'address' => 'required|unique:departments|max:255',
        ]);
        $department->update($request->all());
        return redirect()->route('departments.index')->with('success', 'Department updated successfully');
    }
    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('departments.index')->with('success', 'Department deleted successfully');        
    }
}
