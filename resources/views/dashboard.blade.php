<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard - {{ config('app.name', 'Airport Management System') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- AOS Animation Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }

        @keyframes floating {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes glow {
            0%, 100% {
                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            }
            50% {
                box-shadow: 0 12px 48px rgba(30, 60, 114, 0.3);
            }
        }

        .fade-in-up {
            animation: fadeInUp 0.8s ease-out;
        }

        .slide-in-left {
            animation: slideInLeft 0.8s ease-out;
        }

        .slide-in-right {
            animation: slideInRight 0.8s ease-out;
        }

        body { 
            margin: 0;
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            background-attachment: fixed;
            min-height: 100vh;
            position: relative;
            font-family: 'Figtree', sans-serif;
        }
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('/clinic_app/photo/three.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            opacity: 0.15;
            z-index: 0;
            pointer-events: none;
        }
        .hospital-header {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            padding: 15px 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            position: relative;
            z-index: 10;
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
        }
        .container-main {
            max-width: 1200px;
            margin-top: 40px;
            margin-bottom: 40px;
            position: relative;
            z-index: 5;
        }
        .card-header-custom {
            background: linear-gradient(135deg, rgba(30, 60, 114, 0.95) 0%, rgba(42, 82, 152, 0.95) 100%);
            backdrop-filter: blur(10px);
            color: white;
            padding: 30px;
            border-radius: 10px 10px 0 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .card-header-custom h2 {
            margin: 0;
            font-weight: 700;
        }
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        .dashboard-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            transition: all 0.4s cubic-bezier(0.23, 1, 0.320, 1);
            text-decoration: none;
            color: inherit;
            border: 1px solid rgba(255, 255, 255, 0.2);
            display: flex;
            flex-direction: column;
            gap: 15px;
            position: relative;
            overflow: hidden;
        }

        .dashboard-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s ease;
            z-index: 1;
        }

        .dashboard-card:hover::before {
            left: 100%;
        }

        .dashboard-card:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: 0 20px 50px rgba(30, 60, 114, 0.3);
            background: rgba(255, 255, 255, 0.98);
        }

        .dashboard-card-icon {
            font-size: 3rem;
            display: inline-block;
            width: 70px;
            height: 70px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: all 0.3s ease;
            animation: floating 3s ease-in-out infinite;
        }

        .dashboard-card:hover .dashboard-card-icon {
            animation: pulse 0.6s ease-in-out;
        }
        .card-passengers .dashboard-card-icon {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        }
        .card-staff .dashboard-card-icon {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        }
        .card-flights .dashboard-card-icon {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        }
        .card-daily-report .dashboard-card-icon {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        }
        .card-services .dashboard-card-icon {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        }
        .card-service-records .dashboard-card-icon {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        }
        .card-ground-services .dashboard-card-icon {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        }
        .card-service-history .dashboard-card-icon {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        }
        .card-gates .dashboard-card-icon {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        }

        .card-pilot-chamber {
            position: relative;
            border: 2px solid rgba(79, 179, 217, 0.3);
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.97) 0%, rgba(242, 248, 255, 0.95) 100%) !important;
        }

        .card-pilot-chamber:hover {
            border-color: rgba(79, 179, 217, 0.6);
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.99) 0%, rgba(245, 250, 255, 0.98) 100%) !important;
        }

        .card-pilot-chamber .dashboard-card-icon {
            background: linear-gradient(135deg, #4fb3d9 0%, #2a5298 100%);
            box-shadow: 0 0 20px rgba(79, 179, 217, 0.4);
        }

        .card-pilot-chamber h4 {
            color: #1e3c72;
            font-size: 1.4rem;
        }

        .card-pilot-chamber p {
            color: #2a5298;
            font-weight: 500;
        }
        .dashboard-card h4 {
            margin: 0;
            font-weight: 700;
            font-size: 1.25rem;
            color: #333;
        }
        .dashboard-card p {
            margin: 0;
            color: #666;
            font-size: 0.95rem;
        }
        .dashboard-card .btn {
            align-self: flex-start;
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .dashboard-card .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            color: white;
        }
        .hero-section {
            position: relative;
            height: 400px;
            border-radius: 15px;
            overflow: hidden;
            margin-bottom: 40px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
        }
        .hero-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('/one.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 1;
            z-index: 1;
        }
        .hero-background::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(30, 60, 114, 0.45) 0%, rgba(42, 82, 152, 0.45) 100%);
            z-index: 2;
        }
        .hero-content {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            padding: 40px;
            color: white;
            z-index: 3;
        }
        .hero-content h1 {
            margin: 0;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
            text-shadow: 2px 2px 8px rgba(0,0,0,0.4);
        }
        .hero-content p {
            margin: 0;
            font-size: 1.1rem;
            opacity: 0.98;
            text-shadow: 1px 1px 4px rgba(0,0,0,0.4);
            max-width: 500px;
        }
        .dashboard-wrapper {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 0 0 10px 10px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        @media (max-width: 768px) {
            .hero-section {
                height: 250px;
                margin-bottom: 30px;
            }
            .hero-content {
                padding: 25px;
            }
            .hero-content h1 {
                font-size: 1.8rem;
            }
            .hero-content p {
                font-size: 0.95rem;
            }
        }
    </style>
</head>

<body class="font-sans antialiased">
    @include('components.hospital-header')
    <x-side-navigation />
    
    <div class="container-main">
        <!-- HERO SECTION WITH TRANSPARENT BACKGROUND IMAGE -->
        <div class="hero-section fade-in-up">
            <div class="hero-background"></div>
            <div class="hero-content">
                <h1>Welcome to Airport Management System</h1>
                <p>Streamline your airport operations with our comprehensive management platform. Manage passengers, flights, ground services, and more in one place.</p>
            </div>
        </div>

        <div class="card-header-custom slide-in-left">
            <h2><i class="bi bi-speedometer2"></i> Dashboard</h2>
        </div>

        <div class="dashboard-wrapper">
            <div class="dashboard-grid">


                <!-- Passengers Card -->
                <a href="{{ route('passengers.index') }}" class="dashboard-card card-passengers">
                    <div class="dashboard-card-icon">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <h4>Passengers</h4>
                    <p>Manage all registered passengers</p>
                    <span class="btn">
                        <i class="bi bi-arrow-right"></i> Go to Passengers
                    </span>
                </a>

                <!-- Staff Card -->
                <a href="{{ route('staff.index') }}" class="dashboard-card card-staff">
                    <div class="dashboard-card-icon">
                        <i class="bi bi-person-badge"></i>
                    </div>
                    <h4>Staff</h4>
                    <p>Manage airport staff and departments</p>
                    <span class="btn">
                        <i class="bi bi-arrow-right"></i> Go to Staff
                    </span>
                </a>

                <!-- Flights Card -->
                <a href="{{ route('flights.index') }}" class="dashboard-card card-flights">
                    <div class="dashboard-card-icon">
                        <i class="bi bi-airplane"></i>
                    </div>
                    <h4>Flights</h4>
                    <p>Manage flight schedules and bookings</p>
                    <span class="btn">
                        <i class="bi bi-arrow-right"></i> Go to Flights
                    </span>
                </a>

                <!-- Daily Report Card -->
                <a href="{{ route('reports.daily') }}" class="dashboard-card card-daily-report">
                    <div class="dashboard-card-icon">
                        <i class="bi bi-file-earmark-bar-graph"></i>
                    </div>
                    <h4>Daily Report</h4>
                    <p>View daily airport activities and statistics</p>
                    <span class="btn">
                        <i class="bi bi-arrow-right"></i> View Report
                    </span>
                </a>

                <!-- Services Card -->
                <a href="{{ route('services.index') }}" class="dashboard-card card-services">
                    <div class="dashboard-card-icon">
                        <i class="bi bi-gear"></i>
                    </div>
                    <h4>Services</h4>
                    <p>Manage airport services and categories</p>
                    <span class="btn">
                        <i class="bi bi-arrow-right"></i> View Services
                    </span>
                </a>

                <!-- Service Records Card -->
                <a href="{{ route('servicerecords.index') }}" class="dashboard-card card-service-records">
                    <div class="dashboard-card-icon">
                        <i class="bi bi-file-earmark"></i>
                    </div>
                    <h4>Service Records</h4>
                    <p>Manage passenger service records and history</p>
                    <span class="btn">
                        <i class="bi bi-arrow-right"></i> View Records
                    </span>
                </a>

                <!-- Ground Services Card -->
                <a href="{{ route('groundservices.index') }}" class="dashboard-card card-ground-services">
                    <div class="dashboard-card-icon">
                        <i class="bi bi-tools"></i>
                    </div>
                    <h4>Ground Services</h4>
                    <p>Manage ground handling and services</p>
                    <span class="btn">
                        <i class="bi bi-arrow-right"></i> View Ground Services
                    </span>
                </a>

                <!-- Service History Card -->
                <a href="{{ route('servicehistory.index') }}" class="dashboard-card card-service-history">
                    <div class="dashboard-card-icon">
                        <i class="bi bi-clock-history"></i>
                    </div>
                    <h4>Service History</h4>
                    <p>Manage service operations and billing</p>
                    <span class="btn">
                        <i class="bi bi-arrow-right"></i> View History
                    </span>
                </a>

                <!-- Gates Card -->
                <a href="{{ route('gates.index') }}" class="dashboard-card card-gates">
                    <div class="dashboard-card-icon">
                        <i class="bi bi-diagram-3"></i>
                    </div>
                    <h4>Gates</h4>
                    <p>Manage airport gates and terminals</p>
                    <span class="btn">
                        <i class="bi bi-arrow-right"></i> Go to Gates
                    </span>
                </a>

                <!-- Pilot Chamber Card -->
                <a href="{{ route('pilots.index') }}" class="dashboard-card card-pilot-chamber">
                    <div class="dashboard-card-icon" style="background: linear-gradient(135deg, #4fb3d9 0%, #2a5298 100%); animation: glow 2s ease-in-out infinite;">
                        <i class="bi bi-airplane-engines-fill"></i>
                    </div>
                    <h4>Pilot Chamber</h4>
                    <p>Pilot operational area and flight data</p>
                    <span class="btn" style="background: linear-gradient(135deg, #4fb3d9 0%, #2a5298 100%);">
                        <i class="bi bi-arrow-right"></i> Enter Pilot Zone
                    </span>
                </a>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); color: white; padding: 40px 20px; margin-top: 50px;">
        <div style="max-width: 1200px; margin: 0 auto;">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; margin-bottom: 30px;">
                
                <!-- Airport Info -->
                <div>
                    <h5 style="font-weight: 700; margin-bottom: 15px;">
                        <i class="bi bi-airplane"></i> Airport Management
                    </h5>
                    <p style="margin: 10px 0; font-size: 0.95rem;">
                        <strong>Location:</strong><br>
                        <i class="bi bi-geo-alt"></i> Kigali International Airport
                    </p>
                </div>

                <!-- Contact Info -->
                <div>
                    <h5 style="font-weight: 700; margin-bottom: 15px;">
                        <i class="bi bi-telephone"></i> Contact Us
                    </h5>
                    <p style="margin: 10px 0; font-size: 0.95rem;">
                        <strong>Phone:</strong><br>
                        <i class="bi bi-telephone-fill"></i> <a href="tel:+250795385239" style="color: white; text-decoration: none;">+250 795 385 239</a>
                    </p>
                    <p style="margin: 10px 0; font-size: 0.95rem;">
                        <strong>Email:</strong><br>
                        <i class="bi bi-envelope"></i> <a href="mailto:airport@example.com" style="color: white; text-decoration: none;">airport@example.com</a>
                    </p>
                </div>

                <!-- Status -->
                <div>
                    <h5 style="font-weight: 700; margin-bottom: 15px;">
                        <i class="bi bi-check-circle"></i> Status
                    </h5>
                    <p style="margin: 10px 0; font-size: 0.95rem;">
                        <span style="display: inline-block; width: 10px; height: 10px; background: #84fab0; border-radius: 50%; margin-right: 8px;"></span>
                        <strong>Open & Operational</strong>
                    </p>
                    <p style="margin: 10px 0; font-size: 0.9rem; color: rgba(255,255,255,0.9);">
                        Ready for all airport operations and services
                    </p>
                </div>
            </div>

            <!-- Divider -->
            <hr style="border-color: rgba(255,255,255,0.2); margin: 20px 0;">

            <!-- Footer Bottom -->
            <div style="text-align: center; font-size: 0.9rem; color: rgba(255,255,255,0.8);">
                <p style="margin: 0;">
                    &copy; {{ date('Y') }} Airport Management System. All rights reserved.
                </p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Dashboard JavaScript -->
    <script>
        // Initialize AOS (Animate On Scroll)
        AOS.init({
            duration: 1000,
            easing: 'ease-in-out',
            once: false,
            mirror: true
        });

        // Add stagger animation to dashboard cards
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.dashboard-card');
            cards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
                card.classList.add('fade-in-up');
                card.style.animation = 'fadeInUp 0.8s ease-out';
                card.style.animationDelay = `${index * 0.1}s`;
                card.style.animationFillMode = 'both';
            });

            // Add smooth scroll behavior
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                });
            });

            // Add hover pulse effect to pilot chamber
            const pilotCard = document.querySelector('.card-pilot-chamber');
            if (pilotCard) {
                pilotCard.addEventListener('mouseenter', function() {
                    this.style.animation = 'pulse 0.6s ease-in-out';
                });
            }

            // Parallax effect on scroll
            window.addEventListener('scroll', function() {
                const heroSection = document.querySelector('.hero-section');
                if (heroSection) {
                    const scrollPosition = window.pageYOffset;
                    const heroBackground = heroSection.querySelector('.hero-background');
                    if (heroBackground) {
                        heroBackground.style.transform = `translateY(${scrollPosition * 0.5}px)`;
                    }
                }
            });

            // Add floating animation to all card icons
            const cardIcons = document.querySelectorAll('.dashboard-card-icon');
            cardIcons.forEach((icon, index) => {
                icon.style.animationDelay = `${index * 0.2}s`;
            });

            // Add click ripple effect
            function rippleEffect(event) {
                const button = event.currentTarget;
                const ripple = document.createElement('span');
                const rect = button.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = event.clientX - rect.left - size / 2;
                const y = event.clientY - rect.top - size / 2;

                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.left = x + 'px';
                ripple.style.top = y + 'px';
                ripple.classList.add('ripple');

                button.appendChild(ripple);
                setTimeout(() => ripple.remove(), 600);
            }

            // Smooth counter animation
            function animateCounter(element, target, duration = 1500) {
                let start = 0;
                const increment = target / (duration / 16);
                const counter = setInterval(() => {
                    start += increment;
                    if (start >= target) {
                        element.textContent = target;
                        clearInterval(counter);
                    } else {
                        element.textContent = Math.floor(start);
                    }
                }, 16);
            }

            // Add interaction tracking
            document.querySelectorAll('.dashboard-card').forEach(card => {
                card.addEventListener('click', function() {
                    this.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        this.style.transform = '';
                    }, 150);
                });
            });
        });

        // Add CSS for ripple effect
        const style = document.createElement('style');
        style.textContent = `
            .dashboard-card {
                position: relative;
                overflow: hidden;
            }

            .ripple {
                position: absolute;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.6);
                transform: scale(0);
                animation: rippleAnimation 0.6s ease-out;
                pointer-events: none;
            }

            @keyframes rippleAnimation {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }

            .dashboard-card:active {
                box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.1);
            }

            /* Smooth transitions */
            * {
                transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            }

            /* Custom scrollbar */
            ::-webkit-scrollbar {
                width: 10px;
            }

            ::-webkit-scrollbar-track {
                background: rgba(255, 255, 255, 0.1);
            }

            ::-webkit-scrollbar-thumb {
                background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
                border-radius: 5px;
            }

            ::-webkit-scrollbar-thumb:hover {
                background: linear-gradient(135deg, #2a5298 0%, #3a6298 100%);
            }
        `;
        document.head.appendChild(style);
    </script>

</body>
</html>