<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Edit Passenger - {{ config('app.name', 'Airport Management') }}</title>

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
            .container-main {
                max-width: 700px;
                margin-top: 40px;
                margin-bottom: 40px;
            }
            .card-form {
                background: white;
                border-radius: 10px;
                box-shadow: 0 10px 30px rgba(0,0,0,0.2);
                overflow: hidden;
            }
            .card-header-custom {
                background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
                color: white;
                padding: 30px;
                display: flex;
                align-items: center;
                gap: 15px;
            }
            .card-header-custom h2 {
                margin: 0;
                font-weight: 700;
                font-size: 1.75rem;
            }
            .card-body-custom {
                padding: 40px;
            }
            .form-group {
                margin-bottom: 25px;
            }
            .form-group label {
                display: block;
                margin-bottom: 10px;
                font-weight: 600;
                color: #333;
                font-size: 0.95rem;
            }
            .form-control {
                border: 2px solid #e9ecef;
                border-radius: 8px;
                padding: 12px 15px;
                font-size: 1rem;
                transition: all 0.3s ease;
            }
            .form-control:focus {
                border-color: #1e3c72;
                box-shadow: 0 0 0 0.2rem rgba(30, 60, 114, 0.25);
                outline: none;
            }
            textarea.form-control {
                resize: vertical;
                min-height: 120px;
            }
            .form-actions {
                display: flex;
                gap: 10px;
                margin-top: 35px;
            }
            .btn-save {
                flex: 1;
                background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
                color: white;
                border: none;
                padding: 12px 30px;
                border-radius: 8px;
                font-weight: 600;
                font-size: 1rem;
                cursor: pointer;
                transition: all 0.3s ease;
            }
            .btn-save:hover {
                transform: translateY(-2px);
                box-shadow: 0 8px 20px rgba(30, 60, 114, 0.4);
            }
            .btn-cancel {
                flex: 1;
                background: #e9ecef;
                color: #495057;
                border: none;
                padding: 12px 30px;
                border-radius: 8px;
                font-weight: 600;
                font-size: 1rem;
                cursor: pointer;
                text-decoration: none;
                display: flex;
                align-items: center;
                justify-content: center;
                transition: all 0.3s ease;
            }
            .btn-cancel:hover {
                background: #dee2e6;
                color: #212529;
            }
            .form-error {
                color: #dc3545;
                font-size: 0.875rem;
                margin-top: 5px;
                display: block;
            }
            .required {
                color: #dc3545;
            }
        </style>
    </head>

    <body>
        @include('components.hospital-header')
        <x-side-navigation />

        <div class="container-main">
            <div class="card-form">
                <div class="card-header-custom">
                    <i class="bi bi-pencil-square" style="font-size: 1.5rem;"></i>
                    <h2>Edit Passenger</h2>
                </div>

                <div class="card-body-custom">
                    <form method="POST" action="{{ route('passengers.update', $passenger->id) }}">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label for="name">Name <span class="required">*</span></label>
                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $passenger->name) }}" required />
                            @error('name')
                                <span class="form-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone <span class="required">*</span></label>
                            <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $passenger->phone) }}" required />
                            @error('phone')
                                <span class="form-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="age">Age <span class="required">*</span></label>
                            <input type="number" id="age" name="age" class="form-control @error('age') is-invalid @enderror" value="{{ old('age', $passenger->age) }}" min="0" max="150" required />
                            @error('age')
                                <span class="form-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="gender">Gender <span class="required">*</span></label>
                            <select id="gender" name="gender" class="form-control @error('gender') is-invalid @enderror" required>
                                <option value="">Select Gender</option>
                                <option value="Male" {{ old('gender', $passenger->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('gender', $passenger->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('gender')
                                <span class="form-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="passport_number">Passport Number</label>
                            <input type="text" id="passport_number" name="passport_number" class="form-control @error('passport_number') is-invalid @enderror" value="{{ old('passport_number', $passenger->passport_number) }}" />
                            @error('passport_number')
                                <span class="form-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="booking_reference">Booking Reference</label>
                            <input type="text" id="booking_reference" name="booking_reference" class="form-control @error('booking_reference') is-invalid @enderror" value="{{ old('booking_reference', $passenger->booking_reference) }}" />
                            @error('booking_reference')
                                <span class="form-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn-save">
                                <i class="bi bi-check-circle"></i> Update Passenger
                            </button>
                            <a href="{{ route('passengers.index') }}" class="btn-cancel">
                                <i class="bi bi-x-circle"></i> Cancel
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>