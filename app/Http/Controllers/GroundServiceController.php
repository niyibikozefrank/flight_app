<?php

namespace App\Http\Controllers;

use App\Models\GroundService;
use Illuminate\Http\Request;

class GroundServiceController extends Controller
{
    public function index()
    {
        $groundServices = GroundService::all();
        return view('groundservices.index', compact('groundServices'));
    }

    public function create()
    {
        return view('groundservices.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:100',
            'price' => 'nullable|numeric|min:0'
        ]);

        GroundService::create($request->all());

        return redirect()->route('groundservices.index')->with('success', 'Ground service created successfully');
    }

    public function edit($id)
    {
        $groundService = GroundService::findOrFail($id);
        return view('groundservices.edit', compact('groundService'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:100',
            'price' => 'nullable|numeric|min:0'
        ]);

        $groundService = GroundService::findOrFail($id);
        $groundService->update($request->all());

        return redirect()->route('groundservices.index')->with('success', 'Ground service updated successfully');
    }

    public function delete($id)
    {
        GroundService::findOrFail($id)->delete();
        return redirect()->route('groundservices.index')->with('success', 'Ground service deleted successfully');
    }
}
