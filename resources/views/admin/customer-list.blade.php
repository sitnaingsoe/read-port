<!doctype html>
<html class="no-js" lang="en">
    @include('component.head')
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

    <body>
        @include('vendor.sweetalert.alert')
        <div class="main-wrapper">
            <div class="app" id="app">
                @include('component.header')
                @include('component.sidebar')
                                <div class="sidebar-overlay" id="sidebar-overlay"></div>
                <div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
                <div class="mobile-menu-handle"></div>
                <article class="content items-list-page">
                    <div class="title-search-block">
                        <div class="title-block">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h3 class="title">Customer List ({{ $users->total() }})</h3>
                                    <div style="margin-top: 8px; display: flex; gap: 8px;">
                                        <a href="{{ route('customer-list', ['search' => request('search')]) }}" class="btn btn-sm {{ !request('status') ? 'btn-primary' : 'btn-secondary' }}">All</a>
                                        <a href="{{ route('customer-list', ['status' => 'premium', 'search' => request('search')]) }}" class="btn btn-sm {{ request('status') === 'premium' ? 'btn-primary' : 'btn-secondary' }}">Premium</a>
                                        <a href="{{ route('customer-list', ['status' => 'standard', 'search' => request('search')]) }}" class="btn btn-sm {{ request('status') === 'standard' ? 'btn-primary' : 'btn-secondary' }}">Standard</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="items-search">
                            <form class="form-inline" method="GET" action="{{ route('customer-list') }}">
                                @if(request('status'))
                                    <input type="hidden" name="status" value="{{ request('status') }}">
                                @endif
                                <div class="input-group">
                                    <input type="text" name="search" value="{{ request('search') }}" class="form-control boxed rounded-s" placeholder="Search name or email...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-secondary rounded-s" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card" style="background:#fff; border-radius:6px; padding:15px;">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle" style="margin-bottom:0;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Customer</th>
                                        <th>Email</th>
                                        <th>Saved / Reviews</th>
                                        <th>Joined</th>
                                        <th>Membership</th>
                                        <th style="text-align:right;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($users as $user)
                                        <tr>
                                            <td>{{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}</td>
                                            <td>
                                                <div style="display:flex; align-items:center; gap:10px;">
                                                    @if($user->avatar)
                                                        <img src="{{ $user->avatar }}" alt="Avatar" style="width:38px; height:38px; border-radius:50%; object-fit:cover;">
                                                    @else
                                                        <div style="width:38px; height:38px; border-radius:50%; background:#3b82f6; color:#fff; display:flex; align-items:center; justify-content:center; font-weight:700;">
                                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                                        </div>
                                                    @endif
                                                    <strong>{{ $user->name }}</strong>
                                                </div>
                                            </td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <small>{{ $user->saved_books_count ?? 0 }} saved · {{ $user->reviews_count ?? 0 }} reviews</small>
                                            </td>
                                            <td><small>{{ $user->created_at?->format('M d, Y') }}</small></td>
                                            <td>
                                                <span class="badge" style="padding:4px 10px; border-radius:12px; font-size:12px; background:{{ $user->is_premium ? '#10b981' : '#f59e0b' }}; color:#fff;">
                                                    {{ $user->is_premium ? 'Premium' : 'Standard' }}
                                                </span>
                                            </td>
                                            <td style="text-align:right;">
                                                <div style="display:inline-flex; gap:6px;">
                                                    <form action="{{ route('users.toggle-premium', $user->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-sm {{ $user->is_premium ? 'btn-warning' : 'btn-success' }}">
                                                            {{ $user->is_premium ? 'Set Standard' : 'Make Premium' }}
                                                        </button>
                                                    </form>

                                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete customer {{ addslashes($user->name) }}?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center text-muted" style="padding: 25px;">No customers found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div style="margin-top: 16px;">
                        {{ $users->withQueryString()->links() }}
                    </div>
                </article>
                @include('component.fooder')
                <!-- /.modal -->
            </div>
        </div>
        @include('component.script')
    </body>

</html>