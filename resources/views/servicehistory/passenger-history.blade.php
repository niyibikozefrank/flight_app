<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Passenger History - {{ $passenger->name ?? 'Service History' }}</title>

        <!-- Bootstrap CSS -->
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
                margin: 0;
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
            .passenger-info {
                background: white;
                padding: 25px;
                border-radius: 10px;
                box-shadow: 0 5px 20px rgba(0,0,0,0.1);
                margin-bottom: 30px;
            }
            .info-card {
                display: flex;
                align-items: center;
                padding: 15px;
                border-left: 4px solid #1e3c72;
                background: #f8f9fa;
                border-radius: 5px;
            }
            .info-card i {
                font-size: 1.5rem;
                color: #1e3c72;
                margin-right: 15px;
            }
            .info-label {
                font-size: 0.85rem;
                color: #666;
                text-transform: uppercase;
                font-weight: 600;
            }
            .info-value {
                font-size: 1.1rem;
                font-weight: 600;
                color: #1e3c72;
            }
            .table-container {
                background: white;
                padding: 30px;
                border-radius: 0 0 10px 10px;
                box-shadow: 0 5px 20px rgba(0,0,0,0.1);
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
            .badge-pending {
                background-color: #ffc107;
                color: #000;
            }
            .badge-in-progress {
                background-color: #0d6efd;
                color: #fff;
            }
            .badge-completed {
                background-color: #198754;
                color: #fff;
            }
            .badge-cancelled {
                background-color: #dc3545;
                color: #fff;
            }
            .btn-back {
                background: white;
                color: #1e3c72;
                border: none;
                font-weight: 600;
                transition: all 0.3s ease;
            }
            .btn-back:hover {
                background: #f0f0f0;
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
            .stats-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 15px;
                margin-bottom: 25px;
            }
        </style>
    </head>

    <body class="font-sans antialiased">
        @include('components.hospital-header')
        <x-side-navigation />
        
        <div class="container-main">
            <div class="card-header-custom">
                <div>
                    <h2>
                        <i class="bi bi-clock-history"></i> Service History
                        <small style="font-size: 0.7em;">{{ $passenger->name }}</small>
                    </h2>
                </div>
                <a href="{{ route('passengers.index') }}" class="btn btn-back">
                    <i class="bi bi-arrow-left"></i> Back to Passengers
                </a>
            </div>

            <!-- PASSENGER INFO CARD -->
            <div class="passenger-info">
                <h5 class="mb-4"><i class="bi bi-info-circle"></i> Passenger Information</h5>
                <div class="stats-grid">
                    <div class="info-card">
                        <i class="bi bi-person-circle"></i>
                        <div>
                            <div class="info-label">Full Name</div>
                            <div class="info-value">{{ $passenger->name }}</div>
                        </div>
                    </div>
                    <div class="info-card">
                        <i class="bi bi-telephone-fill"></i>
                        <div>
                            <div class="info-label">Phone</div>
                            <div class="info-value">{{ $passenger->phone ?? 'N/A' }}</div>
                        </div>
                    </div>
                    <div class="info-card">
                        <i class="bi bi-passport"></i>
                        <div>
                            <div class="info-label">Passport</div>
                            <div class="info-value">{{ $passenger->passport_number ?? 'N/A' }}</div>
                        </div>
                    </div>
                    <div class="info-card">
                        <i class="bi bi-ticket-detailed"></i>
                        <div>
                            <div class="info-label">Booking Reference</div>
                            <div class="info-value">{{ $passenger->booking_reference ?? 'N/A' }}</div>
                        </div>
                    </div>
                    <div class="info-card">
                        <i class="bi bi-calendar-event"></i>
                        <div>
                            <div class="info-label">Age</div>
                            <div class="info-value">{{ $passenger->age ?? 'N/A' }} years</div>
                        </div>
                    </div>
                    <div class="info-card">
                        <i class="bi bi-gender-ambiguous"></i>
                        <div>
                            <div class="info-label">Gender</div>
                            <div class="info-value">
                                <span class="badge bg-{{ $passenger->gender === 'Male' ? 'primary' : 'danger' }}">
                                    {{ $passenger->gender ?? 'N/A' }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SERVICE HISTORY TABLE -->
            <div class="table-container">
                <h5 class="mb-4"><i class="bi bi-list-check"></i> Service History Records ({{ $serviceHistory->count() }})</h5>

                @if($serviceHistory->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th><i class="bi bi-hash"></i> ID</th>
                                    <th><i class="bi bi-briefcase"></i> Ground Service</th>
                                    <th><i class="bi bi-gear"></i> Service</th>
                                    <th><i class="bi bi-person-badge"></i> Staff</th>
                                    <th><i class="bi bi-calendar-event"></i> Date</th>
                                    <th><i class="bi bi-cash"></i> Cost</th>
                                    <th><i class="bi bi-info-circle"></i> Status</th>
                                    <th><i class="bi bi-file-text"></i> Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($serviceHistory as $history)
                                    <tr>
                                        <td><strong>#{{ $history->id }}</strong></td>
                                        <td>
                                            {{ $history->groundService->name ?? 'N/A' }}
                                        </td>
                                        <td>
                                            {{ $history->service->name ?? 'N/A' }}
                                        </td>
                                        <td>
                                            {{ $history->staff->name ?? 'N/A' }}
                                        </td>
                                        <td>
                                            {{ $history->service_date ? $history->service_date->format('d M Y') : 'N/A' }}
                                        </td>
                                        <td>
                                            <strong>${{ number_format($history->cost, 2) }}</strong>
                                        </td>
                                        <td>
                                            <span class="badge badge-{{ str_replace('-', '_', $history->status) }}">
                                                {{ ucfirst(str_replace('-', ' ', $history->status)) }}
                                            </span>
                                        </td>
                                        <td>
                                            <small>{{ $history->notes ? substr($history->notes, 0, 30) . (strlen($history->notes) > 30 ? '...' : '') : '-' }}</small>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="empty-state">
                        <i class="bi bi-inbox"></i>
                        <h5>No Service History Found</h5>
                        <p>This passenger has no service records yet.</p>
                    </div>
                @endif
            </div>

        </div>

        <!-- Bootstrap Bundle JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
