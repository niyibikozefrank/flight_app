<?php

namespace App\Http\Controllers;

use App\Models\ServiceHistory;
use App\Models\GroundService;
use App\Models\Service;
use App\Models\Passenger;
use App\Models\Staff;
use Illuminate\Http\Request;

class ServiceHistoryController extends Controller
{
    public function index()
    {
        $serviceHistory = ServiceHistory::with(['groundService', 'service', 'passenger', 'staff'])->latest()->get();
        return view('servicehistory.index', compact('serviceHistory'));
    }

    public function create()
    {
        $groundServices = GroundService::all();
        $services = Service::all();
        $passengers = Passenger::all();
        $staff = Staff::all();
        return view('servicehistory.create', compact('groundServices', 'services', 'passengers', 'staff'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ground_service_id' => 'required|exists:ground_services,id',
            'service_id' => 'required|exists:services,id',
            'passenger_id' => 'required|exists:passengers,id',
            'staff_id' => 'required|exists:staff,id',
            'cost' => 'required|numeric|min:0',
            'status' => 'required|in:pending,in-progress,completed,cancelled',
            'service_date' => 'required|date',
            'notes' => 'nullable|string'
        ]);

        ServiceHistory::create($request->all());

        return redirect()->route('servicehistory.index')->with('success', 'Service history recorded successfully');
    }

    public function edit($id)
    {
        $history = ServiceHistory::findOrFail($id);
        $groundServices = GroundService::all();
        $services = Service::all();
        $passengers = Passenger::all();
        $staff = Staff::all();
        return view('servicehistory.edit', compact('history', 'groundServices', 'services', 'passengers', 'staff'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ground_service_id' => 'required|exists:ground_services,id',
            'service_id' => 'required|exists:services,id',
            'passenger_id' => 'required|exists:passengers,id',
            'staff_id' => 'required|exists:staff,id',
            'cost' => 'required|numeric|min:0',
            'status' => 'required|in:pending,in-progress,completed,cancelled',
            'service_date' => 'required|date',
            'notes' => 'nullable|string'
        ]);

        $history = ServiceHistory::findOrFail($id);
        $history->update($request->all());

        return redirect()->route('servicehistory.index')->with('success', 'Service history updated successfully');
    }

    public function delete($id)
    {
        ServiceHistory::findOrFail($id)->delete();
        return redirect()->route('servicehistory.index')->with('success', 'Service history deleted successfully');
    }

    public function passengerHistory($passengerId)
    {
        $passenger = Passenger::findOrFail($passengerId);
        $serviceHistory = ServiceHistory::where('passenger_id', $passengerId)->latest()->get();
        return view('servicehistory.passenger-history', compact('passenger', 'serviceHistory'));
    }
}
