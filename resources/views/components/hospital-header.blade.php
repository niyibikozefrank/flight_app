<!-- Airport Header Component -->
<header class="airport-header">
    <div class="header-container">
        <div class="logo-section">
            <img src="{{ asset('hospital-logo.svg') }}" alt="Kigali International Airport" class="airport-logo">
            <div class="airport-info">
                <h1 class="airport-title">KIGALI AIRPORT MANAGEMENT</h1>
                <p class="airport-subtitle">Airport Operations System</p>
            </div>
        </div>
    </div>
</header>

<style>
    .airport-header {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
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

    .airport-logo {
        width: 60px;
        height: 60px;
        filter: brightness(0) invert(1);
    }

    .airport-info {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .airport-title {
        margin: 0;
        font-size: 24px;
        font-weight: 700;
        color: #ffffff;
        letter-spacing: 1px;
    }

    .airport-subtitle {
        margin: 0;
        font-size: 12px;
        color: rgba(255, 255, 255, 0.9);
        font-weight: 500;
    }

    @media (max-width: 768px) {
        .airport-title {
            font-size: 18px;
        }

        .airport-subtitle {
            font-size: 10px;
        }

        .airport-logo {
            width: 50px;
            height: 50px;
        }
    }
</style>