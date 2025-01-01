<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    public function index()
    {
        $staffs = Staff::with('department')->get();
        return view('staffs.index', compact('staffs'));
    }
    public function create()
    {
        $departments = \App\Models\Department::all();
        return view('staffs.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'academic_rank' => 'required',
            'degree' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'department_id' => 'required',
        ]);

        Staff::create($request->all());
        return redirect()->route('staffs.index')->with('success', 'Staff created successfully');
    }

    public function show(Staff $staff)
    {
        return view('staffs.show', compact('staff'));
    }

    
    public function edit(Staff $staff)
    {
        $departments = Department::all();
        return view('staffs.edit', compact('staff','departments'));
    }

    
    public function update(Request $request, Staff $staff)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'academic_rank' => 'required',
            'degree' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'department_id' => 'required',
        ]);
        $staff->update($request->all());
        return redirect()->route('staffs.index')->with('success', 'Staff updated successfully');
    }

    
    public function destroy(Staff $staff)
    {
        $staff->delete();
        return redirect()->route('staffs.index')->with('success', 'Staff deleted successfully');
    }

    public function editMyProfile()
    {
        $user = Auth::user();
        $staff = $user->staff;

        if (!$staff) {
            abort(403, 'You are not a staff member.');
        }
        return view('staffs.editMyProfile', compact('staff'));
    }
    public function updateMyProfile(Request $request)
    {
        $user = Auth::user();
        $staff = $user->staff;

        if (!$staff) {
            abort(403, 'Unauthorized action.');
        }

        $validatedData = $request->validate([
            'phone' => 'nullable|max:15',
            'email' => 'nullable|email|max:255|unique:staffs,email,' . $staff->id,
        ]);

        $staff->update($validatedData);

        return redirect()->route('dashboard')->with('success', 'Your profile updated successfully!');
    }
}
