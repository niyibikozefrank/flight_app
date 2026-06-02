@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <!-- Header -->
    <div class="header-section mb-4">
        <a href="{{ route('pilots.show', $flight->id) }}" class="btn btn-outline-primary btn-sm mb-3">
            <i class="bi bi-arrow-left"></i> Back to Flight Details
        </a>
        <h1 class="display-5">
            <i class="bi bi-checklist"></i> Pre-flight Checklist
        </h1>
        <p class="lead">Flight {{ $flight->flight_number ?? 'N/A' }} - {{ $flight->destination ?? 'N/A' }}</p>
    </div>

    <div class="row g-4">
        <!-- Flight Overview -->
        <div class="col-md-4">
            <div class="checklist-overview glass-effect">
                <div class="overview-header">
                    <h5>Flight Summary</h5>
                </div>
                <div class="overview-body">
                    <div class="overview-item">
                        <span class="label">Flight Number</span>
                        <span class="value">{{ $flight->flight_number ?? 'N/A' }}</span>
                    </div>
                    <div class="overview-item">
                        <span class="label">Aircraft</span>
                        <span class="value">
                            <span class="badge bg-info">{{ $flight->aircraft_type ?? 'N/A' }}</span>
                        </span>
                    </div>
                    <div class="overview-item">
                        <span class="label">Capacity</span>
                        <span class="value">{{ $flight->capacity ?? 'N/A' }} Passengers</span>
                    </div>
                    <div class="overview-item">
                        <span class="label">Departure</span>
                        <span class="value">{{ $flight->departure_time?->format('H:i A') ?? 'N/A' }}</span>
                    </div>
                    <div class="overview-item">
                        <span class="label">Destination</span>
                        <span class="value">{{ $flight->destination ?? 'N/A' }}</span>
                    </div>
                    <div class="overview-item">
                        <span class="label">Flight Time</span>
                        <span class="value">{{ $flight->duration_minutes ?? 'N/A' }} min</span>
                    </div>
                </div>
            </div>

            <!-- Crew Information -->
            <div class="checklist-overview glass-effect mt-4">
                <div class="overview-header">
                    <h5>Flight Crew</h5>
                </div>
                <div class="overview-body">
                    <div class="overview-item">
                        <span class="label">Captain</span>
                        <span class="value">{{ $flight->staff->name ?? 'N/A' }}</span>
                    </div>
                    <div class="overview-item">
                        <span class="label">Passenger Name</span>
                        <span class="value">{{ $flight->passenger->name ?? 'N/A' }}</span>
                    </div>
                    @if($flight->gate)
                        <div class="overview-item">
                            <span class="label">Gate Assignment</span>
                            <span class="value">Gate {{ $flight->gate->gate_number }}</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Checklist Items -->
        <div class="col-md-8">
            <div class="glass-effect p-4">
                <h5 class="mb-4">Pre-flight Checklist Items</h5>

                <form id="checklistForm">
                    <!-- Engine Systems -->
                    <div class="checklist-category">
                        <div class="category-header">
                            <h6><i class="bi bi-engine"></i> Engine Systems</h6>
                        </div>
                        <div class="checklist-items">
                            <div class="checklist-item">
                                <input type="checkbox" id="engine1" class="form-check-input">
                                <label for="engine1">Engine 1 Start-up Test</label>
                                <span class="status-indicator" id="status-engine1"></span>
                            </div>
                            <div class="checklist-item">
                                <input type="checkbox" id="engine2" class="form-check-input">
                                <label for="engine2">Engine 2 Start-up Test</label>
                                <span class="status-indicator" id="status-engine2"></span>
                            </div>
                            <div class="checklist-item">
                                <input type="checkbox" id="enginetemp" class="form-check-input">
                                <label for="enginetemp">Engine Temperature Check</label>
                                <span class="status-indicator" id="status-enginetemp"></span>
                            </div>
                            <div class="checklist-item">
                                <input type="checkbox" id="enginepressure" class="form-check-input">
                                <label for="enginepressure">Engine Pressure Check</label>
                                <span class="status-indicator" id="status-enginepressure"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Hydraulic Systems -->
                    <div class="checklist-category mt-4">
                        <div class="category-header">
                            <h6><i class="bi bi-cpu"></i> Hydraulic Systems</h6>
                        </div>
                        <div class="checklist-items">
                            <div class="checklist-item">
                                <input type="checkbox" id="hydro1" class="form-check-input">
                                <label for="hydro1">Hydraulic System 1 Pressure</label>
                                <span class="status-indicator" id="status-hydro1"></span>
                            </div>
                            <div class="checklist-item">
                                <input type="checkbox" id="hydro2" class="form-check-input">
                                <label for="hydro2">Hydraulic System 2 Pressure</label>
                                <span class="status-indicator" id="status-hydro2"></span>
                            </div>
                            <div class="checklist-item">
                                <input type="checkbox" id="fluidlevel" class="form-check-input">
                                <label for="fluidlevel">Hydraulic Fluid Level</label>
                                <span class="status-indicator" id="status-fluidlevel"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Flight Controls -->
                    <div class="checklist-category mt-4">
                        <div class="category-header">
                            <h6><i class="bi bi-airplane-fill"></i> Flight Controls</h6>
                        </div>
                        <div class="checklist-items">
                            <div class="checklist-item">
                                <input type="checkbox" id="aileron" class="form-check-input">
                                <label for="aileron">Aileron Control Check</label>
                                <span class="status-indicator" id="status-aileron"></span>
                            </div>
                            <div class="checklist-item">
                                <input type="checkbox" id="elevator" class="form-check-input">
                                <label for="elevator">Elevator Control Check</label>
                                <span class="status-indicator" id="status-elevator"></span>
                            </div>
                            <div class="checklist-item">
                                <input type="checkbox" id="rudder" class="form-check-input">
                                <label for="rudder">Rudder Control Check</label>
                                <span class="status-indicator" id="status-rudder"></span>
                            </div>
                            <div class="checklist-item">
                                <input type="checkbox" id="flaps" class="form-check-input">
                                <label for="flaps">Flaps Control Check</label>
                                <span class="status-indicator" id="status-flaps"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Systems & Instruments -->
                    <div class="checklist-category mt-4">
                        <div class="category-header">
                            <h6><i class="bi bi-speedometer2"></i> Systems & Instruments</h6>
                        </div>
                        <div class="checklist-items">
                            <div class="checklist-item">
                                <input type="checkbox" id="instruments" class="form-check-input">
                                <label for="instruments">Instrument Panel Check</label>
                                <span class="status-indicator" id="status-instruments"></span>
                            </div>
                            <div class="checklist-item">
                                <input type="checkbox" id="avionics" class="form-check-input">
                                <label for="avionics">Avionics Systems Check</label>
                                <span class="status-indicator" id="status-avionics"></span>
                            </div>
                            <div class="checklist-item">
                                <input type="checkbox" id="nav" class="form-check-input">
                                <label for="nav">Navigation Systems Check</label>
                                <span class="status-indicator" id="status-nav"></span>
                            </div>
                            <div class="checklist-item">
                                <input type="checkbox" id="weather" class="form-check-input">
                                <label for="weather">Weather Radar Check</label>
                                <span class="status-indicator" id="status-weather"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Safety Equipment -->
                    <div class="checklist-category mt-4">
                        <div class="category-header">
                            <h6><i class="bi bi-shield-check"></i> Safety Equipment</h6>
                        </div>
                        <div class="checklist-items">
                            <div class="checklist-item">
                                <input type="checkbox" id="oxygen" class="form-check-input">
                                <label for="oxygen">Oxygen System Check</label>
                                <span class="status-indicator" id="status-oxygen"></span>
                            </div>
                            <div class="checklist-item">
                                <input type="checkbox" id="emergency" class="form-check-input">
                                <label for="emergency">Emergency Equipment Check</label>
                                <span class="status-indicator" id="status-emergency"></span>
                            </div>
                            <div class="checklist-item">
                                <input type="checkbox" id="slides" class="form-check-input">
                                <label for="slides">Emergency Slides Check</label>
                                <span class="status-indicator" id="status-slides"></span>
                            </div>
                            <div class="checklist-item">
                                <input type="checkbox" id="extinguisher" class="form-check-input">
                                <label for="extinguisher">Fire Extinguishers Check</label>
                                <span class="status-indicator" id="status-extinguisher"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Progress Bar -->
                    <div class="mt-4">
                        <div class="progress-container">
                            <div class="progress" role="progressbar" style="height: 30px;">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" id="progressBar" style="width: 0%;">
                                    <span id="progressText">0%</span>
                                </div>
                            </div>
                        </div>
                        <p class="mt-2 text-center text-muted">
                            <strong id="checkedCount">0</strong> of <strong id="totalCount">19</strong> items completed
                        </p>
                    </div>

                    <!-- Completion Message -->
                    <div id="completionMessage" class="alert alert-success mt-4 d-none" role="alert">
                        <i class="bi bi-check-circle-fill"></i> All pre-flight checks completed! Aircraft ready for departure.
                    </div>

                    <!-- Action Buttons -->
                    <div class="mt-4 d-flex gap-2 justify-content-center">
                        <button type="button" class="btn btn-secondary" onclick="resetChecklist()">
                            <i class="bi bi-arrow-counterclockwise"></i> Reset
                        </button>
                        <button type="button" class="btn btn-success btn-lg" id="readyBtn" disabled>
                            <i class="bi bi-check-circle"></i> Aircraft Ready for Departure
                        </button>
                    </div>
                </form>
            </div>
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
        --light: #f8fafc;
        --dark: #1e293b;
        --gray: #64748b;
    }

    body {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .header-section {
        background: linear-gradient(135deg, rgba(37, 99, 235, 0.1) 0%, rgba(30, 58, 138, 0.1) 100%);
        padding: 35px 30px;
        border-radius: 16px;
        border-left: 5px solid var(--primary);
        animation: slideInUp 0.6s ease-out;
        box-shadow: 0 4px 20px rgba(37, 99, 235, 0.08);
    }

    .header-section h1 {
        color: var(--dark);
        font-weight: 800;
    }

    .header-section .lead {
        color: var(--gray);
    }

    .glass-effect {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.98) 0%, rgba(248, 250, 252, 0.98) 100%);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.4);
        border-radius: 16px;
        box-shadow: 0 12px 48px rgba(0, 0, 0, 0.08);
        animation: slideInUp 0.8s ease-out;
        overflow: hidden;
    }

    .checklist-overview {
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        position: relative;
    }

    .checklist-overview:hover {
        transform: translateY(-12px);
        box-shadow: 0 20px 60px rgba(37, 99, 235, 0.15);
        border-color: rgba(37, 99, 235, 0.3);
    }

    .overview-header {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        color: white;
        padding: 18px;
        border-radius: 16px 16px 0 0;
        position: relative;
        overflow: hidden;
    }

    .overview-header::before {
        content: '';
        position: absolute;
        top: 0;
        right: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
        animation: moveGradient 15s ease infinite;
    }

    .overview-header h5 {
        margin: 0;
        font-weight: 700;
        position: relative;
        z-index: 1;
    }

    .overview-body {
        padding: 18px;
    }

    .overview-item {
        display: flex;
        justify-content: space-between;
        padding: 12px 0;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }

    .overview-item:hover {
        padding-left: 8px;
        background: rgba(37, 99, 235, 0.02);
    }

    .overview-item:last-child {
        border-bottom: none;
    }

    .overview-item .label {
        font-weight: 700;
        color: var(--gray);
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.3px;
    }

    .overview-item .value {
        color: var(--dark);
        font-weight: 600;
        text-align: right;
    }

    .checklist-category {
        padding: 24px;
        background: linear-gradient(135deg, rgba(37, 99, 235, 0.05) 0%, rgba(37, 99, 235, 0.02) 100%);
        border-radius: 12px;
        border-left: 4px solid var(--primary);
        border: 1px solid rgba(37, 99, 235, 0.1);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .checklist-category:hover {
        background: linear-gradient(135deg, rgba(37, 99, 235, 0.08) 0%, rgba(37, 99, 235, 0.04) 100%);
        box-shadow: 0 8px 24px rgba(37, 99, 235, 0.1);
    }

    .category-header h6 {
        color: var(--dark);
        font-weight: 800;
        margin: 0 0 16px 0;
        font-size: 1.05rem;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .checklist-items {
        margin-top: 16px;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 12px;
    }

    .checklist-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 14px;
        background: white;
        border-radius: 10px;
        transition: all 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
        border: 1px solid rgba(37, 99, 235, 0.1);
        position: relative;
        overflow: hidden;
    }

    .checklist-item::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 3px;
        background: var(--primary-gradient);
        transform: scaleY(0);
        transform-origin: top;
        transition: transform 0.3s ease;
    }

    .checklist-item:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 24px rgba(37, 99, 235, 0.15);
        border-color: rgba(37, 99, 235, 0.3);
    }

    .checklist-item:hover::before {
        transform: scaleY(1);
    }

    .checklist-item input[type="checkbox"] {
        width: 22px;
        height: 22px;
        cursor: pointer;
        accent-color: var(--primary);
        flex-shrink: 0;
        transition: all 0.3s ease;
    }

    .checklist-item input[type="checkbox"]:checked {
        transform: scale(1.1);
    }

    .checklist-item label {
        flex: 1;
        margin: 0;
        cursor: pointer;
        font-weight: 500;
        color: var(--gray);
        transition: all 0.3s ease;
    }

    .checklist-item input[type="checkbox"]:checked + label {
        color: var(--success);
        font-weight: 600;
    }

    .status-indicator {
        width: 14px;
        height: 14px;
        border-radius: 50%;
        background: #cbd5e1;
        transition: all 0.3s ease;
        flex-shrink: 0;
    }

    .status-indicator.checked {
        background: var(--success);
        box-shadow: 0 0 12px rgba(16, 185, 129, 0.6);
        animation: pulseCheck 0.5s ease;
    }

    .progress-container {
        background: linear-gradient(135deg, rgba(37, 99, 235, 0.08) 0%, rgba(37, 99, 235, 0.02) 100%);
        padding: 16px;
        border-radius: 10px;
        border: 1px solid rgba(37, 99, 235, 0.15);
    }

    .progress {
        height: 28px;
        background: rgba(203, 213, 225, 0.5);
        border-radius: 8px;
        overflow: hidden;
    }

    .progress-bar {
        background: linear-gradient(90deg, #2563eb 0%, #3b82f6 100%);
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 0.9rem;
        transition: width 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    #readyBtn {
        font-weight: 700;
        padding: 14px 32px;
        font-size: 1.05rem;
        transition: all 0.3s ease;
    }

    #readyBtn:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    #readyBtn:enabled {
        animation: pulseButton 2s ease-in-out infinite;
    }

    #readyBtn:hover:enabled {
        transform: translateY(-3px);
        box-shadow: 0 12px 36px rgba(16, 185, 129, 0.3);
    }

    .alert-success {
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(16, 185, 129, 0.05) 100%);
        border: 1px solid rgba(16, 185, 129, 0.3);
        border-radius: 10px;
        animation: slideInUp 0.4s ease-out;
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

    @keyframes pulseCheck {
        0% { transform: scale(0.8); }
        50% { transform: scale(1.3); }
        100% { transform: scale(1); }
    }

    @keyframes pulseButton {
        0%, 100% {
            box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.4);
        }
        50% {
            box-shadow: 0 0 0 12px rgba(16, 185, 129, 0);
        }
    }

    @keyframes moveGradient {
        0% { transform: translate(0, 0); }
        50% { transform: translate(50px, 50px); }
        100% { transform: translate(0, 0); }
    }

    .btn-secondary {
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-secondary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    @media (max-width: 768px) {
        .checklist-items {
            grid-template-columns: 1fr;
        }
        
        .header-section {
            padding: 24px 20px;
        }

        .checklist-category {
            padding: 18px;
        }
    }
</style>

<script>
    class ChecklistManager {
        constructor() {
            this.checkboxes = document.querySelectorAll('.checklist-item input[type="checkbox"]');
            this.progressBar = document.getElementById('progressBar');
            this.progressText = document.getElementById('progressText');
            this.checkedCount = document.getElementById('checkedCount');
            this.totalCount = document.getElementById('totalCount');
            this.readyBtn = document.getElementById('readyBtn');
            this.completionMessage = document.getElementById('completionMessage');
            this.totalCount.textContent = this.checkboxes.length;
            this.init();
        }

        init() {
            this.checkboxes.forEach((checkbox, index) => {
                checkbox.addEventListener('change', () => this.onCheckboxChange(checkbox));
                // Stagger animations for loading
                checkbox.closest('.checklist-item').style.animationDelay = `${index * 0.05}s`;
            });

            this.readyBtn.addEventListener('click', () => this.onReadyClick());
            this.loadChecklistState();
        }

        onCheckboxChange(checkbox) {
            const item = checkbox.closest('.checklist-item');
            const statusId = 'status-' + checkbox.id;
            const statusIndicator = document.getElementById(statusId);

            if (checkbox.checked) {
                statusIndicator.classList.add('checked');
                item.style.transition = 'all 0.3s ease';
                item.style.background = 'rgba(16, 185, 129, 0.05)';
            } else {
                statusIndicator.classList.remove('checked');
                item.style.background = 'white';
            }

            this.updateProgress();
            this.saveChecklistState();
        }

        updateProgress() {
            const checked = Array.from(this.checkboxes).filter(cb => cb.checked).length;
            const total = this.checkboxes.length;
            const percentage = Math.round((checked / total) * 100);

            this.checkedCount.textContent = checked;
            this.progressBar.style.width = percentage + '%';
            this.progressText.textContent = percentage + '%';

            if (percentage === 100) {
                this.showCompletion();
            } else {
                this.hideCompletion();
            }
        }

        showCompletion() {
            this.readyBtn.disabled = false;
            this.completionMessage.classList.remove('d-none');
            this.completionMessage.style.animation = 'slideInUp 0.4s ease-out';
            
            // Add confetti effect (optional)
            this.playSuccessAnimation();
        }

        hideCompletion() {
            this.readyBtn.disabled = true;
            this.completionMessage.classList.add('d-none');
        }

        onReadyClick() {
            if (!this.readyBtn.disabled) {
                this.readyBtn.disabled = true;
                this.readyBtn.innerHTML = '<i class="bi bi-check-circle"></i> Processing...';
                
                setTimeout(() => {
                    this.showSuccessModal();
                }, 500);
            }
        }

        showSuccessModal() {
            const modal = document.createElement('div');
            modal.style.cssText = `
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0, 0, 0, 0.5);
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 9999;
                animation: fadeIn 0.3s ease;
            `;

            modal.innerHTML = `
                <div style="
                    background: white;
                    padding: 40px;
                    border-radius: 16px;
                    text-align: center;
                    max-width: 400px;
                    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
                    animation: slideInUp 0.4s ease;
                ">
                    <div style="font-size: 3rem; margin-bottom: 16px; animation: scaleIn 0.5s ease;">
                        ✈️
                    </div>
                    <h3 style="color: #1e293b; margin-bottom: 12px; font-weight: 800;">Perfect!</h3>
                    <p style="color: #64748b; margin-bottom: 24px; font-size: 1.05rem;">
                        All pre-flight checks completed. Aircraft is ready for safe departure.
                    </p>
                    <button onclick="this.closest('div').parentElement.remove()" style="
                        background: #2563eb;
                        color: white;
                        border: none;
                        padding: 12px 32px;
                        border-radius: 8px;
                        font-weight: 600;
                        cursor: pointer;
                        transition: all 0.3s ease;
                    " onmouseover="this.style.background='#1e40af'" onmouseout="this.style.background='#2563eb'">
                        Close
                    </button>
                </div>
            `;

            document.body.appendChild(modal);
        }

        playSuccessAnimation() {
            const items = document.querySelectorAll('.checklist-item');
            items.forEach((item, index) => {
                if (item.querySelector('input[type="checkbox"]').checked) {
                    item.style.animation = `pulse 0.6s ease ${index * 0.05}s`;
                }
            });
        }

        resetChecklist() {
            if (confirm('Are you sure you want to reset the entire checklist?')) {
                this.checkboxes.forEach(cb => {
                    cb.checked = false;
                    cb.dispatchEvent(new Event('change'));
                });
                localStorage.removeItem('checklistState');
            }
        }

        saveChecklistState() {
            const state = {};
            this.checkboxes.forEach(cb => {
                state[cb.id] = cb.checked;
            });
            localStorage.setItem('checklistState', JSON.stringify(state));
        }

        loadChecklistState() {
            const saved = localStorage.getItem('checklistState');
            if (saved) {
                const state = JSON.parse(saved);
                this.checkboxes.forEach(cb => {
                    if (state[cb.id]) {
                        cb.checked = true;
                        cb.dispatchEvent(new Event('change'));
                    }
                });
            }
        }
    }

    // Initialize on page load
    let checklistManager;
    document.addEventListener('DOMContentLoaded', function() {
        checklistManager = new ChecklistManager();
        
        // Add smooth scroll behavior
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });
    });

    // Make resetChecklist function available globally
    function resetChecklist() {
        if (checklistManager) {
            checklistManager.resetChecklist();
        }
    }

    // Add CSS animations dynamically
    const style = document.createElement('style');
    style.textContent = `
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes scaleIn {
            from { transform: scale(0); }
            to { transform: scale(1); }
        }
    `;
    document.head.appendChild(style);
</script>
@endsection
