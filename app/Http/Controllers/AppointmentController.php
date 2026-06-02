<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display appointments list
     */
    public function index(Request $request)
    {
        $query = Appointment::with(['patient', 'doctor']);

        // FILTER BY DOCTOR
        if ($request->doctor_id) {
            $query->where('doctor_id', $request->doctor_id);
        }

        // FILTER BY STATUS
        if ($request->status) {
            $query->where('status', $request->status);
        }

        // FILTER BY DATE RANGE
        if ($request->date_from) {
            $query->where('appointment_date', '>=', $request->date_from);
        }

        if ($request->date_to) {
            $query->where('appointment_date', '<=', $request->date_to);
        }

        // ORDER LATEST FIRST
        $appointments = $query->latest()->get();

        return view('appointments.index', compact('appointments'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        $patients = Patient::all();
        $doctors = Doctor::all();

        return view('appointments.create', compact('patients', 'doctors'));
    }

    /**
     * Store appointment
     */
    public function store(Request $request)
    {
        // VALIDATION
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required'
        ]);

        // CHECK DOCTOR AVAILABILITY
        if (!Appointment::isDoctorAvailable(
            $request->doctor_id,
            $request->appointment_date,
            $request->appointment_time
        )) {
            return redirect('/appointments/create')
                ->with('error', 'Doctor is already booked at this time.')
                ->withInput();
        }

        // CREATE APPOINTMENT
        Appointment::create([
            'patient_id' => $request->patient_id,
            'doctor_id' => $request->doctor_id,
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
            'status' => 'pending'
        ]);

        return redirect('/appointments')
            ->with('success', 'Appointment created successfully.');
    }

    /**
     * Update appointment status
     */
    public function updateStatus(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);

        // VALIDATION
        $request->validate([
            'status' => 'required|in:pending,confirmed,completed,cancelled'
        ]);

        // UPDATE STATUS
        $appointment->update([
            'status' => $request->status
        ]);

        return redirect('/appointments')
            ->with('success', 'Appointment status updated successfully.');
    }

    /**
     * Show edit form
     */
    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id);
        $patients = Patient::all();
        $doctors = Doctor::all();

        return view('appointments.edit', compact('appointment', 'patients', 'doctors'));
    }

    /**
     * Update appointment
     */
    public function update(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);

        // VALIDATION
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required'
        ]);

        // CHECK DOCTOR AVAILABILITY (excluding current appointment)
        if ($request->doctor_id !== $appointment->doctor_id || 
            $request->appointment_date !== $appointment->appointment_date || 
            $request->appointment_time !== $appointment->appointment_time) {
            
            $exists = Appointment::where('doctor_id', $request->doctor_id)
                ->where('appointment_date', $request->appointment_date)
                ->where('appointment_time', $request->appointment_time)
                ->where('id', '!=', $id)
                ->whereIn('status', ['pending', 'confirmed'])
                ->exists();

            if ($exists) {
                return redirect("/appointments/edit/{$id}")
                    ->with('error', 'Doctor is already booked at this time.')
                    ->withInput();
            }
        }

        // UPDATE APPOINTMENT
        $appointment->update([
            'patient_id' => $request->patient_id,
            'doctor_id' => $request->doctor_id,
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time
        ]);

        return redirect('/appointments')
            ->with('success', 'Appointment updated successfully.');
    }

    /**
     * Delete appointment
     */
    public function delete($id)
    {
        $appointment = Appointment::findOrFail($id);

        $appointment->delete();

        return redirect('/appointments')
            ->with('success', 'Appointment deleted successfully.');
    }
}