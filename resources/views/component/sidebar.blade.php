@php
    $pendingCountSidebar = \App\Models\Premium::where('is_disabled', false)->count();
@endphp
<style>
    .sidebar {
        width: 250px;
        background: #1e293b;
        color: #fff;
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1001;
        box-shadow: 4px 0 15px rgba(0, 0, 0, 0.08);
    }
    .sidebar .sidebar-header {
        height: 68px;
        padding: 0 22px;
        background: #0f172a;
        display: flex;
        align-items: center;
        border-bottom: 1px solid rgba(255, 255, 255, 0.06);
    }
    .sidebar .brand {
        font-size: 18px;
        font-weight: 700;
        color: #fff;
        letter-spacing: 0.4px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .sidebar-menu {
        list-style: none;
        padding: 14px 10px;
        margin: 0;
    }
    .sidebar-menu li {
        margin-bottom: 4px;
    }
    .sidebar-menu li a, .logout-link {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 11px 16px;
        color: #cbd5e1;
        text-decoration: none !important;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 500;
        transition: all 0.2s ease;
        width: 100%;
        border: none;
        background: transparent;
        cursor: pointer;
        text-align: left;
    }
    .sidebar-menu li a:hover, .logout-link:hover {
        background: rgba(255, 255, 255, 0.08);
        color: #fff;
    }
    .sidebar-menu li.active a {
        background: #2563eb;
        color: #fff;
        font-weight: 600;
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.35);
    }
    .sidebar-menu li a i, .logout-link i {
        width: 22px;
        margin-right: 10px;
        text-align: center;
    }
    .rp-side-badge {
        background: #f59e0b;
        color: #111827;
        font-size: 11px;
        font-weight: 700;
        padding: 2px 8px;
        border-radius: 999px;
    }
</style>

<aside class="sidebar">
    <div class="sidebar-container">
        <div class="sidebar-header">
            <div class="brand">
                <i class="fa-solid fa-book-open-reader" style="color:#3b82f6; font-size:20px;"></i>
                <span>ReadPort <small style="font-size:11px; color:#94a3b8; font-weight:500;">ADMIN</small></span>
            </div>
        </div>
        <nav class="menu">
            <ul class="sidebar-menu" id="sidebar-menu">
                <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}">
                        <span><i class="fa fa-home"></i> Dashboard</span>
                    </a>
                </li>

                <li class="{{ request()->routeIs('book-list') ? 'active' : '' }}">
                    <a href="{{ route('book-list') }}">
                        <span><i class="fa fa-book"></i> Books List</span>
                    </a>
                </li>

                <li class="{{ request()->routeIs('book-create') ? 'active' : '' }}">
                    <a href="{{ route('book-create') }}">
                        <span><i class="fa-solid fa-circle-plus"></i> Create Book</span>
                    </a>
                </li>

                <li class="{{ request()->routeIs('book-category') ? 'active' : '' }}">
                    <a href="{{ route('book-category') }}">
                        <span><i class="fa fa-tags"></i> Categories</span>
                    </a>
                </li>

                <li class="{{ request()->routeIs('customer-list') ? 'active' : '' }}">
                    <a href="{{ route('customer-list') }}">
                        <span><i class="fa fa-users"></i> Customer List</span>
                    </a>
                </li>

                <li class="{{ request()->routeIs('premium') ? 'active' : '' }}">
                    <a href="{{ route('premium') }}">
                        <span><i class="fa-solid fa-crown"></i> Premium Requests</span>
                        @if($pendingCountSidebar > 0)
                            <span class="rp-side-badge">{{ $pendingCountSidebar }}</span>
                        @endif
                    </a>
                </li>

                <li style="margin-top: 16px; border-top: 1px solid rgba(255,255,255,0.08); padding-top: 12px;">
                    <a href="{{ route('home') }}">
                        <span><i class="fa fa-globe"></i> View Storefront</span>
                    </a>
                </li>

                <li class="logout-item">
                    <form action="{{ route('logout') }}" method="POST" style="margin:0;">
                        @csrf
                        <button type="submit" class="logout-link" onclick="localStorage.removeItem('auth_token');" style="color:#fca5a5;">
                            <span><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</span>
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>
