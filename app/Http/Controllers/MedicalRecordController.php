<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use App\Models\Patient;
use App\Models\Medical;
use Illuminate\Http\Request;

class MedicalRecordController extends Controller
{
    public function index()
    {
        $medicalRecords = MedicalRecord::with('patient', 'medical')->get();
        return view('medicalrecord.index', compact('medicalRecords'));
    }

    public function create()
    {
        $patients = Patient::all();
        $medicals = Medical::all();
        return view('medicalrecord.create', compact('patients', 'medicals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'medical_id' => 'required|exists:medicals,id',
            'diagnosis' => 'nullable|string',
            'treatment' => 'nullable|string',
            'notes' => 'nullable|string',
            'record_date' => 'required|date'
        ]);

        MedicalRecord::create($request->all());

        return redirect()->route('medicalrecord.index')->with('success', 'Medical record created successfully');
    }

    public function edit($id)
    {
        $medicalRecord = MedicalRecord::findOrFail($id);
        $patients = Patient::all();
        $medicals = Medical::all();
        return view('medicalrecord.edit', compact('medicalRecord', 'patients', 'medicals'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'medical_id' => 'required|exists:medicals,id',
            'diagnosis' => 'nullable|string',
            'treatment' => 'nullable|string',
            'notes' => 'nullable|string',
            'record_date' => 'required|date'
        ]);

        $medicalRecord = MedicalRecord::findOrFail($id);
        $medicalRecord->update($request->all());

        return redirect()->route('medicalrecord.index')->with('success', 'Medical record updated successfully');
    }

    public function delete($id)
    {
        MedicalRecord::findOrFail($id)->delete();
        return redirect()->route('medicalrecord.index')->with('success', 'Medical record deleted successfully');
    }

    public function patientRecords($patientId)
    {
        $patient = Patient::findOrFail($patientId);
        $medicalRecords = MedicalRecord::where('patient_id', $patientId)->with('medical')->get();
        return view('medicalrecord.patient-records', compact('patient', 'medicalRecords'));
    }
}
