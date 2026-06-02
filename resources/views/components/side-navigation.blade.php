@if(!request()->routeIs('login', 'register', 'password.request', 'password.reset', 'password.confirm'))
<div class="side-nav" id="sideNav">
    <div class="side-nav-header">
        <div class="nav-brand">
            <i class="bi bi-airplane"></i>
            <span>Airport</span>
        </div>
        <button class="collapse-btn" id="collapseBtn" title="Toggle sidebar">
            <i class="bi bi-chevron-left"></i>
        </button>
    </div>

    <div class="side-nav-content">
        <!-- Profile Box -->
        <x-profile-box />

        <!-- Navigation Links -->
        <nav class="side-nav-menu">
            @if(!request()->routeIs('dashboard'))
                <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" title="Dashboard">
                    <i class="bi bi-speedometer2"></i>
                    <span>Dashboard</span>
                </a>
            @endif
            
            <a href="{{ route('passengers.index') }}" class="nav-link {{ request()->routeIs('passengers.*') ? 'active' : '' }}" title="Passengers">
                <i class="bi bi-people"></i>
                <span>Passengers</span>
            </a>
            
            <a href="{{ route('staff.index') }}" class="nav-link {{ request()->routeIs('staff.*') ? 'active' : '' }}" title="Staff">
                <i class="bi bi-person-badge"></i>
                <span>Staff</span>
            </a>
            
            <a href="{{ route('flights.index') }}" class="nav-link {{ request()->routeIs('flights.*') ? 'active' : '' }}" title="Flights">
                <i class="bi bi-airplane"></i>
                <span>Flights</span>
            </a>

            <a href="{{ route('gates.index') }}" class="nav-link {{ request()->routeIs('gates.*') ? 'active' : '' }}" title="Gates">
                <i class="bi bi-diagram-3"></i>
                <span>Gates</span>
            </a>

            <a href="{{ route('services.index') }}" class="nav-link {{ request()->routeIs('services.*') ? 'active' : '' }}" title="Services">
                <i class="bi bi-gear"></i>
                <span>Services</span>
            </a>

            <a href="{{ route('servicerecords.index') }}" class="nav-link {{ request()->routeIs('servicerecords.*') ? 'active' : '' }}" title="Service Records">
                <i class="bi bi-file-earmark"></i>
                <span>Service Records</span>
            </a>

            <a href="{{ route('groundservices.index') }}" class="nav-link {{ request()->routeIs('groundservices.*') ? 'active' : '' }}" title="Ground Services">
                <i class="bi bi-tools"></i>
                <span>Ground Services</span>
            </a>

            <a href="{{ route('servicehistory.index') }}" class="nav-link {{ request()->routeIs('servicehistory.*') ? 'active' : '' }}" title="Service History">
                <i class="bi bi-clock-history"></i>
                <span>Service History</span>
            </a>
            
            <a href="{{ route('reports.daily') }}" class="nav-link {{ request()->routeIs('reports.*') ? 'active' : '' }}" title="Daily Report">
                <i class="bi bi-file-earmark-text"></i>
                <span>Daily Report</span>
            </a>

            <a href="{{ route('profile.show') }}" class="nav-link {{ request()->routeIs('profile.*') ? 'active' : '' }}" title="My Profile">
                <i class="bi bi-person-circle"></i>
                <span>My Profile</span>
            </a>
        </nav>

        <!-- Logout Button at Bottom -->
        <div class="side-nav-logout">
            <form method="POST" action="{{ route('logout') }}" class="w-100">
                @csrf
                <button type="submit" class="nav-logout-btn" title="Logout">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </div>
</div>

