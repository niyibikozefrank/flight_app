<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Staff;
use Illuminate\Http\Request;

class PilotController extends Controller
{
    /**
     * Display pilot chamber dashboard
     */
    public function index(Request $request)
    {
        $flights = Flight::with(['passenger', 'staff', 'gate'])
            ->where('status', '!=', 'cancelled')
            ->latest()
            ->get();

        $pilots = Staff::where('position', 'like', '%pilot%')
            ->orWhere('position', 'like', '%captain%')
            ->get();

        $departuresCount = Flight::where('status', 'scheduled')->count();
        $arrivalsCount = Flight::where('status', 'departed')->count();
        $boardingCount = Flight::where('status', 'boarding')->count();

        return view('pilots.index', compact('flights', 'pilots', 'departuresCount', 'arrivalsCount', 'boardingCount'));
    }

    /**
     * Show flight details for pilot
     */
    public function show($id)
    {
        $flight = Flight::with(['passenger', 'staff', 'gate'])->findOrFail($id);

        return view('pilots.show', compact('flight'));
    }

    /**
     * Update flight status (pilot operations)
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:boarding,departed,delayed'
        ]);

        $flight = Flight::findOrFail($id);
        $flight->update(['status' => $request->status]);

        return redirect()->route('pilots.index')
            ->with('success', 'Flight status updated successfully.');
    }

    /**
     * Pre-flight checklist
     */
    public function preflightChecklist($id)
    {
        $flight = Flight::with(['passenger', 'staff', 'gate'])->findOrFail($id);

        return view('pilots.preflight', compact('flight'));
    }
}
