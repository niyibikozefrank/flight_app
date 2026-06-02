<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Staff - {{ config('app.name', 'Airport Management') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { margin: 0; }
    </style>

    <style>
        :root{--accent-start:#1e3c72;--accent-end:#2a5298}
        body{background:linear-gradient(135deg,#1e3c72 0%, #2a5298 100%);min-height:100vh}
        .container-main{max-width:760px;margin:40px auto;padding:0 1rem}
        .card-form{background:#fff;border-radius:12px;box-shadow:0 12px 40px rgba(16,24,40,0.06);overflow:hidden}
        .card-header-custom{background:linear-gradient(90deg,var(--accent-start),var(--accent-end));color:#fff;padding:20px 24px;border-radius:12px 12px 0 0;display:flex;align-items:center;gap:12px}
        .card-header-custom h2{margin:0;font-size:1.1rem}
        .card-body-custom{padding:22px}

        .form-group{margin-bottom:14px}
        label{display:block;font-weight:600;margin-bottom:8px;color:#fff}
        .form-control{width:100%;padding:0.6rem 0.9rem;border:1px solid #e6eef8;border-radius:10px;background:#fff;transition:box-shadow .15s,border-color .15s}
        .form-control:focus{outline:none;border-color:var(--accent-start);box-shadow:0 6px 20px rgba(37,99,235,0.08)}

        .form-actions{display:flex;gap:12px;margin-top:18px}
        .btn-save{flex:1;background:linear-gradient(90deg,var(--accent-start),var(--accent-end));color:#fff;border:none;padding:0.6rem 1rem;border-radius:10px;font-weight:700}
        .btn-save:hover{transform:translateY(-2px);box-shadow:0 10px 30px rgba(37,99,235,0.12)}
        .btn-cancel{flex:1;background:#f3f4f6;color:#111827;border:none;padding:0.6rem 1rem;border-radius:10px;font-weight:700}

        @media (min-width:768px){.form-grid{display:grid;grid-template-columns:1fr 1fr;gap:16px}}
    </style>
</head>
<body>
    @include('components.hospital-header')
    <x-side-navigation />
    <div class="container-main">
        <div class="card-form">
            <div class="card-header-custom">
                <i class="bi bi-pencil-square" style="font-size:1.35rem"></i>
                <h2>Edit Staff</h2>
            </div>

            <div class="card-body-custom">
                <form action="{{ route('staff.update', $staff->id) }}" method="POST">
                    @csrf

                    <div class="form-grid">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" type="text" name="name" value="{{ $staff->name }}" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="position">Position</label>
                            <select id="position" name="position" class="form-control" required>
                                <option value="">Select Position</option>
                                <option value="admin" {{ $staff->position == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="manager" {{ $staff->position == 'manager' ? 'selected' : '' }}>Manager</option>
                                <option value="pilot" {{ $staff->position == 'pilot' ? 'selected' : '' }}>Pilot</option>
                                <option value="checkin_agent" {{ $staff->position == 'checkin_agent' ? 'selected' : '' }}>Check-in Agent</option>
                                <option value="security_officer" {{ $staff->position == 'security_officer' ? 'selected' : '' }}>Security Officer</option>
                                <option value="ground_staff" {{ $staff->position == 'ground_staff' ? 'selected' : '' }}>Ground Staff</option>
                                <option value="engineer" {{ $staff->position == 'engineer' ? 'selected' : '' }}>Engineer</option>
                                <option value="passenger" {{ $staff->position == 'passenger' ? 'selected' : '' }}>Passenger</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input id="phone" type="text" name="phone" value="{{ $staff->phone }}" class="form-control">
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn-save"> <i class="bi bi-save"></i> Update Staff</button>
                        <a href="{{ route('staff.index') }}" class="btn-cancel"> <i class="bi bi-arrow-left-circle"></i> Back</a>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>