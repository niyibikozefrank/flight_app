@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <!-- Header with Actions -->
    <div class="header-section mb-4">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="header-content">
                    <h1 class="display-4">
                        <i class="bi bi-airplane-engines-fill" style="color: #4fb3d9;"></i> Pilot Chamber
                    </h1>
                    <p class="lead text-muted">Flight Operations & Crew Management Hub</p>
                </div>
            </div>
            <div class="col-md-4 text-end">
                <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#scheduleFlightModal">
                    <i class="bi bi-plus-circle"></i> Schedule Flight
                </button>
                <button class="btn btn-outline-primary">
                    <i class="bi bi-download"></i> Export Report
                </button>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row mb-4 g-2">
        <div class="col-12">
            <div class="quick-actions-bar">
                <button class="quick-action-btn" title="Pre-flight Checks">
                    <i class="bi bi-checklist"></i> Pre-flight
                </button>
                <button class="quick-action-btn" title="Duty Assignment">
                    <i class="bi bi-person-check"></i> Assign Duty
                </button>
                <button class="quick-action-btn" title="Flight Schedule">
                    <i class="bi bi-calendar-event"></i> Schedule
                </button>
                <button class="quick-action-btn" title="Incident Report">
                    <i class="bi bi-exclamation-circle"></i> Report Issue
                </button>
                <button class="quick-action-btn" title="Crew Briefing">
                    <i class="bi bi-megaphone"></i> Briefing
                </button>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row mb-4 g-3">
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-icon" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <i class="bi bi-box-arrow-up-right"></i>
                </div>
                <div class="stat-content">
                    <h5>Departures</h5>
                    <h2 class="counter">{{ $departuresCount ?? 0 }}</h2>
                    <small class="text-success">+12% this month</small>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-icon" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                    <i class="bi bi-box-arrow-down-left"></i>
                </div>
                <div class="stat-content">
                    <h5>Arrivals</h5>
                    <h2 class="counter">{{ $arrivalsCount ?? 0 }}</h2>
                    <small class="text-success">+8% this month</small>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-icon" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                    <i class="bi bi-people-fill"></i>
                </div>
                <div class="stat-content">
                    <h5>Active Pilots</h5>
                    <h2 class="counter">{{ count($pilots) }}</h2>
                    <small class="text-info">{{ count($pilots) }} on duty</small>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-icon" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                    <i class="bi bi-check-circle-fill"></i>
                </div>
                <div class="stat-content">
                    <h5>On Time Rate</h5>
                    <h2 class="counter">96.5<span class="small">%</span></h2>
                    <small class="text-success">Excellent</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Flight Operations & Analytics -->
    <div class="row mb-4 g-3">
        <!-- Flight Timeline -->
        <div class="col-md-6">
            <div class="card glass-effect h-100">
                <div class="card-header bg-gradient border-bottom">
                    <h5 class="mb-0">
                        <i class="bi bi-clock-history"></i> Flight Schedule Timeline
                    </h5>
                </div>
                <div class="card-body">
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-marker departed"></div>
                            <div class="timeline-content">
                                <h6>Flight DL450</h6>
                                <p class="text-muted">Departed to Miami • 08:30</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker boarding"></div>
                            <div class="timeline-content">
                                <h6>Flight UA320</h6>
                                <p class="text-muted">Boarding in progress • Gate B5</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker scheduled"></div>
                            <div class="timeline-content">
                                <h6>Flight AA210</h6>
                                <p class="text-muted">Scheduled departure • 14:00</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker scheduled"></div>
                            <div class="timeline-content">
                                <h6>Flight SW890</h6>
                                <p class="text-muted">Scheduled departure • 16:30</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pilot Duty Status -->
        <div class="col-md-6">
            <div class="card glass-effect h-100">
                <div class="card-header bg-gradient border-bottom">
                    <h5 class="mb-0">
                        <i class="bi bi-hourglass-split"></i> Duty Hours Overview
                    </h5>
                </div>
                <div class="card-body">
                    <div class="duty-status-list">
                        <div class="duty-item">
                            <div class="duty-info">
                                <h6>Captain John Smith</h6>
                                <small class="text-muted">Flight DL450</small>
                            </div>
                            <div class="duty-hours">
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar" style="width: 65%"></div>
                                </div>
                                <small>6.5 / 10 hrs</small>
                            </div>
                        </div>
                        <div class="duty-item">
                            <div class="duty-info">
                                <h6>First Officer Mary Johnson</h6>
                                <small class="text-muted">Flight UA320</small>
                            </div>
                            <div class="duty-hours">
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-success" style="width: 45%"></div>
                                </div>
                                <small>4.5 / 10 hrs</small>
                            </div>
                        </div>
                        <div class="duty-item">
                            <div class="duty-info">
                                <h6>Captain David Lee</h6>
                                <small class="text-muted">Rest / Off Duty</small>
                            </div>
                            <div class="duty-hours">
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-warning" style="width: 0%"></div>
                                </div>
                                <small>0 / 10 hrs</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Flights Table -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card glass-effect">
                <div class="card-header bg-gradient border-bottom">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h4 class="mb-0">
                                <i class="bi bi-airplane-fill"></i> Flight Operations
                            </h4>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-text">
                                    <i class="bi bi-search"></i>
                                </span>
                                <input type="text" id="flightSearch" class="form-control" placeholder="Search flights...">
                                <select id="statusFilter" class="form-select">
                                    <option value="">All Status</option>
                                    <option value="scheduled">Scheduled</option>
                                    <option value="boarding">Boarding</option>
                                    <option value="departed">Departed</option>
                                    <option value="delayed">Delayed</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    @if($flights->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0 flight-table">
                                <thead class="table-light sticky-top">
                                    <tr>
                                        <th><i class="bi bi-ticket"></i> Flight #</th>
                                        <th><i class="bi bi-person"></i> Captain</th>
                                        <th><i class="bi bi-geo-alt"></i> Route</th>
                                        <th><i class="bi bi-clock"></i> Departure</th>
                                        <th><i class="bi bi-airplane-landing"></i> Aircraft</th>
                                        <th><i class="bi bi-exclamation-triangle"></i> Status</th>
                                        <th width="200">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($flights as $flight)
                                        <tr class="flight-row" data-flight-id="{{ $flight->id }}" data-status="{{ $flight->status }}">
                                            <td>
                                                <strong class="flight-number">{{ $flight->flight_number ?? 'N/A' }}</strong>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <i class="bi bi-person-circle" style="color: #4fb3d9;"></i>
                                                    {{ $flight->passenger->name ?? 'N/A' }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="route-badge">
                                                    {{ $flight->destination ?? 'N/A' }}
                                                    @if($flight->gate)
                                                        <br><small class="text-muted">Gate {{ $flight->gate->gate_number }}</small>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <span class="departure-time">{{ $flight->departure_time?->format('M d, Y H:i') ?? 'N/A' }}</span>
                                            </td>
                                            <td>
                                                <span class="badge bg-info aircraft-type">{{ $flight->aircraft_type ?? 'N/A' }}</span>
                                            </td>
                                            <td>
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
                                                <span class="badge bg-{{ $statusColor }} flight-status">
                                                    <i class="bi bi-circle-fill" style="font-size: 0.5rem;"></i> {{ ucfirst($flight->status) }}
                                                </span>
                                            </td>
                                            <td>
                                                <div class="btn-group btn-group-sm" role="group">
                                                    <a href="{{ route('pilots.show', $flight->id) }}" class="btn btn-outline-primary" title="View Details">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                    <a href="{{ route('pilots.preflight', $flight->id) }}" class="btn btn-outline-success" title="Pre-flight Check">
                                                        <i class="bi bi-checklist"></i>
                                                    </a>
                                                    <button class="btn btn-outline-info" title="View Crew">
                                                        <i class="bi bi-people"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info text-center m-0" role="alert">
                            <i class="bi bi-info-circle"></i> No flights available for operations.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Crew Members & Incident Reports -->
    <div class="row g-4 mb-4">
        <!-- Active Pilots -->
        <div class="col-lg-8">
            <div class="card glass-effect h-100">
                <div class="card-header bg-gradient border-bottom">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h4 class="mb-0">
                                <i class="bi bi-people-fill"></i> Crew Members
                            </h4>
                        </div>
                        <div class="col-md-6 text-end">
                            <button class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-plus"></i> Add Crew
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if($pilots->count() > 0)
                        <div class="row g-3">
                            @foreach($pilots as $pilot)
                                <div class="col-md-6 col-lg-4">
                                    <div class="pilot-card">
                                        <div class="pilot-header">
                                            <div class="pilot-avatar">
                                                <i class="bi bi-person-circle"></i>
                                            </div>
                                            <span class="pilot-status-badge">
                                                <span class="badge bg-success">Active</span>
                                            </span>
                                        </div>
                                        <div class="pilot-body">
                                            <h5 class="pilot-name">{{ $pilot->name }}</h5>
                                            <p class="pilot-position text-muted">
                                                <i class="bi bi-badge"></i> {{ $pilot->position ?? 'Flight Crew' }}
                                            </p>
                                            <p class="pilot-email text-muted small">
                                                <i class="bi bi-envelope"></i> {{ $pilot->email ?? 'N/A' }}
                                            </p>
                                            <div class="pilot-stats">
                                                <div class="stat">
                                                    <small class="text-muted">Flights</small>
                                                    <strong>24</strong>
                                                </div>
                                                <div class="stat">
                                                    <small class="text-muted">Hours</small>
                                                    <strong>1,240</strong>
                                                </div>
                                                <div class="stat">
                                                    <small class="text-muted">Rating</small>
                                                    <strong>4.9★</strong>
                                                </div>
                                            </div>
                                            <div class="pilot-actions mt-3">
                                                <button class="btn btn-xs btn-info">View Profile</button>
                                                <button class="btn btn-xs btn-primary">Assign</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="alert alert-warning text-center mb-0" role="alert">
                            <i class="bi bi-exclamation-triangle"></i> No pilots registered in the system.
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Incident Reports & Alerts -->
        <div class="col-lg-4">
            <div class="card glass-effect h-100">
                <div class="card-header bg-gradient border-bottom">
                    <h4 class="mb-0">
                        <i class="bi bi-exclamation-octagon"></i> Recent Alerts
                    </h4>
                </div>
                <div class="card-body">
                    <div class="alerts-list">
                        <div class="alert-item alert-warning">
                            <div class="alert-icon">
                                <i class="bi bi-exclamation-circle"></i>
                            </div>
                            <div class="alert-content">
                                <h6>Flight Delay</h6>
                                <p>DL450 delayed by 30 mins</p>
                                <small>5 mins ago</small>
                            </div>
                        </div>

                        <div class="alert-item alert-info">
                            <div class="alert-icon">
                                <i class="bi bi-info-circle"></i>
                            </div>
                            <div class="alert-content">
                                <h6>Crew Briefing</h6>
                                <p>Mandatory briefing scheduled</p>
                                <small>2 hours ago</small>
                            </div>
                        </div>

                        <div class="alert-item alert-success">
                            <div class="alert-icon">
                                <i class="bi bi-check-circle"></i>
                            </div>
                            <div class="alert-content">
                                <h6>Flight Completed</h6>
                                <p>AA210 landed safely in NYC</p>
                                <small>1 hour ago</small>
                            </div>
                        </div>

                        <div class="alert-item alert-danger">
                            <div class="alert-icon">
                                <i class="bi bi-exclamation-triangle"></i>
                            </div>
                            <div class="alert-content">
                                <h6>Maintenance Issue</h6>
                                <p>Aircraft N456KL grounded</p>
                                <small>3 hours ago</small>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-sm btn-primary w-100 mt-3" data-bs-toggle="modal" data-bs-target="#incidentModal">
                        <i class="bi bi-plus-circle"></i> Report Incident
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* ===== GLOBAL VARIABLES & SETTINGS ===== */
    :root {
        --primary: #2563eb;
        --primary-dark: #1e40af;
        --primary-light: #3b82f6;
        --secondary: #0891b2;
        --success: #10b981;
        --warning: #f59e0b;
        --danger: #ef4444;
        --info: #06b6d4;
        --light: #f8fafc;
        --dark: #1e293b;
        --gray: #64748b;
        
        --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --success-gradient: linear-gradient(135deg, #10b981 0%, #34d399 100%);
        --warning-gradient: linear-gradient(135deg, #f59e0b 0%, #fbbf24 100%);
        --info-gradient: linear-gradient(135deg, #06b6d4 0%, #22d3ee 100%);
        --dark-gradient: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
    }

    /* ===== BODY & GENERAL STYLES ===== */
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        min-height: 100vh;
    }

    /* ===== HEADER SECTION ===== */
    .header-section {
        background: linear-gradient(135deg, rgba(37, 99, 235, 0.1) 0%, rgba(7, 89, 133, 0.1) 100%);
        padding: 35px 30px;
        border-radius: 16px;
        border-left: 5px solid var(--primary);
        border-top-right-radius: 16px;
        animation: slideInUp 0.6s ease-out;
        box-shadow: 0 4px 20px rgba(37, 99, 235, 0.08);
        position: relative;
        overflow: hidden;
    }

    .header-section::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(37, 99, 235, 0.1) 0%, transparent 70%);
        border-radius: 50%;
    }

    .header-section h1 {
        color: var(--dark);
        font-weight: 800;
        letter-spacing: -0.5px;
    }

    .header-section .lead {
        color: var(--gray);
        font-size: 1.1rem;
    }

    /* ===== QUICK ACTIONS BAR ===== */
    .quick-actions-bar {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        padding: 16px;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.98) 0%, rgba(248, 250, 252, 0.98) 100%);
        border-radius: 14px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.06);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .quick-action-btn {
        padding: 11px 18px;
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        background: white;
        cursor: pointer;
        transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
        font-size: 0.9rem;
        font-weight: 600;
        color: var(--gray);
        display: flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        position: relative;
        overflow: hidden;
    }

    .quick-action-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: left 0.5s;
    }

    .quick-action-btn:hover::before {
        left: 100%;
    }

    .quick-action-btn:hover {
        border-color: var(--primary);
        background: linear-gradient(135deg, rgba(37, 99, 235, 0.05) 0%, rgba(37, 99, 235, 0.02) 100%);
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(37, 99, 235, 0.25);
        color: var(--primary);
    }

    .quick-action-btn:active {
        transform: translateY(-1px);
    }

    /* ===== STATISTICS CARDS ===== */
    .stat-card {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.98) 0%, rgba(248, 250, 252, 0.98) 100%);
        backdrop-filter: blur(20px);
        border-radius: 16px;
        padding: 24px;
        display: flex;
        gap: 18px;
        align-items: flex-start;
        border: 1px solid rgba(255, 255, 255, 0.4);
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        animation: fadeInUp 0.8s ease-out;
        position: relative;
        overflow: hidden;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, transparent, rgba(37, 99, 235, 0.5), transparent);
    }

    .stat-card:hover {
        transform: translateY(-12px) scale(1.02);
        box-shadow: 0 20px 60px rgba(37, 99, 235, 0.15);
        border-color: rgba(37, 99, 235, 0.3);
    }

    .stat-icon {
        width: 70px;
        height: 70px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.8rem;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
        flex-shrink: 0;
        position: relative;
    }

    .stat-content h5 {
        font-size: 0.85rem;
        color: var(--gray);
        margin-bottom: 8px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .stat-content h2 {
        margin: 0;
        font-size: 2.2rem;
        color: var(--dark);
        font-weight: 800;
        letter-spacing: -1px;
    }

    .stat-content small {
        display: block;
        font-size: 0.8rem;
        margin-top: 6px;
        font-weight: 600;
    }

    /* ===== GLASS EFFECT CARDS ===== */
    .glass-effect {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.98) 0%, rgba(248, 250, 252, 0.98) 100%);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.4);
        border-radius: 16px;
        box-shadow: 0 12px 48px rgba(0, 0, 0, 0.08);
        animation: slideInUp 0.8s ease-out;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .glass-effect:hover {
        box-shadow: 0 16px 56px rgba(0, 0, 0, 0.12);
    }

    .bg-gradient {
        background: var(--dark-gradient) !important;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .bg-gradient::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
        animation: moveBackground 15s ease infinite;
    }

    .card-header {
        position: relative;
        z-index: 1;
    }

    /* ===== TIMELINE STYLES ===== */
    .timeline {
        position: relative;
        padding: 20px 0;
    }

    .timeline-item {
        display: flex;
        gap: 20px;
        margin-bottom: 28px;
        position: relative;
        animation: fadeInUp 0.6s ease-out backwards;
    }

    .timeline-item:nth-child(1) { animation-delay: 0.1s; }
    .timeline-item:nth-child(2) { animation-delay: 0.2s; }
    .timeline-item:nth-child(3) { animation-delay: 0.3s; }
    .timeline-item:nth-child(4) { animation-delay: 0.4s; }

    .timeline-marker {
        width: 16px;
        height: 16px;
        border-radius: 50%;
        margin-top: 6px;
        flex-shrink: 0;
        box-shadow: 0 0 0 4px rgba(248, 250, 252, 1);
        border: 2px solid currentColor;
        transition: all 0.3s ease;
    }

    .timeline-marker.departed {
        background: #10b981;
        color: #10b981;
    }

    .timeline-marker.boarding {
        background: #f59e0b;
        color: #f59e0b;
        animation: pulse-warning 2s infinite;
    }

    .timeline-marker.scheduled {
        background: #0891b2;
        color: #0891b2;
    }

    .timeline-item::before {
        content: '';
        position: absolute;
        left: 7px;
        top: 28px;
        bottom: -28px;
        width: 2px;
        background: linear-gradient(to bottom, rgba(37, 99, 235, 0.4), transparent);
    }

    .timeline-item:last-child::before {
        display: none;
    }

    .timeline-item:hover .timeline-marker {
        transform: scale(1.3);
        box-shadow: 0 0 0 6px rgba(37, 99, 235, 0.2);
    }

    .timeline-content h6 {
        margin: 0 0 6px 0;
        color: var(--dark);
        font-weight: 700;
        font-size: 1rem;
    }

    .timeline-content p {
        margin: 0;
        font-size: 0.9rem;
        color: var(--gray);
    }

    /* ===== DUTY STATUS ===== */
    .duty-status-list {
        display: flex;
        flex-direction: column;
        gap: 14px;
    }

    .duty-item {
        padding: 16px;
        background: linear-gradient(135deg, rgba(37, 99, 235, 0.03) 0%, rgba(248, 250, 252, 0.05) 100%);
        border-radius: 12px;
        border-left: 4px solid var(--primary);
        transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        border: 1px solid rgba(37, 99, 235, 0.1);
        position: relative;
        overflow: hidden;
    }

    .duty-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.5), transparent);
        transform: translateX(-100%);
        transition: transform 0.6s ease;
    }

    .duty-item:hover {
        background: linear-gradient(135deg, rgba(37, 99, 235, 0.08) 0%, rgba(37, 99, 235, 0.03) 100%);
        border-left-color: var(--primary-dark);
        transform: translateX(4px);
        box-shadow: 0 6px 20px rgba(37, 99, 235, 0.12);
    }

    .duty-item:hover::before {
        transform: translateX(100%);
    }

    .duty-info h6 {
        margin: 0 0 4px 0;
        color: var(--dark);
        font-weight: 700;
        font-size: 0.95rem;
    }

    .duty-info small {
        color: var(--gray);
        font-weight: 500;
    }

    .duty-hours {
        margin-top: 10px;
    }

    .duty-hours .progress {
        height: 6px;
        background: rgba(0, 0, 0, 0.05);
        border-radius: 3px;
    }

    .duty-hours .progress-bar {
        background: var(--primary-gradient);
        border-radius: 3px;
    }

    .duty-hours small {
        display: block;
        text-align: right;
        font-size: 0.75rem;
        color: var(--gray);
        margin-top: 6px;
        font-weight: 600;
    }

    /* ===== FLIGHT TABLE ENHANCEMENTS ===== */
    .flight-table {
        border-collapse: separate;
        border-spacing: 0;
    }

    .flight-table thead {
        background: linear-gradient(135deg, rgba(37, 99, 235, 0.05) 0%, rgba(37, 99, 235, 0.02) 100%);
        border-bottom: 2px solid rgba(37, 99, 235, 0.15);
    }

    .flight-table thead th {
        color: var(--dark);
        font-weight: 700;
        font-size: 0.9rem;
        padding: 16px 12px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border-color: transparent;
    }

    .flight-table tbody tr {
        transition: all 0.3s ease;
        border-bottom: 1px solid rgba(0, 0, 0, 0.04);
    }

    .flight-row {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .flight-row:hover {
        background: linear-gradient(90deg, rgba(37, 99, 235, 0.04) 0%, rgba(37, 99, 235, 0.02) 100%);
        box-shadow: inset 4px 0 0 0 var(--primary);
    }

    .flight-table tbody td {
        padding: 14px 12px;
        color: var(--gray);
        font-weight: 500;
    }

    .route-badge {
        display: flex;
        align-items: center;
        gap: 4px;
        font-weight: 600;
        color: var(--dark);
    }

    .flight-number {
        color: var(--primary);
        font-size: 0.95rem;
        font-weight: 800;
    }

    .departure-time {
        color: var(--dark);
        font-size: 0.9rem;
        font-weight: 600;
    }

    .aircraft-type {
        font-weight: 700;
        padding: 6px 12px;
        border-radius: 8px;
        background: linear-gradient(135deg, rgba(37, 99, 235, 0.15) 0%, rgba(37, 99, 235, 0.05) 100%);
    }

    .flight-status {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-weight: 700;
        padding: 6px 12px;
        border-radius: 8px;
    }

    /* ===== PILOT CARDS ===== */
    .pilot-card {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.98) 0%, rgba(248, 250, 252, 0.98) 100%);
        backdrop-filter: blur(20px);
        border-radius: 16px;
        padding: 24px;
        text-align: center;
        border: 1px solid rgba(255, 255, 255, 0.4);
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        animation: fadeInUp 0.8s ease-out;
        height: 100%;
        display: flex;
        flex-direction: column;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.06);
        position: relative;
        overflow: hidden;
    }

    .pilot-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: var(--primary-gradient);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.4s ease;
    }

    .pilot-card:hover::before {
        transform: scaleX(1);
    }

    .pilot-card:hover {
        transform: translateY(-16px) scale(1.03);
        box-shadow: 0 24px 64px rgba(37, 99, 235, 0.2);
        border-color: rgba(37, 99, 235, 0.3);
    }

    .pilot-header {
        position: relative;
        margin-bottom: 18px;
    }

    .pilot-avatar {
        font-size: 3.5rem;
        color: var(--primary);
        display: inline-block;
        background: linear-gradient(135deg, rgba(37, 99, 235, 0.1) 0%, rgba(37, 99, 235, 0.05) 100%);
        width: 80px;
        height: 80px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 8px 24px rgba(37, 99, 235, 0.15);
    }

    .pilot-status-badge {
        position: absolute;
        bottom: 0;
        right: 0;
    }

    .pilot-body {
        flex-grow: 1;
    }

    .pilot-name {
        color: var(--dark);
        font-weight: 800;
        margin: 12px 0 8px 0;
        font-size: 1.15rem;
        letter-spacing: -0.3px;
    }

    .pilot-position {
        font-weight: 700;
        margin-bottom: 6px;
        color: var(--primary);
        font-size: 0.9rem;
    }

    .pilot-email {
        margin-bottom: 14px;
        color: var(--gray);
        font-size: 0.85rem;
    }

    .pilot-stats {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 10px;
        margin: 14px 0;
        padding: 14px;
        background: linear-gradient(135deg, rgba(37, 99, 235, 0.05) 0%, rgba(37, 99, 235, 0.02) 100%);
        border-radius: 10px;
        border: 1px solid rgba(37, 99, 235, 0.1);
    }

    .pilot-stats .stat {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 8px;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .pilot-stats .stat:hover {
        background: rgba(37, 99, 235, 0.1);
    }

    .pilot-stats small {
        color: var(--gray);
        font-size: 0.7rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.3px;
    }

    .pilot-stats strong {
        color: var(--primary);
        font-size: 1.1rem;
        margin-top: 4px;
        font-weight: 800;
    }

    .pilot-actions {
        display: flex;
        gap: 8px;
        justify-content: center;
        margin-top: 16px;
    }

    .btn-xs {
        padding: 6px 12px;
        font-size: 0.75rem;
        font-weight: 600;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .btn-xs:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2);
    }

    /* ===== ALERT ITEMS ===== */
    .alerts-list {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .alert-item {
        display: flex;
        gap: 14px;
        padding: 14px;
        border-radius: 12px;
        border-left: 4px solid;
        transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        background: rgba(255, 255, 255, 0.6);
        border: 1px solid rgba(255, 255, 255, 0.2);
        position: relative;
        overflow: hidden;
    }

    .alert-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.6), transparent);
        transform: translateX(-100%);
        transition: transform 0.6s ease;
    }

    .alert-item:hover {
        transform: translateX(6px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
    }

    .alert-item:hover::before {
        transform: translateX(100%);
    }

    .alert-item.alert-warning {
        border-color: #f59e0b;
        background: linear-gradient(135deg, rgba(245, 158, 11, 0.08) 0%, rgba(245, 158, 11, 0.02) 100%);
        border: 1px solid rgba(245, 158, 11, 0.2);
    }

    .alert-item.alert-info {
        border-color: #0891b2;
        background: linear-gradient(135deg, rgba(8, 145, 178, 0.08) 0%, rgba(8, 145, 178, 0.02) 100%);
        border: 1px solid rgba(8, 145, 178, 0.2);
    }

    .alert-item.alert-success {
        border-color: #10b981;
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.08) 0%, rgba(16, 185, 129, 0.02) 100%);
        border: 1px solid rgba(16, 185, 129, 0.2);
    }

    .alert-item.alert-danger {
        border-color: #ef4444;
        background: linear-gradient(135deg, rgba(239, 68, 68, 0.08) 0%, rgba(239, 68, 68, 0.02) 100%);
        border: 1px solid rgba(239, 68, 68, 0.2);
    }

    .alert-icon {
        font-size: 1.4rem;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        width: 36px;
        height: 36px;
        border-radius: 10px;
    }

    .alert-item.alert-warning .alert-icon {
        color: #f59e0b;
        background: rgba(245, 158, 11, 0.15);
    }

    .alert-item.alert-info .alert-icon {
        color: #0891b2;
        background: rgba(8, 145, 178, 0.15);
    }

    .alert-item.alert-success .alert-icon {
        color: #10b981;
        background: rgba(16, 185, 129, 0.15);
    }

    .alert-item.alert-danger .alert-icon {
        color: #ef4444;
        background: rgba(239, 68, 68, 0.15);
    }

    .alert-content h6 {
        margin: 0 0 4px 0;
        color: var(--dark);
        font-weight: 700;
        font-size: 0.95rem;
    }

    .alert-content p {
        margin: 0 0 4px 0;
        font-size: 0.85rem;
        color: var(--gray);
    }

    .alert-content small {
        color: var(--gray);
        font-size: 0.75rem;
        font-weight: 500;
    }

    /* ===== ANIMATIONS ===== */
    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(40px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes pulse-warning {
        0%, 100% {
            box-shadow: 0 0 0 0 rgba(245, 158, 11, 0.7);
        }
        50% {
            box-shadow: 0 0 0 8px rgba(245, 158, 11, 0);
        }
    }

    @keyframes moveBackground {
        0% {
            transform: translate(0, 0);
        }
        50% {
            transform: translate(50px, 50px);
        }
        100% {
            transform: translate(0, 0);
        }
    }

    /* ===== INPUT STYLING ===== */
    .input-group input,
    .input-group select {
        border-color: #e2e8f0;
        font-size: 0.9rem;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .input-group input::placeholder {
        color: var(--gray);
    }

    .input-group input:focus,
    .input-group select:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }

    .input-group-text {
        background: rgba(255, 255, 255, 0.6);
        border-color: #e2e8f0;
        color: var(--gray);
    }

    /* ===== BUTTON GROUP ===== */
    .btn-group {
        display: flex;
        gap: 6px;
    }

    .btn-outline-primary,
    .btn-outline-success,
    .btn-outline-info {
        font-weight: 600;
        transition: all 0.3s ease;
        border: 1.5px solid currentColor;
    }

    .btn-outline-primary:hover {
        background: var(--primary);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(37, 99, 235, 0.3);
    }

    .btn-outline-success:hover {
        background: var(--success);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(16, 185, 129, 0.3);
    }

    .btn-outline-info:hover {
        background: var(--info);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(8, 145, 178, 0.3);
    }

    .counter {
        font-feature-settings: "tnum";
        font-variant-numeric: tabular-nums;
    }

    /* ===== RESPONSIVE DESIGN ===== */
    @media (max-width: 768px) {
        .quick-actions-bar {
            justify-content: flex-start;
            overflow-x: auto;
            padding-bottom: 20px;
        }

        .quick-action-btn {
            white-space: nowrap;
            flex-shrink: 0;
        }

        .pilot-stats {
            grid-template-columns: 1fr 1fr;
        }

        .stat-card {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .stat-card:hover {
            transform: translateY(-8px);
        }

        .header-section {
            padding: 24px 20px;
        }

        .header-section h1 {
            font-size: 2rem;
        }

        .card-body {
            padding: 16px;
        }

        .input-group {
            flex-direction: column;
        }

        .input-group input,
        .input-group select {
            width: 100%;
        }

        .flight-table {
            font-size: 0.85rem;
        }

        .flight-table tbody td {
            padding: 10px 8px;
        }

        .pilot-card {
            margin-bottom: 20px;
        }
    }

    @media (max-width: 576px) {
        .stat-card {
            padding: 16px;
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            font-size: 1.3rem;
        }

        .stat-content h2 {
            font-size: 1.8rem;
        }

        .pilot-avatar {
            font-size: 2.5rem;
            width: 70px;
            height: 70px;
        }

        .pilot-stats {
            gap: 6px;
            padding: 10px;
        }

        .timeline-item {
            gap: 12px;
        }

        .alert-item {
            gap: 10px;
            padding: 10px;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animate stat counters
        const counters = document.querySelectorAll('.counter');
        counters.forEach(counter => {
            const textContent = counter.textContent.trim();
            const finalText = textContent.replace('%', '').replace('★', '');
            const final = parseFloat(finalText);
            const duration = 1500;
            let current = 0;
            const increment = final / (duration / 16);
            const hasPercent = textContent.includes('%');
            const hasRating = textContent.includes('★');

            const timer = setInterval(() => {
                current += increment;
                if (current >= final) {
                    if (hasPercent) {
                        counter.textContent = final + '%';
                    } else if (hasRating) {
                        counter.textContent = final + '★';
                    } else {
                        counter.textContent = Math.floor(final);
                    }
                    clearInterval(timer);
                } else {
                    const displayValue = Math.floor(current);
                    if (hasPercent) {
                        counter.textContent = displayValue + '%';
                    } else if (hasRating) {
                        counter.textContent = displayValue + '★';
                    } else {
                        counter.textContent = displayValue;
                    }
                }
            }, 16);
        });

        // Stagger animations for cards
        const cards = document.querySelectorAll('.stat-card');
        cards.forEach((card, index) => {
            card.style.animationDelay = `${index * 0.1}s`;
            card.style.animationFillMode = 'both';
        });

        const pilotCards = document.querySelectorAll('.pilot-card');
        pilotCards.forEach((card, index) => {
            card.style.animationDelay = `${index * 0.1}s`;
            card.style.animationFillMode = 'both';
        });

        // Flight Search & Filter
        const flightSearch = document.getElementById('flightSearch');
        const statusFilter = document.getElementById('statusFilter');
        const flightTable = document.querySelector('.flight-table');

        if (flightSearch && statusFilter && flightTable) {
            const filterFlights = () => {
                const searchTerm = flightSearch.value.toLowerCase();
                const statusTerm = statusFilter.value.toLowerCase();
                const rows = flightTable.querySelectorAll('tbody tr');

                rows.forEach(row => {
                    const flightNumber = row.querySelector('.flight-number')?.textContent.toLowerCase() || '';
                    const status = row.getAttribute('data-status') || '';
                    
                    const matchesSearch = flightNumber.includes(searchTerm) || 
                                        row.textContent.toLowerCase().includes(searchTerm);
                    const matchesStatus = !statusTerm || status.includes(statusTerm);

                    row.style.display = (matchesSearch && matchesStatus) ? '' : 'none';
                });
            };

            flightSearch.addEventListener('keyup', filterFlights);
            statusFilter.addEventListener('change', filterFlights);
        }

        // Quick Action Buttons
        const quickActionButtons = document.querySelectorAll('.quick-action-btn');
        quickActionButtons.forEach(btn => {
            btn.addEventListener('click', function() {
                const title = this.getAttribute('title');
                console.log('Action triggered:', title);
                // Add toast notification or modal logic here
                showNotification(title + ' feature triggered!', 'info');
            });
        });

        // Toast Notification Function
        window.showNotification = function(message, type = 'info') {
            const toastHtml = `
                <div class="toast align-items-center text-white bg-${type}" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            ${message}
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                    </div>
                </div>
            `;
            const toastContainer = document.createElement('div');
            toastContainer.className = 'toast-container position-fixed bottom-0 end-0 p-3';
            toastContainer.innerHTML = toastHtml;
            document.body.appendChild(toastContainer);

            const toast = new bootstrap.Toast(toastContainer.querySelector('.toast'));
            toast.show();

            setTimeout(() => toastContainer.remove(), 3000);
        };
    });
</script>

<!-- Schedule Flight Modal -->
<div class="modal fade" id="scheduleFlightModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content glass-effect border-0">
            <div class="modal-header bg-gradient border-0">
                <h5 class="modal-title text-white">
                    <i class="bi bi-calendar-plus"></i> Schedule New Flight
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Flight Number</label>
                            <input type="text" class="form-control" placeholder="e.g., DL450">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Aircraft Type</label>
                            <select class="form-select">
                                <option selected>Select Aircraft</option>
                                <option>Boeing 737</option>
                                <option>Airbus A320</option>
                                <option>Boeing 787</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Departure Time</label>
                            <input type="datetime-local" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Destination</label>
                            <input type="text" class="form-control" placeholder="e.g., Miami">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Gate Number</label>
                            <input type="text" class="form-control" placeholder="e.g., B5">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Captain</label>
                            <select class="form-select">
                                <option selected>Select Captain</option>
                                <option>John Smith</option>
                                <option>David Lee</option>
                                <option>Michael Brown</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-top bg-light">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Schedule Flight</button>
            </div>
        </div>
    </div>
</div>

<!-- Incident Report Modal -->
<div class="modal fade" id="incidentModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content glass-effect border-0">
            <div class="modal-header bg-gradient border-0">
                <h5 class="modal-title text-white">
                    <i class="bi bi-exclamation-octagon"></i> Report Incident
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Incident Type</label>
                            <select class="form-select">
                                <option selected>Select Type</option>
                                <option>Maintenance Issue</option>
                                <option>Safety Concern</option>
                                <option>Weather Delay</option>
                                <option>Crew Issue</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Flight Number</label>
                            <input type="text" class="form-control" placeholder="e.g., DL450">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" rows="4" placeholder="Describe the incident..."></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Severity</label>
                            <select class="form-select">
                                <option selected>Select Severity</option>
                                <option>Low</option>
                                <option>Medium</option>
                                <option>High</option>
                                <option>Critical</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Report Time</label>
                            <input type="datetime-local" class="form-control">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-top bg-light">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger">Submit Report</button>
            </div>
        </div>
    </div>
</div>
@endsection
