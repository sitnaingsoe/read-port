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
                    <div class="title-block d-flex justify-content-between align-items-center" style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:12px;">
                        <div>
                            <h3 class="title">Admin Dashboard</h3>
                            <p class="title-description" id="welcome-message">
                                Welcome back, Admin {{ $admin->name ?? 'Admin' }} ({{ $admin->email ?? '' }})
                            </p>
                        </div>
                        <div style="display:flex; gap:10px;">
                            <a href="{{ route('home') }}" class="btn btn-secondary btn-sm">
                                <i class="fa fa-globe"></i> View Store
                            </a>
                            <a href="{{ route('book-create') }}" class="btn btn-primary btn-sm">
                                <i class="fa fa-plus"></i> Add New Book
                            </a>
                            <button id="logout-btn" class="btn btn-danger btn-sm">
                                <i class="fa fa-sign-out"></i> Logout
                            </button>
                        </div>
                    </div>

                    <!-- Stats Row -->
                    <section class="section">
                        <div class="row">
                            <div class="col-md-4 col-sm-6" style="margin-bottom: 20px;">
                                <div class="card card-block" style="padding: 20px; border-left: 4px solid #3b82f6; background: #fff; border-radius: 6px; box-shadow: 0 1px 3px rgba(0,0,0,0.08);">
                                    <div style="display:flex; justify-content:space-between; align-items:center;">
                                        <div>
                                            <div style="color:#6b7280; font-size:13px; text-transform:uppercase; font-weight:600;">Total Books</div>
                                            <div style="font-size:28px; font-weight:700; color:#111827; margin-top:4px;">{{ $stats['total_books'] ?? 0 }}</div>
                                        </div>
                                        <i class="fa fa-book" style="font-size:32px; color:#3b82f6; opacity:0.8;"></i>
                                    </div>
                                    <div style="margin-top:10px; font-size:12px;">
                                        <a href="{{ route('book-list') }}" style="color:#3b82f6; text-decoration:none;">Manage Books &rarr;</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-6" style="margin-bottom: 20px;">
                                <div class="card card-block" style="padding: 20px; border-left: 4px solid #10b981; background: #fff; border-radius: 6px; box-shadow: 0 1px 3px rgba(0,0,0,0.08);">
                                    <div style="display:flex; justify-content:space-between; align-items:center;">
                                        <div>
                                            <div style="color:#6b7280; font-size:13px; text-transform:uppercase; font-weight:600;">Categories</div>
                                            <div style="font-size:28px; font-weight:700; color:#111827; margin-top:4px;">{{ $stats['total_categories'] ?? 0 }}</div>
                                        </div>
                                        <i class="fa fa-tags" style="font-size:32px; color:#10b981; opacity:0.8;"></i>
                                    </div>
                                    <div style="margin-top:10px; font-size:12px;">
                                        <a href="{{ route('book-category') }}" style="color:#10b981; text-decoration:none;">Manage Categories &rarr;</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-6" style="margin-bottom: 20px;">
                                <div class="card card-block" style="padding: 20px; border-left: 4px solid #8b5cf6; background: #fff; border-radius: 6px; box-shadow: 0 1px 3px rgba(0,0,0,0.08);">
                                    <div style="display:flex; justify-content:space-between; align-items:center;">
                                        <div>
                                            <div style="color:#6b7280; font-size:13px; text-transform:uppercase; font-weight:600;">Customers</div>
                                            <div style="font-size:28px; font-weight:700; color:#111827; margin-top:4px;">{{ $stats['total_customers'] ?? 0 }}</div>
                                        </div>
                                        <i class="fa fa-users" style="font-size:32px; color:#8b5cf6; opacity:0.8;"></i>
                                    </div>
                                    <div style="margin-top:10px; font-size:12px;">
                                        <a href="{{ route('customer-list') }}" style="color:#8b5cf6; text-decoration:none;">View Customers &rarr;</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-6" style="margin-bottom: 20px;">
                                <div class="card card-block" style="padding: 20px; border-left: 4px solid #f59e0b; background: #fff; border-radius: 6px; box-shadow: 0 1px 3px rgba(0,0,0,0.08);">
                                    <div style="display:flex; justify-content:space-between; align-items:center;">
                                        <div>
                                            <div style="color:#6b7280; font-size:13px; text-transform:uppercase; font-weight:600;">Pending Premium</div>
                                            <div style="font-size:28px; font-weight:700; color:#111827; margin-top:4px;">{{ $stats['pending_premium'] ?? 0 }}</div>
                                        </div>
                                        <i class="fa fa-clock-o" style="font-size:32px; color:#f59e0b; opacity:0.8;"></i>
                                    </div>
                                    <div style="margin-top:10px; font-size:12px;">
                                        <a href="{{ route('premium') }}" style="color:#f59e0b; text-decoration:none;">Review Requests &rarr;</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-6" style="margin-bottom: 20px;">
                                <div class="card card-block" style="padding: 20px; border-left: 4px solid #ec4899; background: #fff; border-radius: 6px; box-shadow: 0 1px 3px rgba(0,0,0,0.08);">
                                    <div style="display:flex; justify-content:space-between; align-items:center;">
                                        <div>
                                            <div style="color:#6b7280; font-size:13px; text-transform:uppercase; font-weight:600;">Premium Members</div>
                                            <div style="font-size:28px; font-weight:700; color:#111827; margin-top:4px;">{{ $stats['premium_users'] ?? 0 }}</div>
                                        </div>
                                        <i class="fa fa-star" style="font-size:32px; color:#ec4899; opacity:0.8;"></i>
                                    </div>
                                    <div style="margin-top:10px; font-size:12px;">
                                        <a href="{{ route('customer-list') }}" style="color:#ec4899; text-decoration:none;">Approved Members &rarr;</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-6" style="margin-bottom: 20px;">
                                <div class="card card-block" style="padding: 20px; border-left: 4px solid #14b8a6; background: #fff; border-radius: 6px; box-shadow: 0 1px 3px rgba(0,0,0,0.08);">
                                    <div style="display:flex; justify-content:space-between; align-items:center;">
                                        <div>
                                            <div style="color:#6b7280; font-size:13px; text-transform:uppercase; font-weight:600;">Book Reviews</div>
                                            <div style="font-size:28px; font-weight:700; color:#111827; margin-top:4px;">{{ $stats['total_reviews'] ?? 0 }}</div>
                                        </div>
                                        <i class="fa fa-comments" style="font-size:32px; color:#14b8a6; opacity:0.8;"></i>
                                    </div>
                                    <div style="margin-top:10px; font-size:12px; color:#6b7280;">
                                        Reader feedback & ratings
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Recent Books & Recent Customers -->
                    <section class="section">
                        <div class="row">
                            <div class="col-md-7" style="margin-bottom: 20px;">
                                <div class="card" style="background:#fff; border-radius:6px; padding:20px; box-shadow: 0 1px 3px rgba(0,0,0,0.08);">
                                    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:15px;">
                                        <h4 style="margin:0; font-size:16px; font-weight:600;">Recent Books</h4>
                                        <a href="{{ route('book-list') }}" class="btn btn-sm btn-secondary">View All</a>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover" style="margin-bottom:0;">
                                            <thead>
                                                <tr>
                                                    <th>Cover</th>
                                                    <th>Name</th>
                                                    <th>Category</th>
                                                    <th>Type</th>
                                                    <th>Price</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($recentBooks as $book)
                                                    <tr>
                                                        <td>
                                                            <img src="{{ $book->book_cover ?? 'https://via.placeholder.com/40x55' }}" alt="" style="width:36px; height:48px; object-fit:cover; border-radius:4px;">
                                                        </td>
                                                        <td>
                                                            <strong>{{ $book->name }}</strong><br>
                                                            <small class="text-muted">{{ $book->author }}</small>
                                                        </td>
                                                        <td>{{ $book->category->categoryName ?? 'Uncategorized' }}</td>
                                                        <td>
                                                            <span class="badge" style="padding:3px 8px; border-radius:4px; font-size:11px; background:{{ strtolower($book->booktype) === 'free' ? '#10b981' : '#f59e0b' }}; color:#fff;">
                                                                {{ ucfirst($book->booktype ?? 'free') }}
                                                            </span>
                                                        </td>
                                                        <td>{{ number_format((float) preg_replace('/[^0-9.]/', '', (string) $book->price)) }} Ks</td>
                                                        <td>
                                                            <a href="/book-editor/{{ $book->id }}" class="btn btn-sm btn-primary">Edit</a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6" class="text-center text-muted">No books added yet.</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-5" style="margin-bottom: 20px;">
                                <div class="card" style="background:#fff; border-radius:6px; padding:20px; box-shadow: 0 1px 3px rgba(0,0,0,0.08);">
                                    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:15px;">
                                        <h4 style="margin:0; font-size:16px; font-weight:600;">Recent Customers</h4>
                                        <a href="{{ route('customer-list') }}" class="btn btn-sm btn-secondary">View All</a>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped" style="margin-bottom:0;">
                                            <thead>
                                                <tr>
                                                    <th>User</th>
                                                    <th>Status</th>
                                                    <th>Joined</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($recentUsers as $u)
                                                    <tr>
                                                        <td>
                                                            <strong>{{ $u->name }}</strong><br>
                                                            <small class="text-muted">{{ $u->email }}</small>
                                                        </td>
                                                        <td>
                                                            <span class="badge" style="padding:3px 8px; border-radius:4px; font-size:11px; background:{{ $u->is_premium ? '#10b981' : '#6b7280' }}; color:#fff;">
                                                                {{ $u->is_premium ? 'Premium' : 'Standard' }}
                                                            </span>
                                                        </td>
                                                        <td><small>{{ $u->created_at?->format('M d, Y') }}</small></td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="3" class="text-center text-muted">No customers registered yet.</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <script>
                        const logoutBtn = document.getElementById('logout-btn');
                        if (logoutBtn) {
                            logoutBtn.addEventListener('click', function() {
                                localStorage.removeItem("auth_token");
                                window.location.href = "/logout";
                            });
                        }
                    </script>
                </article>
                @include('component.fooder')
                <!-- /.modal -->
            </div>
        </div>
        @include('component.script')
    </body>

</html>
