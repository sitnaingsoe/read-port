@php
    $adminUser = Auth::user();
    $pendingPremiumList = \App\Models\Premium::with('user')->where('is_disabled', false)->latest()->take(5)->get();
    $pendingPremiumCount = \App\Models\Premium::where('is_disabled', false)->count();
@endphp

<style>
    .rp-admin-header {
        background: #ffffff;
        height: 68px;
        position: fixed;
        top: 0;
        left: 250px;
        right: 0;
        z-index: 1000;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 28px;
        box-shadow: 0 2px 12px rgba(15, 23, 42, 0.06);
        border-bottom: 1px solid #e2e8f0;
    }
    @media (max-width: 991px) {
        .rp-admin-header {
            left: 0;
            padding: 0 16px;
        }
    }
    .rp-header-left {
        display: flex;
        align-items: center;
        gap: 18px;
    }
    .rp-search-form {
        position: relative;
        width: 280px;
    }
    @media (max-width: 767px) {
        .rp-search-form {
            display: none;
        }
    }
    .rp-search-input {
        width: 100%;
        height: 38px;
        padding: 0 14px 0 36px;
        border-radius: 8px;
        border: 1px solid #e2e8f0;
        background: #f8fafc;
        font-size: 13px;
        color: #1e293b;
        transition: all 0.2s ease;
    }
    .rp-search-input:focus {
        outline: none;
        border-color: #3b82f6;
        background: #fff;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.12);
    }
    .rp-search-icon {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
        font-size: 13px;
    }
    .rp-quick-links {
        display: flex;
        align-items: center;
        gap: 8px;
    }
    @media (max-width: 1100px) {
        .rp-quick-links {
            display: none;
        }
    }
    .rp-qbtn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 7px 13px;
        border-radius: 7px;
        font-size: 12.5px;
        font-weight: 600;
        text-decoration: none !important;
        transition: all 0.2s ease;
    }
    .rp-qbtn-primary {
        background: #eff6ff;
        color: #2563eb !important;
        border: 1px solid #bfdbfe;
    }
    .rp-qbtn-primary:hover {
        background: #2563eb;
        color: #fff !important;
    }
    .rp-qbtn-neutral {
        background: #f8fafc;
        color: #475569 !important;
        border: 1px solid #e2e8f0;
    }
    .rp-qbtn-neutral:hover {
        background: #f1f5f9;
        color: #0f172a !important;
    }
    .rp-header-right {
        display: flex;
        align-items: center;
        gap: 16px;
    }
    .rp-notif-wrap, .rp-profile-wrap-dd {
        position: relative;
    }
    .rp-icon-btn {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        border: 1px solid #e2e8f0;
        background: #f8fafc;
        color: #475569;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        position: relative;
        transition: all 0.2s ease;
    }
    .rp-icon-btn:hover {
        background: #f1f5f9;
        color: #0f172a;
    }
    .rp-notif-badge {
        position: absolute;
        top: -5px;
        right: -5px;
        min-width: 19px;
        height: 19px;
        padding: 0 5px;
        border-radius: 999px;
        background: #ef4444;
        color: #fff;
        font-size: 11px;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 2px solid #fff;
    }
    .rp-admin-user-btn {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 5px 10px 5px 6px;
        border-radius: 10px;
        border: 1px solid #e2e8f0;
        background: #f8fafc;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    .rp-admin-user-btn:hover {
        background: #f1f5f9;
    }
    .rp-admin-avatar {
        width: 34px;
        height: 34px;
        border-radius: 8px;
        background: linear-gradient(135deg, #2563eb, #4f46e5);
        color: #fff;
        font-weight: 700;
        font-size: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }
    .rp-admin-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .rp-admin-info {
        text-align: left;
        line-height: 1.2;
    }
    .rp-admin-name {
        font-size: 13px;
        font-weight: 700;
        color: #0f172a;
        display: block;
    }
    .rp-admin-role {
        font-size: 11px;
        color: #10b981;
        font-weight: 600;
    }
    .rp-dd-menu {
        display: none;
        position: absolute;
        right: 0;
        top: calc(100% + 8px);
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        box-shadow: 0 12px 30px rgba(15, 23, 42, 0.12);
        min-width: 220px;
        z-index: 1100;
        overflow: hidden;
    }
    .rp-dd-menu.show {
        display: block;
    }
    .rp-dd-header {
        padding: 12px 16px;
        background: #f8fafc;
        border-bottom: 1px solid #e2e8f0;
        font-size: 12px;
        font-weight: 700;
        color: #475569;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .rp-dd-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 16px;
        color: #334155 !important;
        font-size: 13px;
        text-decoration: none !important;
        transition: background 0.15s ease;
    }
    .rp-dd-item:hover {
        background: #f1f5f9;
    }
    .rp-dd-item.danger {
        color: #dc2626 !important;
        border-top: 1px solid #f1f5f9;
    }
    .rp-dd-item.danger:hover {
        background: #fef2f2;
    }
</style>

<header class="rp-admin-header">
    <div class="rp-header-left">
        <form action="{{ route('book-list') }}" method="GET" class="rp-search-form">
            <i class="fa fa-search rp-search-icon"></i>
            <input type="search" name="search" value="{{ request('search') }}" class="rp-search-input" placeholder="Search books or authors...">
        </form>

        <div class="rp-quick-links">
            <a href="{{ route('book-create') }}" class="rp-qbtn rp-qbtn-primary">
                <i class="fa fa-plus-circle"></i> New Book
            </a>
            <a href="{{ route('book-category') }}" class="rp-qbtn rp-qbtn-neutral">
                <i class="fa fa-tags"></i> Categories
            </a>
            <a href="{{ route('home') }}" target="_blank" class="rp-qbtn rp-qbtn-neutral">
                <i class="fa fa-external-link"></i> Storefront
            </a>
        </div>
    </div>

    <div class="rp-header-right">
        <!-- Pending Premium Notifications -->
        <div class="rp-notif-wrap">
            <button type="button" class="rp-icon-btn" onclick="toggleAdminDd('rp-notif-dd')" title="Premium Requests">
                <i class="fa fa-bell"></i>
                @if($pendingPremiumCount > 0)
                    <span class="rp-notif-badge">{{ $pendingPremiumCount }}</span>
                @endif
            </button>

            <div id="rp-notif-dd" class="rp-dd-menu" style="min-width: 300px;">
                <div class="rp-dd-header">
                    <span>Pending Premium Requests</span>
                    <span style="background:#fef3c7; color:#d97706; padding:2px 8px; border-radius:999px; font-size:11px;">{{ $pendingPremiumCount }} new</span>
                </div>
                <div style="max-height: 260px; overflow-y: auto;">
                    @forelse($pendingPremiumList as $req)
                        <a href="{{ route('premium') }}" class="rp-dd-item" style="border-bottom: 1px solid #f8fafc;">
                            <div style="width:32px; height:32px; border-radius:50%; background:#f59e0b; color:#fff; display:flex; align-items:center; justify-content:center; font-weight:700; flex-shrink:0;">
                                {{ strtoupper(substr($req->name ?? 'U', 0, 1)) }}
                            </div>
                            <div style="overflow:hidden;">
                                <div style="font-weight:600; font-size:13px; color:#0f172a; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">
                                    {{ $req->name }}
                                </div>
                                <div style="font-size:11px; color:#64748b;">
                                    Uploaded receipt &middot; {{ $req->created_at?->diffForHumans() }}
                                </div>
                            </div>
                        </a>
                    @empty
                        <div style="padding: 20px 16px; text-align: center; color: #94a3b8; font-size: 13px;">
                            No pending premium requests
                        </div>
                    @endforelse
                </div>
                <a href="{{ route('premium') }}" class="rp-dd-item" style="justify-content:center; background:#f8fafc; font-weight:600; color:#2563eb !important;">
                    View All Requests &rarr;
                </a>
            </div>
        </div>

        <!-- Admin User Profile Dropdown -->
        <div class="rp-profile-wrap-dd">
            <button type="button" class="rp-admin-user-btn" onclick="toggleAdminDd('rp-user-dd')">
                <div class="rp-admin-avatar">
                    @if($adminUser && $adminUser->avatar)
                        <img src="{{ $adminUser->avatar }}" alt="{{ $adminUser->name }}">
                    @else
                        {{ strtoupper(substr($adminUser->name ?? 'A', 0, 1)) }}
                    @endif
                </div>
                <div class="rp-admin-info">
                    <span class="rp-admin-name">{{ $adminUser->name ?? 'Admin' }}</span>
                    <span class="rp-admin-role">Administrator</span>
                </div>
                <i class="fa fa-chevron-down" style="font-size:11px; color:#64748b; margin-left:4px;"></i>
            </button>

            <div id="rp-user-dd" class="rp-dd-menu">
                <div class="rp-dd-header">
                    <span>{{ $adminUser->email ?? 'admin@example.com' }}</span>
                </div>
                <a href="{{ route('dashboard') }}" class="rp-dd-item">
                    <i class="fa fa-tachometer" style="width:16px; color:#64748b;"></i> Dashboard
                </a>
                <a href="{{ route('profile') }}" class="rp-dd-item">
                    <i class="fa fa-user" style="width:16px; color:#64748b;"></i> My Profile
                </a>
                <a href="{{ route('home') }}" class="rp-dd-item">
                    <i class="fa fa-globe" style="width:16px; color:#64748b;"></i> View Storefront
                </a>
                <a href="{{ route('logout') }}" class="rp-dd-item danger" onclick="localStorage.removeItem('auth_token');">
                    <i class="fa fa-power-off" style="width:16px;"></i> Logout
                </a>
            </div>
        </div>
    </div>
</header>

<script>
    function toggleAdminDd(id) {
        ['rp-notif-dd', 'rp-user-dd'].forEach(function(menuId) {
            var el = document.getElementById(menuId);
            if (!el) return;
            if (menuId === id) {
                el.classList.toggle('show');
            } else {
                el.classList.remove('show');
            }
        });
    }
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.rp-notif-wrap') && !e.target.closest('.rp-profile-wrap-dd')) {
            ['rp-notif-dd', 'rp-user-dd'].forEach(function(menuId) {
                var el = document.getElementById(menuId);
                if (el) el.classList.remove('show');
            });
        }
    });
</script>
