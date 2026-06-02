<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Gates Management - {{ config('app.name', 'Airport Management') }}</title>

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
                padding: 10px 20px;
                border-radius: 8px;
                text-decoration: none;
                display: inline-flex;
                align-items: center;
                gap: 8px;
            }
            .btn-add:hover {
                background: #f0f0f0;
                transform: translateY(-2px);
                box-shadow: 0 5px 15px rgba(0,0,0,0.2);
                color: #1e3c72;
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
            .badge {
                padding: 8px 12px;
                border-radius: 20px;
                font-size: 0.85rem;
                font-weight: 600;
            }
            .badge-available {
                background-color: #dcfce7;
                color: #166534;
            }
            .badge-occupied {
                background-color: #fee2e2;
                color: #991b1b;
            }
            .badge-maintenance {
                background-color: #fef3c7;
                color: #92400e;
            }
            .badge-cleaning {
                background-color: #e0e7ff;
                color: #3730a3;
            }
            .badge-closed {
                background-color: #f3f4f6;
                color: #374151;
            }
            .action-btn {
                text-decoration: none;
                font-weight: 600;
                margin-right: 15px;
                transition: all 0.3s ease;
            }
            .edit-btn {
                color: #1e3c72;
            }
            .edit-btn:hover {
                color: #0d2239;
                text-decoration: underline;
            }
            .delete-btn {
                color: #dc3545;
                background: none;
                border: none;
                cursor: pointer;
                font-weight: 600;
                transition: all 0.3s ease;
                padding: 0;
            }
            .delete-btn:hover {
                color: #bd2130;
                text-decoration: underline;
            }
            .empty-state {
                background: white;
                border-radius: 10px;
                box-shadow: 0 5px 20px rgba(0,0,0,0.1);
                padding: 60px 30px;
                text-align: center;
            }
            .empty-state p {
                color: #6b7280;
                margin-bottom: 20px;
                font-size: 1.1rem;
            }
            .empty-state a {
                color: #1e3c72;
                text-decoration: none;
                font-weight: 600;
                transition: all 0.3s ease;
            }
            .empty-state a:hover {
                color: #0d2239;
            }
        </style>
    </head>

    <body>
        @include('components.hospital-header')
        <x-side-navigation />
        
        <div class="container-main">
            <div class="card-header-custom">
                <h2><i class="bi bi-diagram-3"></i> Gates Management</h2>
                <a href="{{ route('gates.create') }}" class="btn-add">
                    <i class="bi bi-plus-circle"></i> Add New Gate
                </a>
            </div>

            <div style="padding: 30px; background: white; border-radius: 0 0 10px 10px; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
                
                @if (session('success'))
                    <div class="alert alert-success">
                        <i class="bi bi-check-circle"></i> {{ session('success') }}
                    </div>
                @endif

                @if ($gates->count() > 0)
                    <div class="table-container">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><i class="bi bi-diagram-3"></i> Gate #</th>
                                    <th><i class="bi bi-building"></i> Terminal</th>
                                    <th><i class="bi bi-people"></i> Capacity</th>
                                    <th><i class="bi bi-circle-fill"></i> Status</th>
                                    <th><i class="bi bi-chat-dots"></i> Description</th>
                                    <th style="text-align: center;"><i class="bi bi-gear"></i> Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($gates as $gate)
                                    <tr>
                                        <td style="font-weight: 600;">{{ $gate->gate_number }}</td>
                                        <td>{{ $gate->terminal ?? 'N/A' }}</td>
                                        <td>{{ $gate->capacity }} passengers</td>
                                        <td>
                                            @switch($gate->status)
                                                @case('available')
                                                    <span class="badge badge-available">Available</span>
                                                    @break
                                                @case('occupied')
                                                    <span class="badge badge-occupied">Occupied</span>
                                                    @break
                                                @case('maintenance')
                                                    <span class="badge badge-maintenance">Maintenance</span>
                                                    @break
                                                @case('cleaning')
                                                    <span class="badge badge-cleaning">Cleaning</span>
                                                    @break
                                                @case('closed')
                                                    <span class="badge badge-closed">Closed</span>
                                                    @break
                                                @default
                                                    <span class="badge badge-closed">{{ ucfirst($gate->status) }}</span>
                                            @endswitch
                                        </td>
                                        <td style="max-width: 250px; color: #6b7280;">{{ Str::limit($gate->description, 50) ?? 'N/A' }}</td>
                                        <td style="text-align: center;">
                                            <a href="{{ route('gates.edit', $gate) }}" class="action-btn edit-btn">
                                                <i class="bi bi-pencil"></i> Edit
                                            </a>
                                            <form method="POST" action="{{ route('gates.destroy', $gate) }}" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this gate?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="delete-btn">
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
                        <i class="bi bi-inbox" style="font-size: 3rem; color: #d1d5db; margin-bottom: 20px; display: block;"></i>
                        <p>No gates found</p>
                        <a href="{{ route('gates.create') }}"><i class="bi bi-plus-circle"></i> Create your first gate →</a>
                    </div>
                @endif
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
