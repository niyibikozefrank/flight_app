<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PassengerController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\DailyReportController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceRecordController;
use App\Http\Controllers\GroundServiceController;
use App\Http\Controllers\ServiceHistoryController;
use App\Http\Controllers\GateController;
use App\Http\Controllers\PilotController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if (!Auth::check()) {
        return redirect('/login');
    }
    return redirect('/dashboard');
});

// ============== ADMIN ROUTES (Full Access) ==============
Route::middleware(['auth', 'verified', 'noCache'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('passengers', PassengerController::class);

    Route::resource('gates', GateController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.show');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/staff', [StaffController::class, 'index'])->name('staff.index');
    Route::get('/staff/create', [StaffController::class, 'create'])->name('staff.create');
    Route::post('/staff/store', [StaffController::class, 'store'])->name('staff.store');
    Route::get('/staff/edit/{id}', [StaffController::class, 'edit'])->name('staff.edit');
    Route::post('/staff/update/{id}', [StaffController::class, 'update'])->name('staff.update');
    Route::delete('/staff/{id}', [StaffController::class, 'delete'])->name('staff.destroy');

    Route::get('/flights', [FlightController::class, 'index'])->name('flights.index');
    Route::get('/flights/create', [FlightController::class, 'create'])->name('flights.create');
    Route::post('/flights/store', [FlightController::class, 'store'])->name('flights.store');
    Route::get('/flights/edit/{id}', [FlightController::class, 'edit'])->name('flights.edit');
    Route::post('/flights/update/{id}', [FlightController::class, 'update'])->name('flights.update');
    Route::post('/flights/status/{id}', [FlightController::class, 'updateStatus'])->name('flights.updateStatus');
    Route::get('/flights/delete/{id}', [FlightController::class, 'delete'])->name('flights.delete');

    Route::get('/daily-report', [DailyReportController::class, 'index'])->name('reports.daily');

    Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
    Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
    Route::post('/services/store', [ServiceController::class, 'store'])->name('services.store');
    Route::get('/services/edit/{id}', [ServiceController::class, 'edit'])->name('services.edit');
    Route::post('/services/update/{id}', [ServiceController::class, 'update'])->name('services.update');
    Route::get('/services/delete/{id}', [ServiceController::class, 'delete'])->name('services.delete');

    Route::get('/servicerecords', [ServiceRecordController::class, 'index'])->name('servicerecords.index');
    Route::get('/servicerecords/create', [ServiceRecordController::class, 'create'])->name('servicerecords.create');
    Route::post('/servicerecords/store', [ServiceRecordController::class, 'store'])->name('servicerecords.store');
    Route::get('/servicerecords/edit/{id}', [ServiceRecordController::class, 'edit'])->name('servicerecords.edit');
    Route::post('/servicerecords/update/{id}', [ServiceRecordController::class, 'update'])->name('servicerecords.update');
    Route::get('/servicerecords/delete/{id}', [ServiceRecordController::class, 'delete'])->name('servicerecords.delete');
    Route::get('/passenger/{passengerId}/records', [ServiceRecordController::class, 'passengerRecords'])->name('servicerecords.passenger');

    Route::get('/groundservices', [GroundServiceController::class, 'index'])->name('groundservices.index');
    Route::get('/groundservices/create', [GroundServiceController::class, 'create'])->name('groundservices.create');
    Route::post('/groundservices/store', [GroundServiceController::class, 'store'])->name('groundservices.store');
    Route::get('/groundservices/edit/{id}', [GroundServiceController::class, 'edit'])->name('groundservices.edit');
    Route::post('/groundservices/update/{id}', [GroundServiceController::class, 'update'])->name('groundservices.update');
    Route::get('/groundservices/delete/{id}', [GroundServiceController::class, 'delete'])->name('groundservices.delete');

    Route::get('/servicehistory', [ServiceHistoryController::class, 'index'])->name('servicehistory.index');
    Route::get('/servicehistory/create', [ServiceHistoryController::class, 'create'])->name('servicehistory.create');
    Route::post('/servicehistory/store', [ServiceHistoryController::class, 'store'])->name('servicehistory.store');
    Route::get('/servicehistory/edit/{id}', [ServiceHistoryController::class, 'edit'])->name('servicehistory.edit');
    Route::post('/servicehistory/update/{id}', [ServiceHistoryController::class, 'update'])->name('servicehistory.update');
    Route::get('/servicehistory/delete/{id}', [ServiceHistoryController::class, 'delete'])->name('servicehistory.delete');
    Route::get('/passenger/{passengerId}/history', [ServiceHistoryController::class, 'passengerHistory'])->name('servicehistory.passenger');

    // ============== PILOT CHAMBER ROUTES ==============
    Route::get('/pilots', [PilotController::class, 'index'])->name('pilots.index');
    Route::get('/pilots/{id}', [PilotController::class, 'show'])->name('pilots.show');
    Route::post('/pilots/{id}/status', [PilotController::class, 'updateStatus'])->name('pilots.updateStatus');
    Route::get('/pilots/{id}/preflight', [PilotController::class, 'preflightChecklist'])->name('pilots.preflight');
});

require __DIR__.'/auth.php';

