<?php

namespace App\Http\Controllers;

use App\Models\ServiceRecord;
use App\Models\Passenger;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceRecordController extends Controller
{
    public function index()
    {
        $serviceRecords = ServiceRecord::with(['passenger', 'service'])->latest()->get();
        return view('servicerecords.index', compact('serviceRecords'));
    }

    public function create()
    {
        $passengers = Passenger::all();
        $services = Service::all();
        return view('servicerecords.create', compact('passengers', 'services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'passenger_id' => 'required|exists:passengers,id',
            'service_id' => 'required|exists:services,id',
            'details' => 'nullable|string',
            'notes' => 'nullable|string',
            'cost' => 'nullable|numeric|min:0',
            'record_date' => 'required|date'
        ]);

        ServiceRecord::create($request->all());

        return redirect()->route('servicerecords.index')->with('success', 'Service record created successfully');
    }

    public function edit($id)
    {
        $serviceRecord = ServiceRecord::findOrFail($id);
        $passengers = Passenger::all();
        $services = Service::all();
        return view('servicerecords.edit', compact('serviceRecord', 'passengers', 'services'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'passenger_id' => 'required|exists:passengers,id',
            'service_id' => 'required|exists:services,id',
            'details' => 'nullable|string',
            'notes' => 'nullable|string',
            'cost' => 'nullable|numeric|min:0',
            'record_date' => 'required|date'
        ]);

        $serviceRecord = ServiceRecord::findOrFail($id);
        $serviceRecord->update($request->all());

        return redirect()->route('servicerecords.index')->with('success', 'Service record updated successfully');
    }

    public function delete($id)
    {
        ServiceRecord::findOrFail($id)->delete();
        return redirect()->route('servicerecords.index')->with('success', 'Service record deleted successfully');
    }

    public function passengerRecords($passengerId)
    {
        $passenger = Passenger::findOrFail($passengerId);
        $serviceRecords = ServiceRecord::where('passenger_id', $passengerId)->latest()->get();
        return view('servicerecords.passenger-records', compact('passenger', 'serviceRecords'));
    }
}
