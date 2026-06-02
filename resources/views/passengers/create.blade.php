<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Add Passenger - {{ config('app.name', 'Airport Management') }}</title>

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
                border-color: #667eea;
                box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
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
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
                box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
            }
            .btn-cancel {
                flex: 1;
                background: #e9ecef;
                color: #333;
                border: none;
                padding: 12px 30px;
                border-radius: 8px;
                font-weight: 600;
                font-size: 1rem;
                cursor: pointer;
                transition: all 0.3s ease;
                text-decoration: none;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .btn-cancel:hover {
                background: #dee2e6;
                transform: translateY(-2px);
            }
            .required {
                color: #dc3545;
                margin-left: 3px;
            }
            .form-info {
                background: #f0f7ff;
                border-left: 4px solid #667eea;
                padding: 15px;
                border-radius: 5px;
                margin-bottom: 25px;
                color: #333;
                font-size: 0.9rem;
            }
        </style>
    </head>
    <body>
        @include('components.hospital-header')
        <x-side-navigation />
        <div class="container-main">
            <div class="card-form">
                <div class="card-header-custom">
                    <i class="bi bi-person-plus-fill" style="font-size: 1.75rem;"></i>
                    <h2>Add New Passenger</h2>
                </div>

                <div class="card-body-custom">
                    <div class="form-info">
                        <i class="bi bi-info-circle"></i> Please fill out all the required fields to add a new passenger.
                    </div>

                    <form action="{{ route('passengers.store') }}" method="POST">

                        @csrf

                        <div class="form-group">
                            <label>
                                <i class="bi bi-person"></i> Name
                                <span class="required">*</span>
                            </label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter passenger name" required>
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>
                                <i class="bi bi-telephone"></i> Phone
                                <span class="required">*</span>
                            </label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Enter phone number" required>
                            @error('phone')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>
                                <i class="bi bi-calendar"></i> Age
                                <span class="required">*</span>
                            </label>
                            <input type="number" name="age" class="form-control @error('age') is-invalid @enderror" placeholder="Enter age" min="0" max="150" required>
                            @error('age')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>
                                <i class="bi bi-gender-ambiguous"></i> Gender
                                <span class="required">*</span>
                            </label>

                            <select name="gender" class="form-control @error('gender') is-invalid @enderror" required>
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            @error('gender')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>
                                <i class="bi bi-passport"></i> Passport Number
                            </label>
                            <input type="text" name="passport_number" class="form-control @error('passport_number') is-invalid @enderror" placeholder="Enter passport number">
                            @error('passport_number')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>
                                <i class="bi bi-ticket"></i> Booking Reference
                            </label>
                            <input type="text" name="booking_reference" class="form-control @error('booking_reference') is-invalid @enderror" placeholder="Enter booking reference">
                            @error('booking_reference')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn-save">
                                <i class="bi bi-check-circle"></i> Save Passenger
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