<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Add Service Record - {{ config('app.name', 'Airport App') }}</title>

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
                max-width: 800px;
                margin-top: 40px;
                margin-bottom: 40px;
            }
            .card-header-custom {
                background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
                color: white;
                padding: 30px;
                border-radius: 10px 10px 0 0;
            }
            .card-header-custom h2 {
                margin: 0;
                font-weight: 700;
            }
            .card-body-custom {
                background: white;
                padding: 30px;
                border-radius: 0 0 10px 10px;
                box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            }
        </style>
    </head>

    <body class="font-sans antialiased">
        @include('components.hospital-header')
        <x-side-navigation />
        
        <div class="container-main">
            <div class="card-header-custom">
                <h2><i class="bi bi-file-earmark"></i> Add New Service Record</h2>
            </div>

            <div class="card-body-custom">
                <form action="{{ route('servicerecords.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="passenger_id" class="form-label">Passenger <span class="text-danger">*</span></label>
                        <select class="form-control @error('passenger_id') is-invalid @enderror" id="passenger_id" name="passenger_id" required>
                            <option value="">Select Passenger</option>
                            @foreach($passengers as $passenger)
                                <option value="{{ $passenger->id }}" {{ old('passenger_id') == $passenger->id ? 'selected' : '' }}>
                                    {{ $passenger->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('passenger_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="service_id" class="form-label">Service <span class="text-danger">*</span></label>
                        <select class="form-control @error('service_id') is-invalid @enderror" id="service_id" name="service_id" required>
                            <option value="">Select Service</option>
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

                    <div class="mb-3">
                        <label for="record_date" class="form-label">Record Date <span class="text-danger">*</span></label>
                        <input type="date" class="form-control @error('record_date') is-invalid @enderror" id="record_date" name="record_date" value="{{ old('record_date', date('Y-m-d')) }}" required>
                        @error('record_date')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="notes" class="form-label">Notes</label>
                        <textarea class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes" rows="4">{{ old('notes') }}</textarea>
                        @error('notes')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-lg"></i> Save
                        </button>
                        <a href="{{ route('servicerecords.index') }}" class="btn btn-secondary">
                            <i class="bi bi-x-lg"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
