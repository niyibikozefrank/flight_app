<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $staff = Staff::all();
        return view('staff.index', compact('staff'));
    }

    public function create()
    {
        return view('staff.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'phone' => 'nullable',
            'department' => 'nullable',
            'employee_id' => 'nullable|unique:staff'
        ]);

        Staff::create($request->all());

        return redirect('/staff')->with('success', 'Staff member added successfully');
    }

    public function edit($id)
    {
        $staff = Staff::findOrFail($id);
        return view('staff.edit', compact('staff'));
    }

    public function update(Request $request, $id)
    {
        $staff = Staff::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'phone' => 'nullable',
            'department' => 'nullable',
            'employee_id' => 'nullable|unique:staff,employee_id,' . $id
        ]);

        $staff->update($request->all());

        return redirect('/staff')->with('success', 'Staff member updated successfully');
    }

    public function delete($id)
    {
        $staff = Staff::findOrFail($id);
        $staff->delete();

        return redirect('/staff')->with('success', 'Staff member deleted successfully');
    }
}
