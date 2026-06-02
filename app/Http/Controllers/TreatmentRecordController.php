<?php

namespace App\Http\Controllers;

use App\Models\TreatmentRecord;
use App\Models\Treatment;
use App\Models\Medical;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Http\Request;

class TreatmentRecordController extends Controller
{
    public function index()
    {
        $treatmentRecords = TreatmentRecord::with('treatment', 'medical', 'patient', 'doctor')->get();
        return view('treatmentrecord.index', compact('treatmentRecords'));
    }

    public function create()
    {
        $treatments = Treatment::all();
        $medicals = Medical::all();
        $patients = Patient::all();
        $doctors = Doctor::all();
        return view('treatmentrecord.create', compact('treatments', 'medicals', 'patients', 'doctors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'treatment_id' => 'required|exists:treatments,id',
            'medical_id' => 'required|exists:medicals,id',
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:pending,in-progress,completed,cancelled',
            'treatment_date' => 'required|date',
            'notes' => 'nullable|string'
        ]);

        TreatmentRecord::create($request->all());

        return redirect()->route('treatmentrecord.index')->with('success', 'Treatment record created successfully');
    }

    public function edit($id)
    {
        $treatmentRecord = TreatmentRecord::findOrFail($id);
        $treatments = Treatment::all();
        $medicals = Medical::all();
        $patients = Patient::all();
        $doctors = Doctor::all();
        return view('treatmentrecord.edit', compact('treatmentRecord', 'treatments', 'medicals', 'patients', 'doctors'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'treatment_id' => 'required|exists:treatments,id',
            'medical_id' => 'required|exists:medicals,id',
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:pending,in-progress,completed,cancelled',
            'treatment_date' => 'required|date',
            'notes' => 'nullable|string'
        ]);

        $treatmentRecord = TreatmentRecord::findOrFail($id);
        $treatmentRecord->update($request->all());

        return redirect()->route('treatmentrecord.index')->with('success', 'Treatment record updated successfully');
    }

    public function delete($id)
    {
        TreatmentRecord::findOrFail($id)->delete();
        return redirect()->route('treatmentrecord.index')->with('success', 'Treatment record deleted successfully');
    }

    public function patientRecords($patientId)
    {
        $patient = Patient::findOrFail($patientId);
        $treatmentRecords = TreatmentRecord::where('patient_id', $patientId)->with('treatment', 'medical', 'doctor')->get();
        return view('treatmentrecord.patient-records', compact('patient', 'treatmentRecords'));
    }
}
