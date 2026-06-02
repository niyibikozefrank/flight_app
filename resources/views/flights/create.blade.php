<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Flight - {{ config('app.name', 'Airport Management') }}</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            min-height: 100vh;
            font-family: 'Figtree', sans-serif;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('/clinic_app/photo/three.jpg');
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
            opacity: 0.12;
            z-index: 0;
        }

        .page-wrapper {
            position: relative;
            z-index: 5;
            padding: 40px 20px;
            min-height: 100vh;
        }

        .page-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(31, 38, 135, 0.37);
            border: 1px solid rgba(255, 255, 255, 0.18);
            overflow: hidden;
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .glass-header {
            background: linear-gradient(135deg, rgba(30, 60, 114, 0.95) 0%, rgba(42, 82, 152, 0.95) 100%);
            backdrop-filter: blur(10px);
            color: white;
            padding: 35px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .glass-header h1 {
            margin: 0;
            font-weight: 700;
            font-size: 28px;
        }

        .glass-header i {
            font-size: 32px;
            color: #4fb3d9;
        }

        .glass-body {
            padding: 40px;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid rgba(30, 60, 114, 0.2);
            font-size: 18px;
            font-weight: 600;
            color: #1e3c72;
        }

        .section-title i {
            color: #2a5298;
            font-size: 20px;
        }

        .form-section {
            margin-bottom: 35px;
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 15px;
        }

        .form-group {
            margin-bottom: 0;
        }

        .form-label {
            font-weight: 600;
            color: #1e3c72;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
        }

        .form-label i {
            color: #2a5298;
            font-size: 16px;
        }

        .form-control, .form-select {
            border: 2px solid rgba(30, 60, 114, 0.2);
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 14px;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.8);
        }

        .form-control:focus, .form-select:focus {
            border-color: #2a5298;
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 0 0 0.2rem rgba(42, 82, 152, 0.15);
            outline: none;
        }

        .form-control::placeholder {
            color: #999;
        }

        .invalid-feedback {
            display: block;
            color: #dc3545;
            font-size: 12px;
            margin-top: 5px;
        }

        .alert {
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.18);
            background: rgba(220, 53, 69, 0.1);
            backdrop-filter: blur(10px);
            margin-bottom: 25px;
        }

        .alert-danger {
            color: #dc3545;
            border-color: rgba(220, 53, 69, 0.3);
        }

        .alert strong {
            font-weight: 600;
        }

        .alert ul {
            margin: 8px 0 0 0;
            padding-left: 20px;
        }

        .alert li {
            margin: 4px 0;
        }

        .button-group {
            display: flex;
            gap: 12px;
            margin-top: 35px;
            padding-top: 25px;
            border-top: 1px solid rgba(30, 60, 114, 0.2);
        }

        .btn-modern {
            flex: 1;
            border: none;
            border-radius: 12px;
            padding: 14px 24px;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-submit {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(30, 60, 114, 0.3);
        }

        .btn-submit:hover {
            background: linear-gradient(135deg, #1a2f5a 0%, #234473 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(30, 60, 114, 0.4);
            color: white;
        }

        .btn-cancel {
            background: rgba(255, 255, 255, 0.8);
            color: #1e3c72;
            border: 2px solid rgba(30, 60, 114, 0.2);
            backdrop-filter: blur(10px);
        }

        .btn-cancel:hover {
            background: rgba(255, 255, 255, 0.95);
            border-color: #1e3c72;
            transform: translateY(-2px);
            color: #1e3c72;
        }

        .info-box {
            background: rgba(79, 179, 217, 0.1);
            border-left: 4px solid #4fb3d9;
            border-radius: 8px;
            padding: 15px;
            margin: 20px 0;
            font-size: 13px;
            color: #2a5298;
        }

        .info-box i {
            margin-right: 8px;
            color: #4fb3d9;
        }

        @media (max-width: 768px) {
            .glass-body {
                padding: 25px;
            }

            .glass-header {
                padding: 25px;
            }

            .glass-header h1 {
                font-size: 22px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .button-group {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    @include('components.hospital-header')

    <!-- Sidebar -->
    <x-side-navigation />

    <div class="page-wrapper">
        <div class="page-container">

            <!-- MAIN CARD -->
            <div class="glass-card">

                <!-- HEADER -->
                <div class="glass-header">
                    <i class="bi bi-airplane"></i>
                    <h1>Book Your Flight</h1>
                </div>

                <!-- BODY -->
                <div class="glass-body">

                    <!-- ERROR DISPLAY -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong><i class="bi bi-exclamation-triangle"></i> Validation Errors:</strong>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- FORM -->
                    <form action="{{ route('flights.store') }}" method="POST">
                        @csrf

                        <!-- PASSENGER & FLIGHT INFO SECTION -->
                        <div class="form-section">
                            <div class="section-title">
                                <i class="bi bi-person-fill"></i>
                                Passenger & Flight Information
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="bi bi-person"></i>
                                        Passenger
                                    </label>
                                    <select name="passenger_id" class="form-select @error('passenger_id') is-invalid @enderror" required>
                                        <option value="">Select Passenger</option>
                                        @foreach($passengers as $p)
                                            <option value="{{ $p->id }}" {{ old('passenger_id') == $p->id ? 'selected' : '' }}>
                                                {{ $p->name }} ({{ $p->passport_number ?? 'N/A' }})
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('passenger_id')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="bi bi-airplane-circle"></i>
                                        Flight Number
                                    </label>
                                    <input type="text" name="flight_number" class="form-control @error('flight_number') is-invalid @enderror" placeholder="e.g., KA001" required value="{{ old('flight_number') }}">
                                    @error('flight_number')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="bi bi-person-badge"></i>
                                        Staff Crew
                                    </label>
                                    <select name="staff_id" class="form-select @error('staff_id') is-invalid @enderror" required>
                                        <option value="">Select Staff</option>
                                        @foreach($staff as $s)
                                            <option value="{{ $s->id }}" {{ old('staff_id') == $s->id ? 'selected' : '' }}>
                                                {{ $s->name }} - {{ $s->position }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('staff_id')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="bi bi-geo-alt"></i>
                                        Destination
                                    </label>
                                    <input type="text" name="destination" class="form-control @error('destination') is-invalid @enderror" placeholder="e.g., Paris, London" required value="{{ old('destination') }}">
                                    @error('destination')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- FLIGHT SCHEDULE SECTION -->
                        <div class="form-section">
                            <div class="section-title">
                                <i class="bi bi-calendar2-event"></i>
                                Schedule & Location
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="bi bi-clock"></i>
                                        Departure Time
                                    </label>
                                    <input type="datetime-local" name="departure_time" class="form-control @error('departure_time') is-invalid @enderror" required value="{{ old('departure_time') }}">
                                    @error('departure_time')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="bi bi-clock"></i>
                                        Arrival Time
                                    </label>
                                    <input type="datetime-local" name="arrival_time" class="form-control @error('arrival_time') is-invalid @enderror" required value="{{ old('arrival_time') }}">
                                    @error('arrival_time')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="bi bi-diagram-3"></i>
                                        Gate Assignment
                                    </label>
                                    <select name="gate_id" class="form-select @error('gate_id') is-invalid @enderror">
                                        <option value="">Select Gate (Optional)</option>
                                        @foreach($gates as $g)
                                            <option value="{{ $g->id }}" {{ old('gate_id') == $g->id ? 'selected' : '' }}>
                                                Gate {{ $g->gate_number }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('gate_id')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="bi bi-info-circle"></i>
                                        Flight Status
                                    </label>
                                    <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                                        <option value="">Select Status</option>
                                        <option value="scheduled" {{ old('status') == 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                                        <option value="boarding" {{ old('status') == 'boarding' ? 'selected' : '' }}>Boarding</option>
                                        <option value="departed" {{ old('status') == 'departed' ? 'selected' : '' }}>Departed</option>
                                        <option value="delayed" {{ old('status') == 'delayed' ? 'selected' : '' }}>Delayed</option>
                                        <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- AIRCRAFT & PRICING SECTION -->
                        <div class="form-section">
                            <div class="section-title">
                                <i class="bi bi-hangar"></i>
                                Aircraft & Pricing
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="bi bi-hangar"></i>
                                        Aircraft Type
                                    </label>
                                    <select name="aircraft_type" class="form-select @error('aircraft_type') is-invalid @enderror">
                                        <option value="">Select Aircraft Type</option>
                                        
                                        <optgroup label="Airbus Aircraft">
                                            <option value="Airbus A220" {{ old('aircraft_type') == 'Airbus A220' ? 'selected' : '' }}>Airbus A220</option>
                                            <option value="Airbus A320" {{ old('aircraft_type') == 'Airbus A320' ? 'selected' : '' }}>Airbus A320</option>
                                            <option value="Airbus A330" {{ old('aircraft_type') == 'Airbus A330' ? 'selected' : '' }}>Airbus A330</option>
                                            <option value="Airbus A350" {{ old('aircraft_type') == 'Airbus A350' ? 'selected' : '' }}>Airbus A350</option>
                                            <option value="Airbus A380" {{ old('aircraft_type') == 'Airbus A380' ? 'selected' : '' }}>Airbus A380</option>
                                        </optgroup>

                                        <optgroup label="Boeing Aircraft">
                                            <option value="Boeing 737" {{ old('aircraft_type') == 'Boeing 737' ? 'selected' : '' }}>Boeing 737</option>
                                            <option value="Boeing 747" {{ old('aircraft_type') == 'Boeing 747' ? 'selected' : '' }}>Boeing 747</option>
                                            <option value="Boeing 757" {{ old('aircraft_type') == 'Boeing 757' ? 'selected' : '' }}>Boeing 757</option>
                                            <option value="Boeing 767" {{ old('aircraft_type') == 'Boeing 767' ? 'selected' : '' }}>Boeing 767</option>
                                            <option value="Boeing 777" {{ old('aircraft_type') == 'Boeing 777' ? 'selected' : '' }}>Boeing 777</option>
                                            <option value="Boeing 787 Dreamliner" {{ old('aircraft_type') == 'Boeing 787 Dreamliner' ? 'selected' : '' }}>Boeing 787 Dreamliner</option>
                                        </optgroup>

                                        <optgroup label="Embraer Aircraft">
                                            <option value="Embraer E170" {{ old('aircraft_type') == 'Embraer E170' ? 'selected' : '' }}>Embraer E170</option>
                                            <option value="Embraer E190" {{ old('aircraft_type') == 'Embraer E190' ? 'selected' : '' }}>Embraer E190</option>
                                            <option value="Embraer E195-E2" {{ old('aircraft_type') == 'Embraer E195-E2' ? 'selected' : '' }}>Embraer E195-E2</option>
                                        </optgroup>

                                        <optgroup label="Bombardier Aircraft">
                                            <option value="Bombardier CRJ700" {{ old('aircraft_type') == 'Bombardier CRJ700' ? 'selected' : '' }}>Bombardier CRJ700</option>
                                            <option value="Bombardier Global 7500" {{ old('aircraft_type') == 'Bombardier Global 7500' ? 'selected' : '' }}>Bombardier Global 7500</option>
                                        </optgroup>

                                        <optgroup label="ATR Aircraft">
                                            <option value="ATR 42" {{ old('aircraft_type') == 'ATR 42' ? 'selected' : '' }}>ATR 42</option>
                                            <option value="ATR 72" {{ old('aircraft_type') == 'ATR 72' ? 'selected' : '' }}>ATR 72</option>
                                        </optgroup>

                                        <optgroup label="Military Aircraft">
                                            <option value="Lockheed Martin F-35 Lightning II" {{ old('aircraft_type') == 'Lockheed Martin F-35 Lightning II' ? 'selected' : '' }}>Lockheed Martin F-35 Lightning II</option>
                                            <option value="Boeing C-17 Globemaster III" {{ old('aircraft_type') == 'Boeing C-17 Globemaster III' ? 'selected' : '' }}>Boeing C-17 Globemaster III</option>
                                            <option value="Lockheed Martin C-130 Hercules" {{ old('aircraft_type') == 'Lockheed Martin C-130 Hercules' ? 'selected' : '' }}>Lockheed Martin C-130 Hercules</option>
                                        </optgroup>
                                    </select>
                                    @error('aircraft_type')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="bi bi-people"></i>
                                        Capacity
                                    </label>
                                    <input type="number" name="capacity" class="form-control @error('capacity') is-invalid @enderror" placeholder="e.g., 180" min="1" value="{{ old('capacity') }}">
                                    @error('capacity')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="bi bi-currency-dollar"></i>
                                        Ticket Price
                                    </label>
                                    <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="e.g., 299.99" min="0" step="0.01" value="{{ old('price') }}">
                                    @error('price')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="bi bi-bookmark"></i>
                                        Booking Reference
                                    </label>
                                    <input type="text" name="booking_reference" class="form-control @error('booking_reference') is-invalid @enderror" placeholder="Auto-generated if left empty" value="{{ old('booking_reference') }}">
                                    @error('booking_reference')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="info-box">
                                <i class="bi bi-info-circle"></i>
                                Leave booking reference empty to auto-generate a unique reference code
                            </div>
                        </div>

                        <!-- BUTTONS -->
                        <div class="button-group">
                            <button type="submit" class="btn-modern btn-submit">
                                <i class="bi bi-check-circle"></i>
                                Complete Booking
                            </button>

                            <a href="{{ route('flights.index') }}" class="btn-modern btn-cancel">
                                <i class="bi bi-arrow-left"></i>
                                Cancel
                            </a>
                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>

    <script>
        // Client-side validation to ensure arrival time is after departure time
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const departureInput = document.querySelector('input[name="departure_time"]');
            const arrivalInput = document.querySelector('input[name="arrival_time"]');
            
            form.addEventListener('submit', function(e) {
                if (departureInput && arrivalInput && departureInput.value && arrivalInput.value) {
                    const departure = new Date(departureInput.value);
                    const arrival = new Date(arrivalInput.value);
                    
                    if (arrival <= departure) {
                        e.preventDefault();
                        alert('Arrival time must be after departure time.');
                        arrivalInput.focus();
                        return false;
                    }
                }
            });
            
            // Real-time validation feedback
            arrivalInput?.addEventListener('change', function() {
                if (departureInput && departureInput.value && arrivalInput.value) {
                    const departure = new Date(departureInput.value);
                    const arrival = new Date(arrivalInput.value);
                    
                    if (arrival <= departure) {
                        arrivalInput.classList.add('is-invalid');
                    } else {
                        arrivalInput.classList.remove('is-invalid');
                    }
                }
            });
        });
    </script>

</body>

</html>