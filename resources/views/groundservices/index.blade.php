<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Ground Services - {{ config('app.name', 'Airport Management') }}</title>

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
            .table-container {
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
                <h2><i class="bi bi-tools"></i> Ground Services</h2>
                <a href="{{ route('groundservices.create') }}" class="btn btn-light">
                    <i class="bi bi-plus-lg"></i> Add Ground Service
                </a>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin: 20px 20px 0 20px;">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="table-container">
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($groundServices as $groundService)
                                <tr>
                                    <td><strong>{{ $groundService->name }}</strong></td>
                                    <td><span class="badge bg-info">{{ $groundService->category ?? 'N/A' }}</span></td>
                                    <td>{{ \Illuminate\Support\Str::limit($groundService->description, 50) }}</td>
                                    <td>
                                        <a href="{{ route('groundservices.edit', $groundService->id) }}" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <a href="{{ route('groundservices.delete', $groundService->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                            <i class="bi bi-trash"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4">No ground services found</td>
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
