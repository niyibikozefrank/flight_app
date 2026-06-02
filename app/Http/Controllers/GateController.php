<?php

namespace App\Http\Controllers;

use App\Models\Gate;
use Illuminate\Http\Request;

class GateController extends Controller
{
    /**
     * Display a listing of the gates.
     */
    public function index()
    {
        $gates = Gate::all();
        return view('gates.index', compact('gates'));
    }

    /**
     * Show the form for creating a new gate.
     */
    public function create()
    {
        $types = Gate::TYPES;
        $statuses = Gate::STATUSES;
        return view('gates.create', compact('types', 'statuses'));
    }

    /**
     * Store a newly created gate in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'gate_number' => ['required', 'string', 'max:50', 'unique:gates'],
            'terminal' => ['nullable', 'string', 'max:100'],
            'capacity' => ['required', 'integer', 'min:50', 'max:500'],
            'status' => ['required', 'in:available,occupied,maintenance,cleaning,closed'],
            'description' => ['nullable', 'string', 'max:500'],
        ]);

        Gate::create($validated);

        return redirect()->route('gates.index')->with('success', 'Gate created successfully.');
    }

    /**
     * Display the specified gate.
     */
    public function show(Gate $gate)
    {
        return view('gates.show', compact('gate'));
    }

    /**
     * Show the form for editing the specified gate.
     */
    public function edit(Gate $gate)
    {
        $types = Gate::TYPES;
        $statuses = Gate::STATUSES;
        return view('gates.edit', compact('gate', 'types', 'statuses'));
    }

    /**
     * Update the specified gate in storage.
     */
    public function update(Request $request, Gate $gate)
    {
        $validated = $request->validate([
            'gate_number' => ['required', 'string', 'max:50', 'unique:gates,gate_number,' . $gate->id],
            'terminal' => ['nullable', 'string', 'max:100'],
            'capacity' => ['required', 'integer', 'min:50', 'max:500'],
            'status' => ['required', 'in:available,occupied,maintenance,cleaning,closed'],
            'description' => ['nullable', 'string', 'max:500'],
        ]);

        $gate->update($validated);

        return redirect()->route('gates.index')->with('success', 'Gate updated successfully.');
    }

    /**
     * Remove the specified gate from storage.
     */
    public function destroy(Gate $gate)
    {
        $gate->delete();
        return redirect()->route('gates.index')->with('success', 'Gate deleted successfully.');
    }
}
