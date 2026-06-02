<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Daily Flight Report - {{ config('app.name', 'Airport App') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            min-height: 100vh;
        }
        .container-main {
            max-width: 1200px;
            margin-top: 40px;
            margin-bottom: 40px;
        }
        .card-header-custom {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            padding: 30px;
            border-radius: 10px 10px 0 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .card-header-custom h2 {
            margin: 0;
            font-weight: 700;
        }
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }
        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            text-align: center;
            transition: all 0.3s ease;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }
        .stat-card .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            margin: 10px 0;
        }
        .stat-card .stat-label {
            font-size: 0.9rem;
            color: #666;
            text-transform: uppercase;
        }
        .stat-card i {
            font-size: 2rem;
            margin-bottom: 10px;
        }
        .stat-total { color: #1e3c72; }
        .stat-completed { color: #28a745; }
        .stat-pending { color: #ffc107; }
        .stat-confirmed { color: #007bff; }
        .stat-cancelled { color: #dc3545; }
        
        .date-selector {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            margin-bottom: 25px;
            display: flex;
            align-items: end;
            gap: 15px;
        }
        .date-selector label {
            font-weight: 600;
            margin-bottom: 0;
        }
        .date-selector input {
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        .date-selector button {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            border: none;
            font-weight: 600;
            border-radius: 5px;
            padding: 8px 20px;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .date-selector button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        .table-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .table {
            margin-bottom: 0;
            border: none;
        }
        .table thead th {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            border: none;
            font-weight: 600;
            padding: 15px;
            text-transform: uppercase;
            font-size: 0.85rem;
        }
        .table tbody td {
            padding: 15px;
            vertical-align: middle;
            border-color: #e9ecef;
        }
        .table tbody tr:hover {
            background-color: #f8f9fa;
        }
        .badge {
            padding: 6px 12px;
            font-weight: 600;
        }
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #999;
        }
        .empty-state i {
            font-size: 3rem;
            color: #ddd;
            margin-bottom: 20px;
        }
    </style>
</head>

<body class="font-sans antialiased">
    @include('components.hospital-header')
    <x-side-navigation />

    <div class="container-main">
        <div class="card-header-custom">
            <h2><i class="bi bi-airplane"></i> Daily Flight Report</h2>
        </div>

        <div style="background: white; padding: 30px; border-radius: 0 0 10px 10px; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
            
            <!-- DATE SELECTOR -->
            <div class="date-selector">
                <form method="GET" action="/daily-report" class="d-flex align-items-end gap-2 w-100">
                    <div>
                        <label for="date" class="form-label"><i class="bi bi-calendar"></i> Select Date</label>
                        <input type="date" id="date" name="date" class="form-control" value="{{ $date }}" style="width: 200px;">
                    </div>
                    <button type="submit" class="btn">
                        <i class="bi bi-search"></i> View Report
                    </button>
                    <a href="/daily-report" class="btn btn-outline-secondary" style="border: 1px solid #ddd; color: #666; padding: 8px 20px; border-radius: 5px; text-decoration: none;">
                        <i class="bi bi-arrow-clockwise"></i> Today
                    </a>
                </form>
            </div>

            <!-- STATISTICS CARDS -->
            <div class="stats-container">
                <div class="stat-card">
                    <i class="bi bi-airplane stat-total"></i>
                    <div class="stat-label">Total Flights</div>
                    <div class="stat-number stat-total">{{ $totalFlights }}</div>
                </div>

                <div class="stat-card">
                    <i class="bi bi-check-circle stat-completed"></i>
                    <div class="stat-label">Completed</div>
                    <div class="stat-number stat-completed">{{ $completedFlights }}</div>
                </div>

                <div class="stat-card">
                    <i class="bi bi-clock-history stat-confirmed"></i>
                    <div class="stat-label">Scheduled</div>
                    <div class="stat-number stat-confirmed">{{ $scheduledFlights }}</div>
                </div>

                <div class="stat-card">
                    <i class="bi bi-hourglass-split stat-pending"></i>
                    <div class="stat-label">Delayed</div>
                    <div class="stat-number stat-pending">{{ $delayedFlights }}</div>
                </div>

                <div class="stat-card">
                    <i class="bi bi-x-circle stat-cancelled"></i>
                    <div class="stat-label">Cancelled</div>
                    <div class="stat-number stat-cancelled">{{ $cancelledFlights }}</div>
                </div>
            </div>

            @if($flights->count() > 0)
                <!-- FLIGHTS TABLE -->
                <div class="table-container">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th><i class="bi bi-hash"></i> ID</th>
                                <th><i class="bi bi-calendar"></i> Flight #</th>
                                <th><i class="bi bi-geo"></i> Destination</th>
                                <th><i class="bi bi-clock"></i> Departure</th>
                                <th><i class="bi bi-person"></i> Passenger</th>
                                <th><i class="bi bi-briefcase"></i> Staff</th>
                                <th><i class="bi bi-door-closed"></i> Gate</th>
                                <th><i class="bi bi-info-circle"></i> Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($flights as $flight)
                            <tr>
                                <td><strong>#{{ $flight->id }}</strong></td>
                                <td><strong>{{ $flight->flight_number }}</strong></td>
                                <td>{{ $flight->destination }}</td>
                                <td>{{ $flight->departure_time->format('H:i') }}</td>
                                <td>{{ $flight->passenger->name ?? 'N/A' }}</td>
                                <td>{{ $flight->staff->name ?? 'N/A' }}</td>
                                <td>{{ $flight->gate->gate_number ?? 'N/A' }}</td>
                                <td>
                                    <span class="badge 
                                        @if($flight->status == 'delayed') bg-warning
                                        @elseif($flight->status == 'scheduled') bg-primary
                                        @elseif($flight->status == 'completed') bg-success
                                        @else bg-danger @endif">
                                        {{ ucfirst($flight->status) }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="empty-state">
                    <i class="bi bi-calendar-x"></i>
                    <h4>No Flights</h4>
                    <p>No flights scheduled for <strong>{{ $date }}</strong></p>
                </div>
            @endif

        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
