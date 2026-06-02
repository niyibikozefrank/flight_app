<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Patient Treatment Records - {{ config('app.name', 'Clinic App') }}</title>

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
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                min-height: 100vh;
                margin: 0;
            }
            .container-main {
                max-width: 1400px;
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
            .table-container {
                background: white;
                padding: 30px;
                border-radius: 0 0 10px 10px;
                box-shadow: 0 5px 20px rgba(0,0,0,0.1);
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
        </style>
    </head>

    <body class="font-sans antialiased">
        @include('components.hospital-header')
        <x-side-navigation />
        
        <div class="container-main">
            <div class="card-header-custom">
                <div>
                    <h2><i class="bi bi-prescription2"></i> Treatment Records for {{ $patient->name }}</h2>
                    <p class="mb-0" style="color: rgba(255,255,255,0.9); font-size: 0.9rem;">Patient ID: {{ $patient->id }} | Phone: {{ $patient->phone }}</p>
                </div>
                <a href="{{ route('patients.index') }}" class="btn btn-light">
                    <i class="bi bi-arrow-left"></i> Back to Patients
                </a>
            </div>

            <div class="table-container">
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Treatment</th>
                                <th>Medical</th>
                                <th>Doctor</th>
                                <th>Price</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Notes</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($treatmentRecords as $record)
                                <tr>
                                    <td><span class="badge bg-info">{{ $record->treatment->name }}</span></td>
                                    <td>{{ $record->medical->name }}</td>
                                    <td>{{ $record->doctor->name }}</td>
                                    <td><strong>${{ number_format($record->price, 2) }}</strong></td>
                                    <td>{{ \Carbon\Carbon::parse($record->treatment_date)->format('M d, Y') }}</td>
                                    <td>
                                        <span class="badge badge-{{ str_replace('_', '-', $record->status) }}">
                                            {{ ucfirst(str_replace('_', ' ', $record->status)) }}
                                        </span>
                                    </td>
                                    <td>{{ \Illuminate\Support\Str::limit($record->notes, 20) ?? 'N/A' }}</td>
                                    <td>
                                        <a href="{{ route('treatmentrecord.edit', $record->id) }}" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <a href="{{ route('treatmentrecord.delete', $record->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                            <i class="bi bi-trash"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-4">No treatment records found for this patient</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