<style>
    :root {
        --nav-width: 260px;
        --nav-width-collapsed: 70px;
        --nav-bg: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        --nav-hover: rgba(255, 255, 255, 0.15);
        --nav-active: rgba(255, 255, 255, 0.25);
        --transition-speed: 0.3s;
    }

    .side-nav {
        position: fixed;
        left: 0;
        top: 0;
        width: var(--nav-width);
        height: 100vh;
        background: var(--nav-bg);
        box-shadow: 4px 0 20px rgba(0, 0, 0, 0.15);
        z-index: 1000;
        transition: width var(--transition-speed) ease, left var(--transition-speed) ease;
        overflow-y: auto;
        overflow-x: hidden;
        user-select: none;
        display: flex;
        flex-direction: column;
    }

    .side-nav:hover {
        width: var(--nav-width);
    }

    .side-nav.collapsed {
        width: var(--nav-width-collapsed);
    }

    .side-nav.collapsed:hover {
        width: var(--nav-width);
    }

    .side-nav-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 20px 16px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        min-height: 70px;
    }

    .nav-brand {
        display: flex;
        align-items: center;
        gap: 12px;
        color: white;
        font-weight: 700;
        font-size: 18px;
        white-space: nowrap;
        transition: opacity var(--transition-speed) ease;
    }

    .side-nav.collapsed:not(:hover) .nav-brand span {
        display: none;
    }

    .nav-brand i {
        font-size: 24px;
    }

    .collapse-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        background: rgba(255, 255, 255, 0.2);
        border: none;
        border-radius: 8px;
        color: white;
        cursor: pointer;
        transition: all var(--transition-speed) ease;
        flex-shrink: 0;
    }

    .collapse-btn:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: scale(1.05);
    }

    .collapse-btn i {
        font-size: 16px;
        transition: transform var(--transition-speed) ease;
    }

    .side-nav.collapsed .collapse-btn i {
        transform: rotate(180deg);
    }

    .side-nav-content {
        display: flex;
        flex-direction: column;
        flex: 1;
        padding: 16px 0;
        justify-content: space-between;
        overflow-y: auto;
    }

    .side-nav-menu {
        display: flex;
        flex-direction: column;
        gap: 6px;
        padding: 0 10px;
    }

    .nav-link {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 14px;
        color: rgba(255, 255, 255, 0.85);
        text-decoration: none;
        border-radius: 10px;
        transition: all var(--transition-speed) ease;
        font-weight: 500;
        font-size: 14px;
        white-space: nowrap;
        position: relative;
    }

    .nav-link:hover {
        background: var(--nav-hover);
        color: #fff;
        transform: translateX(2px);
    }

    .nav-link.active {
        background: var(--nav-active);
        color: #fff;
        border-left: 3px solid #fff;
        padding-left: 11px;
    }

    .nav-link i {
        font-size: 18px;
        min-width: 24px;
        text-align: center;
        flex-shrink: 0;
    }

    .side-nav.collapsed:not(:hover) .nav-link span {
        display: none;
    }

    .side-nav-logout {
        padding: 12px 10px;
        border-top: 1px solid rgba(255, 255, 255, 0.15);
        margin: 0 10px;
    }

    .nav-logout-btn {
        width: 100%;
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 14px;
        background: rgba(255, 255, 255, 0.15);
        border: none;
        border-radius: 8px;
        color: rgba(255, 255, 255, 0.95);
        cursor: pointer;
        font-weight: 600;
        font-size: 14px;
        transition: all var(--transition-speed) ease;
        white-space: nowrap;
    }

    .nav-logout-btn:hover {
        background: rgba(255, 255, 255, 0.25);
        transform: translateX(2px);
    }

    .nav-logout-btn i {
        font-size: 16px;
        flex-shrink: 0;
    }

    .side-nav.collapsed:not(:hover) .nav-logout-btn span {
        display: none;
    }

    /* Scrollbar styling */
    .side-nav-content::-webkit-scrollbar {
        width: 6px;
    }

    .side-nav-content::-webkit-scrollbar-track {
        background: transparent;
    }

    .side-nav-content::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.2);
        border-radius: 3px;
    }

    .side-nav-content::-webkit-scrollbar-thumb:hover {
        background: rgba(255, 255, 255, 0.3);
    }

    /* Adjust main content when side nav is present */
    body {
        margin-left: var(--nav-width);
        transition: margin-left var(--transition-speed) ease;
    }

    body.sidebar-collapsed {
        margin-left: var(--nav-width-collapsed);
    }

    @media (max-width: 768px) {
        :root {
            --nav-width: 240px;
            --nav-width-collapsed: 60px;
        }

        .nav-link {
            padding: 10px 12px;
            font-size: 13px;
        }
    }
</style>

<script>
    const sideNav = document.getElementById('sideNav');
    const collapseBtn = document.getElementById('collapseBtn');
    const body = document.body;

    // Load collapsed state from localStorage
    const isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
    if (isCollapsed) {
        sideNav.classList.add('collapsed');
        body.classList.add('sidebar-collapsed');
    }

    // Toggle collapse on button click
    collapseBtn.addEventListener('click', (e) => {
        e.preventDefault();
        e.stopPropagation();
        
        sideNav.classList.toggle('collapsed');
        body.classList.toggle('sidebar-collapsed');
        
        const newCollapsedState = sideNav.classList.contains('collapsed');
        localStorage.setItem('sidebarCollapsed', newCollapsedState);
    });

    // Auto-expand on hover (for collapsed state)
    sideNav.addEventListener('mouseenter', () => {
        if (sideNav.classList.contains('collapsed')) {
            // Sidebar will auto-expand via CSS :hover
        }
    });
</script>
@endif
