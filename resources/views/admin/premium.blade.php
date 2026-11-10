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
                <article class="content dashboard-page">
                    <div class="title-block" style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:12px;">
                        <div>
                            <h3 class="title">Premium Upgrade Requests</h3>
                            <p class="title-description">Verify customer payment E-Receipts and approve or reject Premium memberships</p>
                        </div>
                        <div style="display:flex; gap:8px;">
                            <a href="{{ route('premium', ['filter' => 'pending']) }}" class="btn btn-sm {{ ($filter ?? 'pending') === 'pending' ? 'btn-primary' : 'btn-secondary' }}">
                                Pending ({{ $counts['pending'] ?? 0 }})
                            </a>
                            <a href="{{ route('premium', ['filter' => 'processed']) }}" class="btn btn-sm {{ ($filter ?? '') === 'processed' ? 'btn-primary' : 'btn-secondary' }}">
                                Processed ({{ $counts['processed'] ?? 0 }})
                            </a>
                            <a href="{{ route('premium', ['filter' => 'all']) }}" class="btn btn-sm {{ ($filter ?? '') === 'all' ? 'btn-primary' : 'btn-secondary' }}">
                                All ({{ $counts['all'] ?? 0 }})
                            </a>
                        </div>
                    </div> 

                    <section class="section">
                        <div class="row">
                          @forelse($premiums as $premium)
                            <div class="col-xl-4 col-md-6" style="margin-bottom: 24px;">
                                <div class="card shadow" style="background:#fff; border-radius:8px; overflow:hidden; border:1px solid #e5e7eb;">
                                    <div class="card-header" style="padding:14px 18px; border-bottom:1px solid #f3f4f6; display:flex; align-items:center; justify-content:space-between;">
                                        <div style="display:flex; align-items:center; gap:12px;">
                                            @if($premium->user && $premium->user->avatar)
                                                <img src="{{ $premium->user->avatar }}" alt="Avatar" style="width:42px; height:42px; border-radius:50%; object-fit:cover;">
                                            @else
                                                <div style="width:42px; height:42px; border-radius:50%; background:#3b82f6; color:#fff; display:flex; align-items:center; justify-content:center; font-weight:700;">
                                                    {{ strtoupper(substr($premium->user->name ?? $premium->name ?? 'U', 0, 1)) }}
                                                </div>
                                            @endif
                                            <div>
                                                <strong>{{ $premium->user->name ?? $premium->name }}</strong><br>
                                                <small class="text-muted">{{ $premium->user->email ?? $premium->email }}</small>
                                            </div>
                                        </div>
                                        <span class="badge" style="padding:4px 10px; border-radius:999px; font-size:11px; background:{{ !$premium->is_disabled ? '#f59e0b' : '#10b981' }}; color:#fff;">
                                            {{ !$premium->is_disabled ? 'Pending' : 'Processed' }}
                                        </span>
                                    </div>

                                    <!-- Card Body -->
                                    <div class="card-body text-center" style="padding:18px; background:#f9fafb;">
                                        <a href="{{ $premium->e_receipt }}" target="_blank" title="Click to view full receipt">
                                            <img src="{{ $premium->e_receipt ?? 'https://via.placeholder.com/200x300' }}" 
                                                class="img-fluid img-thumbnail" 
                                                alt="Payment E-Receipt" 
                                                style="width:220px; height:280px; object-fit:cover; border-radius:6px;">
                                        </a>
                                        <div style="margin-top:10px; font-size:12px; color:#6b7280;">
                                            Submitted {{ $premium->created_at?->diffForHumans() }}
                                            &middot;
                                            <a href="{{ $premium->e_receipt }}" target="_blank">Open Full Image &nearr;</a>
                                        </div>
                                    </div>

                                    <!-- Card Footer -->
                                    @if(!$premium->is_disabled && $premium->user)
                                        <div class="card-footer" style="padding:14px 18px; background:#fff; border-top:1px solid #f3f4f6;">
                                            <div class="row">
                                                <div class="col-6">
                                                    <form action="{{ route('users.approve', $premium->user->id) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-success btn-sm w-100">
                                                            <i class="fa fa-check"></i> Approve
                                                        </button>
                                                    </form>
                                                </div>
                                                <div class="col-6">
                                                    <form action="{{ route('premium.reject', $premium->id) }}" method="POST" onsubmit="return confirm('Reject this premium request?');">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-danger btn-sm w-100">
                                                            <i class="fa fa-times"></i> Reject
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                          @empty
                            <div class="col-12">
                                <div class="card" style="background:#fff; padding:40px 20px; text-align:center; border-radius:8px;">
                                    <h4 style="color:#6b7280; margin:0;">No {{ $filter ?? 'pending' }} premium requests found.</h4>
                                </div>
                            </div>
                          @endforelse
                        </div>
                    </section>
                </article>
                @include('component.fooder')
            </div>
        </div>
        @include('component.script')
    </body>

</html>
