@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <!-- Back Button -->
    <a href="{{ route('pilots.index') }}" class="btn btn-outline-primary mb-4">
        <i class="bi bi-arrow-left"></i> Back to Pilot Chamber
    </a>

    <!-- Flight Details Card -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="flight-detail-card glass-effect">
                <div class="detail-header" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); color: white; padding: 30px; border-radius: 12px 12px 0 0;">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h2>
                                <i class="bi bi-airplane-fill"></i> Flight {{ $flight->flight_number ?? 'N/A' }}
                            </h2>
                            <p class="lead mb-0">Booking Reference: <strong>{{ $flight->booking_reference }}</strong></p>
                        </div>
                        <div class="col-md-4 text-md-end">
                            @php
                                $statusColors = [
                                    'scheduled' => 'primary',
                                    'boarding' => 'warning',
                                    'departed' => 'success',
                                    'delayed' => 'danger',
                                    'cancelled' => 'secondary'
                                ];
                                $statusColor = $statusColors[$flight->status] ?? 'secondary';
                            @endphp
                            <span class="badge bg-{{ $statusColor }} p-3" style="font-size: 1rem;">
                                {{ ucfirst($flight->status) }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="card-body p-4">
                    <div class="row g-4 mb-4">
                        <!-- Passenger Information -->
                        <div class="col-md-6">
                            <div class="info-section">
                                <h5 class="section-title">
                                    <i class="bi bi-person-fill"></i> Passenger Information
                                </h5>
                                <div class="info-item">
                                    <span class="info-label">Name:</span>
                                    <span class="info-value">{{ $flight->passenger->name ?? 'N/A' }}</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Email:</span>
                                    <span class="info-value">{{ $flight->passenger->email ?? 'N/A' }}</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Phone:</span>
                                    <span class="info-value">{{ $flight->passenger->phone ?? 'N/A' }}</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Passport:</span>
                                    <span class="info-value">{{ $flight->passenger->passport_number ?? 'N/A' }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Flight Information -->
                        <div class="col-md-6">
                            <div class="info-section">
                                <h5 class="section-title">
                                    <i class="bi bi-geo-alt-fill"></i> Flight Information
                                </h5>
                                <div class="info-item">
                                    <span class="info-label">Destination:</span>
                                    <span class="info-value">{{ $flight->destination ?? 'N/A' }}</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Departure:</span>
                                    <span class="info-value">{{ $flight->departure_time?->format('M d, Y H:i A') ?? 'N/A' }}</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Arrival:</span>
                                    <span class="info-value">{{ $flight->arrival_time?->format('M d, Y H:i A') ?? 'N/A' }}</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Duration:</span>
                                    <span class="info-value">{{ $flight->duration_minutes ?? 'N/A' }} minutes</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row g-4 mb-4">
                        <!-- Aircraft & Crew -->
                        <div class="col-md-6">
                            <div class="info-section">
                                <h5 class="section-title">
                                    <i class="bi bi-airplane-engines-fill"></i> Aircraft & Crew
                                </h5>
                                <div class="info-item">
                                    <span class="info-label">Aircraft Type:</span>
                                    <span class="info-value">
                                        <span class="badge bg-info">{{ $flight->aircraft_type ?? 'N/A' }}</span>
                                    </span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Capacity:</span>
                                    <span class="info-value">{{ $flight->capacity ?? 'N/A' }} passengers</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Captain:</span>
                                    <span class="info-value">{{ $flight->staff->name ?? 'N/A' }}</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Gate:</span>
                                    <span class="info-value">
                                        @if($flight->gate)
                                            Gate {{ $flight->gate->gate_number }}
                                        @else
                                            Not Assigned
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Pricing -->
                        <div class="col-md-6">
                            <div class="info-section">
                                <h5 class="section-title">
                                    <i class="bi bi-credit-card-fill"></i> Pricing
                                </h5>
                                <div class="info-item">
                                    <span class="info-label">Ticket Price:</span>
                                    <span class="info-value" style="font-size: 1.3rem; font-weight: bold; color: #2a5298;">
                                        ${{ number_format($flight->price ?? 0, 2) }}
                                    </span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Status:</span>
                                    <span class="info-value">
                                        @if($flight->status === 'departed')
                                            <span class="badge bg-success">Completed</span>
                                        @elseif($flight->status === 'scheduled')
                                            <span class="badge bg-primary">Upcoming</span>
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Status Update -->
                    @if($flight->status !== 'departed' && $flight->status !== 'cancelled')
                        <div class="mt-4">
                            <h5 class="section-title">
                                <i class="bi bi-arrow-repeat"></i> Update Flight Status
                            </h5>
                            <form action="{{ route('pilots.updateStatus', $flight->id) }}" method="POST" class="d-flex gap-2 align-items-end">
                                @csrf
                                <div class="flex-grow-1">
                                    <select name="status" class="form-select" required>
                                        <option value="scheduled" {{ $flight->status === 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                                        <option value="boarding" {{ $flight->status === 'boarding' ? 'selected' : '' }}>Boarding</option>
                                        <option value="departed" {{ $flight->status === 'departed' ? 'selected' : '' }}>Departed</option>
                                        <option value="delayed">Delayed</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-circle"></i> Update Status
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Pre-flight Checklist Link -->
    <div class="row">
        <div class="col-12">
            <a href="{{ route('pilots.preflight', $flight->id) }}" class="btn btn-success btn-lg w-100">
                <i class="bi bi-checklist"></i> View Pre-flight Checklist
            </a>
        </div>
    </div>
</div>

<style>
    :root {
        --primary: #2563eb;
        --primary-dark: #1e40af;
        --success: #10b981;
        --warning: #f59e0b;
        --danger: #ef4444;
        --info: #0ea5e9;
        --dark: #1e293b;
        --light: #f8fafc;
        --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --success-gradient: linear-gradient(135deg, #10b981 0%, #059669 100%);
        --dark-gradient: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
    }

    .glass-effect {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 16px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.12);
        animation: slideInUp 0.8s ease-out;
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .glass-effect:hover {
        background: rgba(255, 255, 255, 0.8);
        box-shadow: 0 25px 70px rgba(0, 0, 0, 0.15);
        transform: translateY(-4px);
    }

    .flight-detail-card {
        overflow: hidden;
        border: none;
    }

    .detail-header {
        background: var(--dark-gradient) !important;
        position: relative;
        overflow: hidden;
    }

    .detail-header::before {
        content: '';
        position: absolute;
        top: 0;
        right: -50%;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
        pointer-events: none;
    }

    .detail-header h2 {
        font-weight: 800;
        font-size: 2rem;
        margin-bottom: 8px;
        letter-spacing: -0.5px;
    }

    .detail-header .lead {
        font-size: 1.05rem;
        opacity: 0.95;
    }

    .info-section {
        padding: 24px;
        background: linear-gradient(135deg, rgba(37, 99, 235, 0.05) 0%, rgba(16, 185, 129, 0.05) 100%);
        border-radius: 12px;
        border: 1px solid rgba(37, 99, 235, 0.1);
        transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        position: relative;
        overflow: hidden;
    }

    .info-section::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 4px;
        background: var(--primary-gradient);
        transform: scaleY(0);
        transform-origin: top;
        transition: transform 0.3s ease;
    }

    .info-section:hover {
        background: linear-gradient(135deg, rgba(37, 99, 235, 0.08) 0%, rgba(16, 185, 129, 0.08) 100%);
        border-color: rgba(37, 99, 235, 0.2);
        transform: translateX(4px);
    }

    .info-section:hover::before {
        transform: scaleY(1);
    }

    .section-title {
        color: var(--dark);
        font-weight: 800;
        margin-bottom: 18px;
        font-size: 1.15rem;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .section-title i {
        color: var(--primary);
        font-size: 1.3rem;
    }

    .info-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 14px 0;
        border-bottom: 1px solid rgba(0, 0, 0, 0.06);
        transition: all 0.2s ease;
    }

    .info-item:hover {
        background: rgba(37, 99, 235, 0.03);
        padding-left: 8px;
        padding-right: 8px;
        border-radius: 4px;
    }

    .info-item:last-child {
        border-bottom: none;
    }

    .info-label {
        font-weight: 700;
        color: var(--dark);
        min-width: 150px;
        font-size: 0.95rem;
    }

    .info-value {
        color: #475569;
        font-weight: 500;
        text-align: right;
    }

    .badge {
        padding: 8px 16px !important;
        font-weight: 600;
        border-radius: 8px;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
        text-transform: uppercase;
    }

    .btn-primary {
        background: var(--primary-gradient);
        border: none;
        padding: 12px 28px;
        font-weight: 700;
        border-radius: 10px;
        transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        position: relative;
        overflow: hidden;
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 24px rgba(37, 99, 235, 0.3);
        background: var(--primary-gradient);
    }

    .btn-primary:active {
        transform: translateY(-1px);
    }

    .btn-success {
        background: var(--success-gradient);
        border: none;
        padding: 16px 32px;
        font-weight: 700;
        border-radius: 12px;
        font-size: 1.1rem;
        transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .btn-success:hover {
        transform: translateY(-4px);
        box-shadow: 0 16px 32px rgba(16, 185, 129, 0.35);
        background: var(--success-gradient);
    }

    .form-select {
        border: 1px solid rgba(37, 99, 235, 0.2);
        border-radius: 8px;
        padding: 12px 16px;
        transition: all 0.2s ease;
        font-weight: 500;
    }

    .form-select:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }

    .form-select option {
        background: white;
        color: var(--dark);
    }

    .mt-4 {
        position: relative;
        padding: 24px;
        background: linear-gradient(135deg, rgba(37, 99, 235, 0.04) 0%, transparent 100%);
        border-radius: 12px;
        border: 1px solid rgba(37, 99, 235, 0.1);
        animation: slideInUp 0.6s ease-out 0.2s both;
    }

    .btn-outline-primary {
        border: 2px solid var(--primary);
        color: var(--primary);
        font-weight: 600;
        border-radius: 8px;
        transition: all 0.2s ease;
    }

    .btn-outline-primary:hover {
        background: var(--primary);
        transform: translateX(-3px);
    }

    .loading-spinner {
        display: inline-block;
        width: 18px;
        height: 18px;
        border: 3px solid rgba(37, 99, 235, 0.2);
        border-top-color: var(--primary);
        border-radius: 50%;
        animation: spin 0.8s linear infinite;
        margin-right: 8px;
    }

    .success-check {
        display: inline-block;
        width: 24px;
        height: 24px;
        background: var(--success);
        border-radius: 50%;
        animation: popScale 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        margin-right: 8px;
    }

    .success-check::after {
        content: '✓';
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        font-weight: 800;
    }

    .toast-notification {
        position: fixed;
        bottom: 30px;
        right: 30px;
        background: white;
        padding: 16px 24px;
        border-radius: 12px;
        box-shadow: 0 12px 36px rgba(0, 0, 0, 0.15);
        display: flex;
        align-items: center;
        gap: 12px;
        z-index: 9999;
        animation: slideInRight 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .toast-notification.success {
        border-left: 4px solid var(--success);
    }

    .toast-notification.error {
        border-left: 4px solid var(--danger);
    }

    /* Animations */
    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes spin {
        to { transform: rotate(360deg); }
    }

    @keyframes popScale {
        from {
            transform: scale(0);
        }
        to {
            transform: scale(1);
        }
    }

    @keyframes fadeOut {
        from {
            opacity: 1;
            transform: translateY(0);
        }
        to {
            opacity: 0;
            transform: translateY(-10px);
        }
    }


    .info-value {
        color: #1e3c72;
        font-weight: 500;
    }

    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
<script>
    class FlightDetailManager {
        constructor() {
            this.form = document.querySelector('form[action*="updateStatus"]');
            this.statusSelect = document.querySelector('select[name="status"]');
            this.submitBtn = document.querySelector('button[type="submit"]');
            this.originalBtnText = this.submitBtn ? this.submitBtn.innerHTML : '';
            
            if (this.form) {
                this.init();
            }
        }

        init() {
            this.form.addEventListener('submit', (e) => this.handleFormSubmit(e));
            this.setupInfoSectionAnimations();
            this.setupStatusBadgeAnimation();
        }

        handleFormSubmit(e) {
            e.preventDefault();

            // Show loading state
            this.setButtonLoading(true);

            // Simulate form submission
            const formData = new FormData(this.form);
            const newStatus = formData.get('status');

            setTimeout(() => {
                // Show success notification
                this.showNotification(`Flight status updated to <strong>${this.capitalizeStatus(newStatus)}</strong>`, 'success');
                this.setButtonLoading(false);
                
                // Actually submit the form after showing notification
                setTimeout(() => {
                    this.form.submit();
                }, 800);
            }, 600);
        }

        setButtonLoading(isLoading) {
            if (isLoading) {
                this.submitBtn.disabled = true;
                this.submitBtn.innerHTML = '<span class="loading-spinner"></span>Updating...';
                this.submitBtn.style.opacity = '0.7';
            } else {
                this.submitBtn.disabled = false;
                this.submitBtn.innerHTML = this.originalBtnText;
                this.submitBtn.style.opacity = '1';
            }
        }

        showNotification(message, type = 'success') {
            const notification = document.createElement('div');
            notification.className = `toast-notification ${type}`;
            
            const icon = type === 'success' 
                ? '<span class="success-check"></span>' 
                : '<i class="bi bi-exclamation-circle" style="color: var(--danger); font-size: 1.2rem;"></i>';
            
            notification.innerHTML = `
                ${icon}
                <span>${message}</span>
            `;

            document.body.appendChild(notification);

            // Auto-remove after 4 seconds
            setTimeout(() => {
                notification.style.animation = 'fadeOut 0.3s cubic-bezier(0.34, 1.56, 0.64, 1) forwards';
                setTimeout(() => notification.remove(), 300);
            }, 4000);
        }

        capitalizeStatus(status) {
            return status.charAt(0).toUpperCase() + status.slice(1);
        }

        setupInfoSectionAnimations() {
            const sections = document.querySelectorAll('.info-section');
            sections.forEach((section, index) => {
                section.style.animationDelay = `${index * 0.08}s`;
                section.style.animation = 'slideInUp 0.6s ease-out both';
            });
        }

        setupStatusBadgeAnimation() {
            const badge = document.querySelector('.badge');
            if (badge) {
                badge.style.animation = 'popScale 0.5s cubic-bezier(0.34, 1.56, 0.64, 1)';
            }
        }
    }

    // Initialize when DOM is ready
    document.addEventListener('DOMContentLoaded', () => {
        new FlightDetailManager();
    });
</script>
@endsection
