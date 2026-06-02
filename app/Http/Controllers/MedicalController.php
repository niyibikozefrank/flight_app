<?php

namespace App\Http\Controllers;

use App\Models\Medical;
use Illuminate\Http\Request;

class MedicalController extends Controller
{
    public function index()
    {
        $medicals = Medical::all();
        return view('medical.index', compact('medicals'));
    }

    public function create()
    {
        return view('medical.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:100'
        ]);

        Medical::create($request->all());

        return redirect()->route('medical.index')->with('success', 'Medical record created successfully');
    }

    public function edit($id)
    {
        $medical = Medical::findOrFail($id);
        return view('medical.edit', compact('medical'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:100'
        ]);

        $medical = Medical::findOrFail($id);
        $medical->update($request->all());

        return redirect()->route('medical.index')->with('success', 'Medical record updated successfully');
    }

    public function delete($id)
    {
        Medical::findOrFail($id)->delete();
        return redirect()->route('medical.index')->with('success', 'Medical record deleted successfully');
    }
}
