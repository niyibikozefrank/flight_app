<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class DailyReportController extends Controller
{
    /**
     * Display daily flight report
     */
    public function index(Request $request)
    {
        // Get the date parameter, default to today
        $date = $request->date ?? now()->format('Y-m-d');

        // Fetch flights for the selected date
        $flights = Flight::with(['passenger', 'staff', 'gate'])
            ->whereDate('departure_time', $date)
            ->orderBy('departure_time')
            ->get();

        // Calculate statistics
        $totalFlights = $flights->count();
        $completedFlights = $flights->where('status', 'completed')->count();
        $scheduledFlights = $flights->where('status', 'scheduled')->count();
        $delayedFlights = $flights->where('status', 'delayed')->count();
        $cancelledFlights = $flights->where('status', 'cancelled')->count();

        return view('reports.daily', compact(
            'flights',
            'date',
            'totalFlights',
            'completedFlights',
            'scheduledFlights',
            'delayedFlights',
            'cancelledFlights'
        ));
    }
}
