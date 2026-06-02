
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Passengers - {{ config('app.name', 'Airport Management') }}</title>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body { margin: 0; }
        </style>

        <style>
            body {
                background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
                min-height: 100vh;
            }
            .navbar {
                background: rgba(255, 255, 255, 0.95);
                box-shadow: 0 2px 10px rgba(0,0,0,0.1);
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
            .btn-actions {
                gap: 5px;
                display: flex;
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
        </style>
    </head>
    <body>
        @include('components.hospital-header')
        <x-side-navigation />
        <div class="container-main">
            <div class="card-header-custom">
                <h2><i class="bi bi-people-fill"></i> Passengers Management</h2>
                <div class="d-flex gap-2">
                    <a href="{{ route('passengers.create') }}" class="btn btn-add">
                        <i class="bi bi-plus-circle"></i> Add Passenger
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </button>
                    </form>
                </div>
            </div>

            <div style="background: white; padding: 30px; border-radius: 0 0 10px 10px; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
                @if(session('success'))
                    <div class="alert alert-success">
                        <i class="bi bi-check-circle"></i> {{ session('success') }}
                    </div>
                @endif

                @if($passengers->count() > 0)
                    <div class="table-container">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th><i class="bi bi-hash"></i> ID</th>
                                    <th><i class="bi bi-person"></i> Name</th>
                                    <th><i class="bi bi-telephone"></i> Phone</th>
                                    <th><i class="bi bi-passport"></i> Passport</th>
                                    <th><i class="bi bi-ticket"></i> Booking Ref</th>
                                    <th><i class="bi bi-calendar"></i> Age</th>
                                    <th><i class="bi bi-gender-ambiguous"></i> Gender</th>
                                    <th style="width: 180px;"><i class="bi bi-sliders"></i> Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($passengers as $passenger)
                                    <tr>
                                        <td><strong>#{{ $passenger->id }}</strong></td>
                                        <td>{{ $passenger->name }}</td>
                                        <td>{{ $passenger->phone }}</td>
                                        <td>{{ $passenger->passport_number ?? 'N/A' }}</td>
                                        <td>{{ $passenger->booking_reference ?? 'N/A' }}</td>
                                        <td>{{ $passenger->age }}</td>
                                        <td>
                                            <span class="badge bg-{{ $passenger->gender === 'Male' ? 'primary' : 'danger' }}">
                                                {{ $passenger->gender }}
                                            </span>
                                        </td>

                                        <td class="btn-actions">
                                            <a href="{{ route('servicehistory.passenger', $passenger->id) }}"
                                                class="btn btn-info btn-sm" title="View Service History">
                                                <i class="bi bi-clock-history"></i> History
                                            </a>

                                            <a href="{{ route('passengers.edit',$passenger->id) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </a>

                                            <form action="{{ route('passengers.destroy',$passenger->id) }}"
                                                method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Are you sure?')">

                                                @csrf
                                                @method('DELETE')

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
                        <h4>No Passengers Found</h4>
                        <p>Start by <a href="{{ route('passengers.create') }}">adding a new passenger</a></p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>