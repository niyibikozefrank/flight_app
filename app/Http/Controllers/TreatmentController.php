<?php

namespace App\Http\Controllers;

use App\Models\Treatment;
use Illuminate\Http\Request;

class TreatmentController extends Controller
{
    public function index()
    {
        $treatments = Treatment::all();
        return view('treatment.index', compact('treatments'));
    }

    public function create()
    {
        return view('treatment.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:100'
        ]);

        Treatment::create($request->all());

        return redirect()->route('treatment.index')->with('success', 'Treatment created successfully');
    }

    public function edit($id)
    {
        $treatment = Treatment::findOrFail($id);
        return view('treatment.edit', compact('treatment'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:100'
        ]);

        $treatment = Treatment::findOrFail($id);
        $treatment->update($request->all());

        return redirect()->route('treatment.index')->with('success', 'Treatment updated successfully');
    }

    public function delete($id)
    {
        Treatment::findOrFail($id)->delete();
        return redirect()->route('treatment.index')->with('success', 'Treatment deleted successfully');
    }
}
