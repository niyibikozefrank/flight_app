<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Passenger;
use App\Models\Staff;
use App\Models\Gate;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    /**
     * Display flights list
     */
    public function index(Request $request)
    {
        $query = Flight::with(['passenger', 'staff', 'gate']);

        // FILTER BY STAFF
        if ($request->staff_id) {
            $query->where('staff_id', $request->staff_id);
        }

        // FILTER BY STATUS
        if ($request->status) {
            $query->where('status', $request->status);
        }

        // FILTER BY DESTINATION
        if ($request->destination) {
            $query->where('destination', $request->destination);
        }

        // ORDER LATEST FIRST
        $flights = $query->latest()->get();

        return view('flights.index', compact('flights'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        $passengers = Passenger::all();
        $staff = Staff::all();
        $gates = Gate::all();

        return view('flights.create', compact('passengers', 'staff', 'gates'));
    }

    /**
     * Store flight
     */
    public function store(Request $request)
    {
        // VALIDATION
        // datetime-local inputs send format: Y-m-d\TH:i
        $request->validate([
            'passenger_id' => 'required|exists:passengers,id',
            'staff_id' => 'required|exists:staff,id',
            'flight_number' => 'required|unique:flights',
            'departure_time' => 'required|date_format:Y-m-d\TH:i',
            'arrival_time' => 'required|date_format:Y-m-d\TH:i|after:departure_time',
            'destination' => 'required|string',
            'price' => 'nullable|numeric|min:0',
            'aircraft_type' => 'nullable|string',
            'capacity' => 'nullable|integer|min:1',
            'booking_reference' => 'nullable|string|unique:flights',
            'gate_id' => 'nullable|exists:gates,id'
        ]);

        // CHECK STAFF AVAILABILITY
        if (!Flight::isStaffAvailable(
            $request->staff_id,
            $request->departure_time,
            $request->arrival_time
        )) {
            return redirect('/flights/create')
                ->with('error', 'Staff member is already assigned to another flight at this time.')
                ->withInput();
        }

        // GENERATE BOOKING REFERENCE IF NOT PROVIDED
        $bookingReference = $request->booking_reference ?? 'BK' . strtoupper(substr(uniqid(), -6));

        // CREATE FLIGHT
        Flight::create([
            'passenger_id' => $request->passenger_id,
            'staff_id' => $request->staff_id,
            'flight_number' => $request->flight_number,
            'departure_time' => $request->departure_time,
            'arrival_time' => $request->arrival_time,
            'destination' => $request->destination,
            'price' => $request->price,
            'aircraft_type' => $request->aircraft_type,
            'capacity' => $request->capacity,
            'booking_reference' => $bookingReference,
            'gate_id' => $request->gate_id,
            'status' => 'scheduled'
        ]);

        return redirect('/flights')
            ->with('success', 'Flight created successfully.');
    }

    /**
     * Update flight status
     */
    public function updateStatus(Request $request, $id)
    {
        $flight = Flight::findOrFail($id);

        // VALIDATION
        $request->validate([
            'status' => 'required|in:scheduled,confirmed,boarding,departed,completed,cancelled'
        ]);

        // UPDATE STATUS
        $flight->update([
            'status' => $request->status
        ]);

        return redirect('/flights')
            ->with('success', 'Flight status updated successfully.');
    }

    /**
     * Show edit form
     */
    public function edit($id)
    {
        $flight = Flight::findOrFail($id);
        $passengers = Passenger::all();
        $staff = Staff::all();
        $gates = Gate::all();

        return view('flights.edit', compact('flight', 'passengers', 'staff', 'gates'));
    }

    /**
     * Update flight
     */
    public function update(Request $request, $id)
    {
        $flight = Flight::findOrFail($id);

        // VALIDATION
        // datetime-local inputs send format: Y-m-d\TH:i
        $request->validate([
            'passenger_id' => 'required|exists:passengers,id',
            'staff_id' => 'required|exists:staff,id',
            'flight_number' => 'required|unique:flights,flight_number,' . $id,
            'departure_time' => 'required|date_format:Y-m-d\TH:i',
            'arrival_time' => 'required|date_format:Y-m-d\TH:i|after:departure_time',
            'destination' => 'required|string',
            'gate_id' => 'nullable|exists:gates,id'
        ]);

        // CHECK STAFF AVAILABILITY (excluding current flight)
        if ($request->staff_id !== $flight->staff_id || 
            $request->departure_time !== $flight->departure_time || 
            $request->arrival_time !== $flight->arrival_time) {
            
            $exists = Flight::where('staff_id', $request->staff_id)
                ->where(function($query) use ($request) {
                    $query->whereBetween('departure_time', [$request->departure_time, $request->arrival_time])
                          ->orWhereBetween('arrival_time', [$request->departure_time, $request->arrival_time]);
                })
                ->where('id', '!=', $id)
                ->whereIn('status', ['scheduled', 'confirmed'])
                ->exists();

            if ($exists) {
                return redirect("/flights/edit/{$id}")
                    ->with('error', 'Staff member is already assigned to another flight at this time.')
                    ->withInput();
            }
        }

        // UPDATE FLIGHT
        $flight->update([
            'passenger_id' => $request->passenger_id,
            'staff_id' => $request->staff_id,
            'flight_number' => $request->flight_number,
            'departure_time' => $request->departure_time,
            'arrival_time' => $request->arrival_time,
            'destination' => $request->destination,
            'gate_id' => $request->gate_id
        ]);

        return redirect('/flights')
            ->with('success', 'Flight updated successfully.');
    }

    /**
     * Delete flight
     */
    public function delete($id)
    {
        $flight = Flight::findOrFail($id);

        $flight->delete();

        return redirect('/flights')
            ->with('success', 'Flight deleted successfully.');
    }
}
