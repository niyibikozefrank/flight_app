@auth
<div class="profile-box">
    <div class="profile-box-content">
        <div class="profile-avatar">
            @if(Auth::user()->profile_picture)
                <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="Profile Picture" class="profile-avatar-img">
            @else
                <i class="bi bi-person-circle"></i>
            @endif
        </div>
        <div class="profile-info">
            <h4 class="profile-name">{{ Auth::user()->name }}</h4>
            <p class="profile-role">{{ ucfirst(Auth::user()->role ?? 'user') }}</p>
            <p class="profile-email">{{ Auth::user()->email }}</p>
        </div>
    </div>
    <a href="{{ route('profile.show') }}" class="profile-btn-edit" title="Edit Profile">
        <i class="bi bi-pencil-square"></i>
        <span>Edit Profile</span>
    </a>
</div>

<style>
    .profile-box {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 12px;
        padding: 16px;
        margin: 0 12px 20px 12px;
        backdrop-filter: blur(10px);
        transition: all var(--transition-speed) ease;
    }

    .profile-box:hover {
        background: rgba(255, 255, 255, 0.15);
        border-color: rgba(255, 255, 255, 0.3);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
    }

    .profile-box-content {
        display: flex;
        gap: 12px;
        margin-bottom: 12px;
        align-items: flex-start;
    }

    .profile-avatar {
        flex-shrink: 0;
        width: 50px;
        height: 50px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        color: white;
        overflow: hidden;
    }

    .profile-avatar-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .profile-info {
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 4px;
        min-width: 0;
    }

    .profile-name {
        margin: 0;
        font-size: 14px;
        font-weight: 600;
        color: white;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .profile-role {
        margin: 0;
        font-size: 12px;
        color: rgba(255, 255, 255, 0.7);
        text-transform: capitalize;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .profile-email {
        margin: 0;
        font-size: 11px;
        color: rgba(255, 255, 255, 0.6);
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .profile-btn-edit {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        width: 100%;
        padding: 10px 12px;
        background: rgba(255, 255, 255, 0.2);
        color: white;
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 8px;
        text-decoration: none;
        font-size: 13px;
        font-weight: 500;
        transition: all var(--transition-speed) ease;
        cursor: pointer;
    }

    .profile-btn-edit:hover {
        background: rgba(255, 255, 255, 0.3);
        border-color: rgba(255, 255, 255, 0.4);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    .profile-btn-edit i {
        font-size: 14px;
    }

    .side-nav.collapsed:not(:hover) .profile-box {
        padding: 8px;
    }

    .side-nav.collapsed:not(:hover) .profile-box-content {
        display: none;
    }

    .side-nav.collapsed:not(:hover) .profile-avatar {
        width: 40px;
        height: 40px;
        font-size: 20px;
    }

    .side-nav.collapsed:not(:hover) .profile-btn-edit {
        width: auto;
        padding: 8px;
        justify-content: center;
    }

    .side-nav.collapsed:not(:hover) .profile-btn-edit span {
        display: none;
    }
</style>
@endauth
