<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Add Ground Service - {{ config('app.name', 'Airport App') }}</title>

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
                <h2><i class="bi bi-tools"></i> Add New Ground Service</h2>
            </div>

            <div class="card-body-custom">
                <form action="{{ route('groundservices.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Service Name <span class="text-danger">*</span></label>
                        <select class="form-select @error('name') is-invalid @enderror" id="name" name="name" required onchange="updateCategory()">
                            <option value="">-- Select a Service --</option>
                            
                            <!-- Aircraft Handling Services -->
                            <optgroup label="Aircraft Handling Services">
                                <option value="Aircraft parking">Aircraft parking</option>
                                <option value="Aircraft marshaling">Aircraft marshaling</option>
                                <option value="Pushback and towing">Pushback and towing</option>
                                <option value="Aircraft cleaning">Aircraft cleaning</option>
                                <option value="Aircraft fueling">Aircraft fueling</option>
                                <option value="Water service">Water service</option>
                                <option value="Lavatory service">Lavatory service</option>
                                <option value="Aircraft maintenance">Aircraft maintenance</option>
                                <option value="De-icing service">De-icing service</option>
                            </optgroup>
                            
                            <!-- Passenger Services -->
                            <optgroup label="Passenger Services">
                                <option value="Check-in services">Check-in services</option>
                                <option value="Boarding services">Boarding services</option>
                                <option value="Baggage handling">Baggage handling</option>
                                <option value="Lost and found">Lost and found</option>
                                <option value="Passenger assistance">Passenger assistance</option>
                                <option value="VIP & lounge services">VIP & lounge services</option>
                                <option value="Wheelchair assistance">Wheelchair assistance</option>
                                <option value="Immigration assistance">Immigration assistance</option>
                            </optgroup>
                            
                            <!-- Cargo Services -->
                            <optgroup label="Cargo Services">
                                <option value="Cargo loading and unloading">Cargo loading and unloading</option>
                                <option value="Cargo storage">Cargo storage</option>
                                <option value="Freight handling">Freight handling</option>
                                <option value="Customs clearance">Customs clearance</option>
                                <option value="Mail handling">Mail handling</option>
                            </optgroup>
                            
                            <!-- Ramp Services -->
                            <optgroup label="Ramp Services">
                                <option value="Ramp coordination">Ramp coordination</option>
                                <option value="Ground power supply">Ground power supply</option>
                                <option value="Air start unit service">Air start unit service</option>
                                <option value="Conveyor belt operation">Conveyor belt operation</option>
                                <option value="Ramp safety inspection">Ramp safety inspection</option>
                            </optgroup>
                            
                            <!-- Security Services -->
                            <optgroup label="Security Services">
                                <option value="Passenger screening">Passenger screening</option>
                                <option value="Baggage screening">Baggage screening</option>
                                <option value="Airport patrol">Airport patrol</option>
                                <option value="Access control">Access control</option>
                                <option value="Aircraft security checks">Aircraft security checks</option>
                            </optgroup>
                            
                            <!-- Catering Services -->
                            <optgroup label="Catering Services">
                                <option value="In-flight meal preparation">In-flight meal preparation</option>
                                <option value="Food loading to aircraft">Food loading to aircraft</option>
                                <option value="Beverage supply">Beverage supply</option>
                            </optgroup>
                            
                            <!-- Transportation Services -->
                            <optgroup label="Transportation Services">
                                <option value="Shuttle buses">Shuttle buses</option>
                                <option value="Crew transportation">Crew transportation</option>
                                <option value="Passenger transport on apron">Passenger transport on apron</option>
                                <option value="Taxi services">Taxi services</option>
                                <option value="Car rental services">Car rental services</option>
                            </optgroup>
                            
                            <!-- Emergency Services -->
                            <optgroup label="Emergency Services">
                                <option value="Fire and rescue services">Fire and rescue services</option>
                                <option value="Medical emergency services">Medical emergency services</option>
                                <option value="Emergency response team">Emergency response team</option>
                            </optgroup>
                            
                            <!-- Navigation & Operational Support -->
                            <optgroup label="Navigation & Operational Support">
                                <option value="Flight dispatch support">Flight dispatch support</option>
                                <option value="Weather information service">Weather information service</option>
                                <option value="Flight operations coordination">Flight operations coordination</option>
                                <option value="Communication support">Communication support</option>
                            </optgroup>
                            
                            <!-- Cleaning & Facility Services -->
                            <optgroup label="Cleaning & Facility Services">
                                <option value="Terminal cleaning">Terminal cleaning</option>
                                <option value="Waste management">Waste management</option>
                                <option value="Restroom maintenance">Restroom maintenance</option>
                                <option value="Runway cleaning">Runway cleaning</option>
                            </optgroup>
                        </select>
                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select @error('category') is-invalid @enderror" id="category" name="category">
                            <option value="">-- Select a Category --</option>
                            <option value="Passenger Handling">Passenger Handling</option>
                            <option value="Baggage Handling">Baggage Handling</option>
                            <option value="Ramp Handling">Ramp Handling</option>
                            <option value="Aircraft Technical Services">Aircraft Technical Services</option>
                            <option value="Cargo Handling">Cargo Handling</option>
                            <option value="Catering Services">Catering Services</option>
                            <option value="Security Services">Security Services</option>
                            <option value="Transportation Services">Transportation Services</option>
                            <option value="Emergency & Safety Services">Emergency & Safety Services</option>
                            <option value="Airport Facility Services">Airport Facility Services</option>
                            <option value="Flight Operations Support">Flight Operations Support</option>
                            <option value="Administrative & Customer Services">Administrative & Customer Services</option>
                        </select>
                        @error('category')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-lg"></i> Save
                        </button>
                        <a href="{{ route('groundservices.index') }}" class="btn btn-secondary">
                            <i class="bi bi-x-lg"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        
        <script>
            function updateCategory() {
                const serviceSelect = document.getElementById('name');
                const categorySelect = document.getElementById('category');
                const selectedService = serviceSelect.value;
                
                // Map services to categories
                const serviceToCategory = {
                    // Aircraft Handling Services
                    'Aircraft parking': 'Ramp Handling',
                    'Aircraft marshaling': 'Ramp Handling',
                    'Pushback and towing': 'Ramp Handling',
                    'Aircraft cleaning': 'Aircraft Technical Services',
                    'Aircraft fueling': 'Aircraft Technical Services',
                    'Water service': 'Aircraft Technical Services',
                    'Lavatory service': 'Aircraft Technical Services',
                    'Aircraft maintenance': 'Aircraft Technical Services',
                    'De-icing service': 'Aircraft Technical Services',
                    
                    // Passenger Services
                    'Check-in services': 'Passenger Handling',
                    'Boarding services': 'Passenger Handling',
                    'Baggage handling': 'Baggage Handling',
                    'Lost and found': 'Administrative & Customer Services',
                    'Passenger assistance': 'Passenger Handling',
                    'VIP & lounge services': 'Passenger Handling',
                    'Wheelchair assistance': 'Passenger Handling',
                    'Immigration assistance': 'Administrative & Customer Services',
                    
                    // Cargo Services
                    'Cargo loading and unloading': 'Cargo Handling',
                    'Cargo storage': 'Cargo Handling',
                    'Freight handling': 'Cargo Handling',
                    'Customs clearance': 'Cargo Handling',
                    'Mail handling': 'Cargo Handling',
                    
                    // Ramp Services
                    'Ramp coordination': 'Ramp Handling',
                    'Ground power supply': 'Ramp Handling',
                    'Air start unit service': 'Ramp Handling',
                    'Conveyor belt operation': 'Baggage Handling',
                    'Ramp safety inspection': 'Flight Operations Support',
                    
                    // Security Services
                    'Passenger screening': 'Security Services',
                    'Baggage screening': 'Security Services',
                    'Airport patrol': 'Security Services',
                    'Access control': 'Security Services',
                    'Aircraft security checks': 'Security Services',
                    
                    // Catering Services
                    'In-flight meal preparation': 'Catering Services',
                    'Food loading to aircraft': 'Catering Services',
                    'Beverage supply': 'Catering Services',
                    
                    // Transportation Services
                    'Shuttle buses': 'Transportation Services',
                    'Crew transportation': 'Transportation Services',
                    'Passenger transport on apron': 'Transportation Services',
                    'Taxi services': 'Transportation Services',
                    'Car rental services': 'Transportation Services',
                    
                    // Emergency Services
                    'Fire and rescue services': 'Emergency & Safety Services',
                    'Medical emergency services': 'Emergency & Safety Services',
                    'Emergency response team': 'Emergency & Safety Services',
                    
                    // Navigation & Operational Support
                    'Flight dispatch support': 'Flight Operations Support',
                    'Weather information service': 'Flight Operations Support',
                    'Flight operations coordination': 'Flight Operations Support',
                    'Communication support': 'Flight Operations Support',
                    
                    // Cleaning & Facility Services
                    'Terminal cleaning': 'Airport Facility Services',
                    'Waste management': 'Airport Facility Services',
                    'Restroom maintenance': 'Airport Facility Services',
                    'Runway cleaning': 'Airport Facility Services'
                };
                
                if (serviceToCategory[selectedService]) {
                    categorySelect.value = serviceToCategory[selectedService];
                }
            }
        </script>
    </body>
</html>
