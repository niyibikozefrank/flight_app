<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Flights - {{ config('app.name', 'Airport Management') }}</title>
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
        .btn-add {
            background: white;
            color: #1e3c72;
            border: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-add:hover {
            background: #f0f0f0;
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
        .alert {
            border-radius: 10px;
            border: none;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 25px;
        }
        .alert-success {
            background: linear-gradient(135deg, #84fab0 0%, #8fd3f4 100%);
            color: white;
        }
        .btn-warning, .btn-danger {
            border: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-warning:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
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
        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }
        .status-scheduled {
            background: #d1ecf1;
            color: #0c5460;
        }
        .status-boarding {
            background: #fff3cd;
            color: #856404;
        }
        .status-departed {
            background: #d4edda;
            color: #155724;
        }
        .status-delayed {
            background: #f8d7da;
            color: #721c24;
        }
        .status-cancelled {
            background: #e2e3e5;
            color: #383d41;
        }
        .filter-section {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            margin-bottom: 25px;
        }
        .filter-section .form-control {
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        .filter-btn {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            border: none;
            font-weight: 600;
            border-radius: 5px;
            transition: all 0.3s ease;
        }
        .filter-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            color: white;
        }
    </style>
</head>

<body class="font-sans antialiased">
    @include('components.hospital-header')
    <x-side-navigation />

    <div class="container-main">
        <div class="card-header-custom">
            <h2><i class="bi bi-airplane"></i> Flights Management</h2>
            <a href="{{ route('flights.create') }}" class="btn btn-add">
                <i class="bi bi-plus-circle"></i> New Flight
            </a>
        </div>

        <div style="background: white; padding: 30px; border-radius: 0 0 10px 10px; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
            @if(session('success'))
                <div class="alert alert-success">
                    <i class="bi bi-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            <!-- FILTER SECTION -->
            <div class="filter-section">
                <form method="GET" action="{{ route('flights.index') }}" class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label small text-muted">Staff</label>
                        <select name="staff_id" class="form-control">
                            <option value="">All Staff</option>
                            @foreach(\App\Models\Staff::all() as $s)
                                <option value="{{ $s->id }}" {{ request('staff_id') == $s->id ? 'selected' : '' }}>
                                    {{ $s->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label small text-muted">Status</label>
                        <select name="status" class="form-control">
                            <option value="">All Status</option>
                            <option value="scheduled" {{ request('status') == 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                            <option value="boarding" {{ request('status') == 'boarding' ? 'selected' : '' }}>Boarding</option>
                            <option value="departed" {{ request('status') == 'departed' ? 'selected' : '' }}>Departed</option>
                            <option value="delayed" {{ request('status') == 'delayed' ? 'selected' : '' }}>Delayed</option>
                            <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label small text-muted">Destination</label>
                        <input type="text" name="destination" class="form-control" placeholder="Search destination" value="{{ request('destination') }}">
                    </div>

                    <div class="col-md-3 d-flex align-items-end">
                        <button type="submit" class="btn filter-btn w-100">
                            <i class="bi bi-funnel"></i> Filter
                        </button>
                    </div>
                </form>
            </div>

            @if($flights->count() > 0)
                <div class="table-container">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th><i class="bi bi-hash"></i> ID</th>
                                <th><i class="bi bi-airplane-circle"></i> Flight #</th>
                                <th><i class="bi bi-person"></i> Passenger</th>
                                <th><i class="bi bi-person-badge"></i> Staff</th>
                                <th><i class="bi bi-geo-alt"></i> Destination</th>
                                <th><i class="bi bi-clock"></i> Departure</th>
                                <th><i class="bi bi-currency-dollar"></i> Price</th>
                                <th><i class="bi bi-diagram-3"></i> Gate</th>
                                <th><i class="bi bi-info-circle"></i> Status</th>
                                <th style="width: 200px;"><i class="bi bi-sliders"></i> Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($flights as $flight)
                                <tr>
                                    <td><strong>#{{ $flight->id }}</strong></td>
                                    <td>{{ $flight->flight_number }}</td>
                                    <td>{{ $flight->passenger->name ?? 'N/A' }}</td>
                                    <td>{{ $flight->staff->name ?? 'N/A' }}</td>
                                    <td>{{ $flight->destination }}</td>
                                    <td>{{ $flight->departure_time?->format('Y M, D h:i A') ?? 'N/A' }}</td>
                                    <td>
                                        @if($flight->price)
                                            <strong>${{ number_format($flight->price, 2) }}</strong>
                                        @else
                                            <span class="text-muted">N/A</span>
                                        @endif
                                    </td>
                                    <td>{{ $flight->gate->gate_number ?? 'N/A' }}</td>
                                    <td>
                                        <span class="status-badge status-{{ $flight->status }}">
                                            {{ ucfirst($flight->status) }}
                                        </span>
                                    </td>

                                    <td class="d-flex gap-2">
                                        <a href="{{ route('flights.edit', $flight->id) }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>

                                        <form action="{{ route('flights.delete', $flight->id) }}" method="GET" class="d-inline" onsubmit="return confirm('Are you sure?')">
                                            <button class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="empty-state">
                    <i class="bi bi-inbox"></i>
                    <h4>No Flights Found</h4>
                    <p>Start by <a href="{{ route('flights.create') }}">adding a new flight</a></p>
                </div>
            @endif
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        .container-main {
            max-width: 1200px;
            margin-top: 40px;
            margin-bottom: 40px;
        }
        .card-header-custom {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
        .btn-add {
            background: white;
            color: #667eea;
            border: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-add:hover {
            background: #f0f0f0;
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
        .alert {
            border-radius: 10px;
            border: none;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 25px;
        }
        .alert-success {
            background: linear-gradient(135deg, #84fab0 0%, #8fd3f4 100%);
            color: white;
        }
        .btn-actions {
            gap: 5px;
            display: flex;
            flex-wrap: wrap;
        }
        .btn-warning, .btn-danger {
            border: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-warning:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
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
        .filter-section {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            margin-bottom: 25px;
        }
        .filter-section .form-control {
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        .filter-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            font-weight: 600;
            border-radius: 5px;
            transition: all 0.3s ease;
        }
        .filter-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            color: white;
        }
        .form-label {
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        .btn-outline-secondary {
            border-color: #ddd;
            color: #666;
            font-weight: 600;
            border-radius: 5px;
            transition: all 0.3s ease;
        }
        .btn-outline-secondary:hover {
            background: #f8f9fa;
            border-color: #999;
            color: #333;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
    </style>
</head>

<body class="font-sans antialiased">
    @include('components.hospital-header')
    <x-side-navigation />

    <div class="container-main">
        <div class="card-header-custom">
            <h2><i class="bi bi-calendar-check"></i> Appointments Management</h2>
            <a href="/appointments/create" class="btn btn-add">
                <i class="bi bi-plus-circle"></i> New Appointment
            </a>
        </div>

        <div style="background: white; padding: 30px; border-radius: 0 0 10px 10px; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
            @if(session('success'))
                <div class="alert alert-success">
                    <i class="bi bi-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            <!-- FILTER SECTION -->
            <div class="filter-section">
                <form method="GET" action="/flights" class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label small text-muted">Staff</label>
                        <select name="staff_id" class="form-control">
                            <option value="">All Staff</option>
                            @foreach(\App\Models\Staff::all() as $d)
                                <option value="{{ $d->id }}" {{ request('staff_id') == $d->id ? 'selected' : '' }}>
                                    {{ $d->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label small text-muted">Status</label>
                        <select name="status" class="form-control">
                            <option value="">All Status</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                            <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label small text-muted">Date From</label>
                        <input type="date" name="date_from" class="form-control" value="{{ request('date_from') }}">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label small text-muted">Date To</label>
                        <input type="date" name="date_to" class="form-control" value="{{ request('date_to') }}">
                    </div>

                    <div class="col-12 d-flex gap-2">
                        <button type="submit" class="btn filter-btn flex-grow-1">
                            <i class="bi bi-funnel"></i> Filter
                        </button>
                        <a href="/flights" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-clockwise"></i> Clear
                        </a>
                    </div>
                </form>
            </div>

            @if($flights->count() > 0)
                <!-- TABLE -->
                <div class="table-container">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th><i class="bi bi-hash"></i> Flight #</th>
                                <th><i class="bi bi-person"></i> Passenger</th>
                                <th><i class="bi bi-person-badge"></i> Staff</th>
                                <th><i class="bi bi-map-pin"></i> Destination</th>
                                <th><i class="bi bi-clock"></i> Departure</th>
                                <th><i class="bi bi-info-circle"></i> Status</th>
                                <th style="width: 350px;"><i class="bi bi-sliders"></i> Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($flights as $f)
                            <tr>
                                <td><strong>{{ $f->flight_number }}</strong></td>
                                <td>{{ $f->passenger->name }}</td>
                                <td>{{ $f->staff->name }}</td>
                                <td>{{ $f->destination }}</td>
                                <td>{{ $f->departure_time }}</td>

                                <!-- STATUS DISPLAY -->
                                <td>
                                    <span class="badge 
                                        @if($f->status == 'scheduled') bg-info
                                        @elseif($f->status == 'boarding') bg-warning
                                        @elseif($f->status == 'departed') bg-primary
                                        @elseif($f->status == 'arrived') bg-success
                                        @else bg-danger @endif">
                                        {{ $f->status }}
                                    </span>
                                </td>

                                <!-- ACTIONS -->
                                <td class="btn-actions">
                                    <!-- EDIT BUTTON -->
                                    <a href="/flights/edit/{{ $f->id }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>

                                    <!-- STATUS UPDATE FORM -->
                                    <form method="POST" action="/flights/status/{{ $f->id }}" class="flex-grow-1">
                                        @csrf

                                        <div class="input-group input-group-sm">
                                            <select name="status" class="form-control form-control-sm">
                                                <option value="scheduled" {{ $f->status == 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                                                <option value="boarding" {{ $f->status == 'boarding' ? 'selected' : '' }}>Boarding</option>
                                                <option value="departed" {{ $f->status == 'departed' ? 'selected' : '' }}>Departed</option>
                                                <option value="arrived" {{ $f->status == 'arrived' ? 'selected' : '' }}>Arrived</option>
                                                <option value="cancelled" {{ $f->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                            </select>

                                            <button type="submit" class="btn btn-sm btn-primary">
                                                <i class="bi bi-check"></i> Update
                                            </button>
                                        </div>
                                    </form>

                                    <a href="/flights/delete/{{ $f->id }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                        <i class="bi bi-trash"></i> Delete
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="empty-state">
                    <i class="bi bi-airplane"></i>
                    <h4>No Flights Found</h4>
                    <p>Start by <a href="/flights/create">creating a new flight</a></p>
                </div>
            @endif
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>