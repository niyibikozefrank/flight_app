<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>My Profile - {{ config('app.name', 'Clinic App') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body { 
            margin: 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        .hospital-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 15px 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }
        .header-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
        }
        .logo-section {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .hospital-logo {
            width: 60px;
            height: 60px;
            filter: brightness(0) invert(1);
        }
        .hospital-info {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }
        .hospital-title {
            margin: 0;
            font-size: 24px;
            font-weight: 700;
            color: #ffffff;
            letter-spacing: 1px;
        }
        .hospital-subtitle {
            margin: 0;
            font-size: 12px;
            color: rgba(255, 255, 255, 0.9);
            font-weight: 500;
        }
        .container-main {
            max-width: 1200px;
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
        .profile-card {
            background: white;
            border-radius: 0 0 10px 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-bottom: 20px;
        }
        .profile-section {
            margin-bottom: 30px;
            padding-bottom: 30px;
            border-bottom: 1px solid #e9ecef;
        }
        .profile-section:last-child {
            border-bottom: none;
        }
        .profile-section h3 {
            color: #333;
            font-weight: 700;
            margin-bottom: 20px;
            font-size: 1.2rem;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-label {
            font-weight: 600;
            color: #555;
            margin-bottom: 8px;
        }
        .form-control {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px 15px;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        .btn-save {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .btn-save:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        .alert {
            border-radius: 10px;
            border: none;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .alert-success {
            background: linear-gradient(135deg, #84fab0 0%, #8fd3f4 100%);
            color: white;
        }
        .alert-danger {
            background: linear-gradient(135deg, #fa7c92 0%, #fee140 100%);
            color: white;
        }
        .profile-info-item {
            display: grid;
            grid-template-columns: 150px 1fr;
            gap: 20px;
            margin-bottom: 15px;
        }
        .profile-info-label {
            font-weight: 600;
            color: #666;
        }
        .profile-info-value {
            color: #333;
        }
        .profile-picture-section {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 30px;
            border-bottom: 1px solid #e9ecef;
        }
        .profile-picture-container {
            position: relative;
            width: 180px;
            height: 180px;
            margin: 0 auto 20px;
        }
        .profile-picture-img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #667eea;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }
        .profile-picture-placeholder {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 80px;
            color: white;
            border: 4px solid #667eea;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }
        .upload-picture-form {
            margin-top: 20px;
        }
        .file-input-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }
        .file-input-wrapper input[type=file] {
            position: absolute;
            left: -9999px;
        }
        .btn-upload {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-block;
        }
        .btn-upload:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            color: white;
            text-decoration: none;
        }
        .btn-remove {
            background: #dc3545;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-left: 10px;
            font-size: 0.9rem;
        }
        .btn-remove:hover {
            background: #c82333;
            transform: translateY(-2px);
        }
        .file-name-display {
            margin-top: 10px;
            font-size: 0.9rem;
            color: #666;
        }
        @media (max-width: 768px) {
            .hospital-title {
                font-size: 18px;
            }
            .hospital-subtitle {
                font-size: 10px;
            }
            .hospital-logo {
                width: 50px;
                height: 50px;
            }
            .profile-info-item {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body class="font-sans antialiased">
    @include('components.hospital-header')
    <x-side-navigation />
    
    <div class="container-main">
        <div class="card-header-custom">
            <h2><i class="bi bi-person-circle"></i> My Profile</h2>
        </div>

        <div class="profile-card">
            @if(session('status') === 'profile-updated')
                <div class="alert alert-success">
                    <i class="bi bi-check-circle"></i> Profile updated successfully!
                </div>
            @endif

            <!-- Profile Picture Section -->
            <div class="profile-picture-section">
                <h3><i class="bi bi-image"></i> Profile Picture</h3>
                
                <div class="profile-picture-container">
                    @if(auth()->user()->profile_picture)
                        <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="Profile Picture" class="profile-picture-img" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div class="profile-picture-placeholder" style="display:none;">
                            <i class="bi bi-person-fill"></i>
                        </div>
                    @else
                        <div class="profile-picture-placeholder">
                            <i class="bi bi-person-fill"></i>
                        </div>
                    @endif
                </div>

                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="upload-picture-form">
                    @csrf
                    @method('PATCH')

                    <div class="file-input-wrapper">
                        <label for="profile_picture" class="btn-upload">
                            <i class="bi bi-cloud-upload"></i> Upload Picture
                        </label>
                        <input type="file" id="profile_picture" name="profile_picture" accept="image/*" onchange="updateFileName(this)">
                    </div>

                    @if(auth()->user()->profile_picture)
                        <button type="button" class="btn-remove" onclick="removeProfilePicture()">
                            <i class="bi bi-trash"></i> Remove
                        </button>
                    @endif

                    <div class="file-name-display" id="fileName"></div>

                    <div>
                        <button type="submit" class="btn-save" style="margin-top: 15px;">
                            <i class="bi bi-check-circle"></i> Save Picture
                        </button>
                    </div>

                    @error('profile_picture')
                        <small class="text-danger d-block mt-2">{{ $message }}</small>
                    @enderror
                </form>
            </div>

            <!-- Personal Information Section -->
            <div class="profile-section">
                <h3><i class="bi bi-info-circle"></i> Personal Information</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="profile-info-item">
                            <span class="profile-info-label">Full Name:</span>
                            <span class="profile-info-value">{{ auth()->user()->name }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-info-item">
                            <span class="profile-info-label">Email:</span>
                            <span class="profile-info-value">{{ auth()->user()->email }}</span>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="profile-info-item">
                            <span class="profile-info-label">Role:</span>
                            <span class="profile-info-value">
                                <span class="badge bg-primary">{{ ucfirst(auth()->user()->role ?? 'User') }}</span>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-info-item">
                            <span class="profile-info-label">Member Since:</span>
                            <span class="profile-info-value">{{ auth()->user()->created_at->format('M d, Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Profile Section -->
            <div class="profile-section">
                <h3><i class="bi bi-pencil-square"></i> Edit Profile Information</h3>
                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('PATCH')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="name">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', auth()->user()->name) }}" required>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="email">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" required>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn-save">
                        <i class="bi bi-check-circle"></i> Save Changes
                    </button>
                </form>
            </div>

            <!-- Change Password Section -->
            <div class="profile-section">
                <h3><i class="bi bi-lock"></i> Change Password</h3>
                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('PATCH')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="current_password">Current Password</label>
                                <input type="password" class="form-control" id="current_password" name="current_password">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="password">New Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="password_confirmation">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn-save">
                        <i class="bi bi-check-circle"></i> Update Password
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        function updateFileName(input) {
            const fileNameDisplay = document.getElementById('fileName');
            if (input.files && input.files[0]) {
                fileNameDisplay.textContent = 'Selected: ' + input.files[0].name;
            } else {
                fileNameDisplay.textContent = '';
            }
        }

        function removeProfilePicture() {
            if (confirm('Are you sure you want to remove your profile picture?')) {
                // Create a form to submit the remove request
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '{{ route("profile.update") }}';
                
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                const methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                methodInput.value = 'PATCH';
                form.appendChild(methodInput);
                
                const tokenInput = document.createElement('input');
                tokenInput.type = 'hidden';
                tokenInput.name = '_token';
                tokenInput.value = csrfToken;
                form.appendChild(tokenInput);
                
                const removeInput = document.createElement('input');
                removeInput.type = 'hidden';
                removeInput.name = 'remove_profile_picture';
                removeInput.value = '1';
                form.appendChild(removeInput);
                
                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>
</body>
</html>
