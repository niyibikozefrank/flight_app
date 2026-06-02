<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Add Service History - {{ config('app.name', 'Airport App') }}</title>

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
                max-width: 1000px;
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
            .card-body-custom {
                background: white;
                padding: 40px;
                border-radius: 0 0 10px 10px;
                box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            }
            .form-label {
                font-weight: 600;
                color: #1e3c72;
                margin-bottom: 10px;
            }
            .form-control, .form-select {
                border: 2px solid #e0e0e0;
                border-radius: 8px;
                padding: 12px 15px;
                font-size: 1rem;
                transition: all 0.3s ease;
            }
            .form-control:focus, .form-select:focus {
                border-color: #1e3c72;
                box-shadow: 0 0 0 0.2rem rgba(30, 60, 114, 0.25);
            }
            .is-invalid {
                border-color: #dc3545;
            }
            .invalid-feedback {
                display: block;
                color: #dc3545;
                font-size: 0.875rem;
                margin-top: 5px;
            }
            .btn {
                font-weight: 600;
                padding: 10px 20px;
                border-radius: 8px;
                transition: all 0.3s ease;
            }
            .btn-primary {
                background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
                border: none;
            }
            .btn-primary:hover {
                transform: translateY(-2px);
                box-shadow: 0 5px 15px rgba(30, 60, 114, 0.4);
            }
            .btn-secondary {
                background: #6c757d;
                border: none;
            }
            .btn-secondary:hover {
                background: #5a6268;
                transform: translateY(-2px);
            }
            .text-danger {
                color: #dc3545;
            }
            .form-section {
                margin-bottom: 30px;
                padding-bottom: 20px;
                border-bottom: 2px solid #f0f0f0;
            }
            .form-section:last-child {
                border-bottom: none;
            }
            .section-title {
                font-size: 1.1rem;
                font-weight: 700;
                color: #1e3c72;
                margin-bottom: 20px;
                display: flex;
                align-items: center;
                gap: 10px;
            }
        </style>
    </head>

    <body class="font-sans antialiased">
        @include('components.hospital-header')
        <x-side-navigation />
        
        <div class="container-main">
            <div class="card-header-custom">
                <h2><i class="bi bi-clock-history"></i> Add New Service History</h2>
                <a href="{{ route('servicehistory.index') }}" class="btn" style="background: white; color: #1e3c72;">
                    <i class="bi bi-arrow-left"></i> Back
                </a>
            </div>

            <div class="card-body-custom">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><i class="bi bi-exclamation-circle"></i> Error!</strong> Please fix the following errors:
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <form action="{{ route('servicehistory.store') }}" method="POST">
                    @csrf

                    <!-- PASSENGER & STAFF SECTION -->
                    <div class="form-section">
                        <div class="section-title">
                            <i class="bi bi-people-fill"></i> Personnel Information
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="passenger_id" class="form-label">Passenger Name <span class="text-danger">*</span></label>
                                <select class="form-select @error('passenger_id') is-invalid @enderror" id="passenger_id" name="passenger_id" required>
                                    <option value="">-- Select Passenger --</option>
                                    @foreach($passengers as $passenger)
                                        <option value="{{ $passenger->id }}" {{ old('passenger_id') == $passenger->id ? 'selected' : '' }}>
                                            {{ $passenger->name }} (ID: #{{ $passenger->id }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('passenger_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="staff_id" class="form-label">Staff Member <span class="text-danger">*</span></label>
                                <select class="form-select @error('staff_id') is-invalid @enderror" id="staff_id" name="staff_id" required>
                                    <option value="">-- Select Staff --</option>
                                    @foreach($staff as $member)
                                        <option value="{{ $member->id }}" {{ old('staff_id') == $member->id ? 'selected' : '' }}>
                                            {{ $member->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('staff_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- SERVICE SECTION -->
                    <div class="form-section">
                        <div class="section-title">
                            <i class="bi bi-briefcase"></i> Service Information
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="ground_service_id" class="form-label">Ground Service <span class="text-danger">*</span></label>
                                <select class="form-select @error('ground_service_id') is-invalid @enderror" id="ground_service_id" name="ground_service_id" required>
                                    <option value="">-- Select Ground Service --</option>
                                    @foreach($groundServices as $service)
                                        <option value="{{ $service->id }}" {{ old('ground_service_id') == $service->id ? 'selected' : '' }}>
                                            {{ $service->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('ground_service_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="service_id" class="form-label">Service Type <span class="text-danger">*</span></label>
                                <select class="form-select @error('service_id') is-invalid @enderror" id="service_id" name="service_id" required>
                                    <option value="">-- Select Service --</option>
                                    @foreach($services as $service)
                                        <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                            {{ $service->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('service_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- DETAILS SECTION -->
                    <div class="form-section">
                        <div class="section-title">
                            <i class="bi bi-file-earmark-text"></i> Service Details
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <label for="cost" class="form-label">Cost <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" step="0.01" min="0" class="form-control @error('cost') is-invalid @enderror" id="cost" name="cost" value="{{ old('cost', '0.00') }}" required>
                                </div>
                                @error('cost')
                                    <span class="invalid-feedback d-block">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-4">
                                <label for="service_date" class="form-label">Service Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('service_date') is-invalid @enderror" id="service_date" name="service_date" value="{{ old('service_date', date('Y-m-d')) }}" required>
                                @error('service_date')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-4">
                                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                                    <option value="">-- Select Status --</option>
                                    <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>
                                        <i class="bi bi-clock"></i> Pending
                                    </option>
                                    <option value="in-progress" {{ old('status') == 'in-progress' ? 'selected' : '' }}>
                                        <i class="bi bi-hourglass-split"></i> In Progress
                                    </option>
                                    <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>
                                        <i class="bi bi-check-circle"></i> Completed
                                    </option>
                                    <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>
                                        <i class="bi bi-x-circle"></i> Cancelled
                                    </option>
                                </select>
                                @error('status')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- NOTES SECTION -->
                    <div class="form-section">
                        <label for="notes" class="form-label">
                            <i class="bi bi-sticky"></i> Notes
                        </label>
                        <textarea class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes" rows="4" placeholder="Add any additional notes or comments...">{{ old('notes') }}</textarea>
                        @error('notes')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- ACTION BUTTONS -->
                    <div class="d-flex gap-3 justify-content-end mt-5">
                        <a href="{{ route('servicehistory.index') }}" class="btn btn-secondary">
                            <i class="bi bi-x-lg"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-lg"></i> Save Service History
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
