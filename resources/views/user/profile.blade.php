<!DOCTYPE html>
<html lang="en">
@include('component.user-head')
<style>
  .rp-profile-wrap {
    min-height: calc(100vh - 160px);
    padding: 110px 0 60px;
    background: radial-gradient(1200px 600px at 10% -10%, rgba(26, 175, 255, 0.14), transparent 50%),
                radial-gradient(1000px 800px at 90% 10%, rgba(31, 65, 218, 0.12), transparent 50%),
                #2b2b31;
    color: #fff;
    font-family: 'Open Sans', sans-serif;
  }
  .rp-hero-card {
    background: #28282d;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.35);
    border: 1px solid rgba(255, 255, 255, 0.06);
    margin-bottom: 30px;
  }
  .rp-hero-banner {
    height: 130px;
    background: linear-gradient(90deg, #1aafff 0%, #1f41da 100%);
    position: relative;
  }
  .rp-hero-body {
    padding: 0 30px 28px;
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 20px;
    margin-top: -50px;
  }
  .rp-user-main {
    display: flex;
    align-items: flex-end;
    gap: 22px;
    flex-wrap: wrap;
  }
  .rp-avatar-box {
    width: 108px;
    height: 108px;
    border-radius: 50%;
    border: 4px solid #28282d;
    background: linear-gradient(135deg, #1aafff, #1f41da);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 40px;
    font-weight: 700;
    color: #fff;
    position: relative;
  }
  .rp-avatar-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  .rp-user-details h1 {
    font-size: 26px;
    font-weight: 700;
    margin: 0 0 6px;
    color: #fff;
    display: flex;
    align-items: center;
    gap: 12px;
    flex-wrap: wrap;
  }
  .rp-badge-premium {
    font-size: 12px;
    padding: 4px 12px;
    border-radius: 999px;
    background: linear-gradient(90deg, #f59e0b, #fbbf24);
    color: #111827;
    font-weight: 700;
    letter-spacing: 0.4px;
  }
  .rp-badge-standard {
    font-size: 12px;
    padding: 4px 12px;
    border-radius: 999px;
    background: rgba(255, 255, 255, 0.1);
    color: #d1d5db;
    font-weight: 600;
  }
  .rp-badge-pending {
    font-size: 12px;
    padding: 4px 12px;
    border-radius: 999px;
    background: rgba(245, 158, 11, 0.2);
    border: 1px solid #f59e0b;
    color: #fbbf24;
    font-weight: 600;
  }
  .rp-user-meta {
    color: rgba(255, 255, 255, 0.65);
    font-size: 14px;
    margin: 0;
  }
  .rp-hero-actions {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
  }
  .rp-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 18px;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    text-decoration: none !important;
    border: none;
    cursor: pointer;
    transition: all 0.2s ease;
  }
  .rp-btn-gradient {
    background: linear-gradient(90deg, #1aafff 0%, #1f41da 100%);
    color: #fff !important;
    box-shadow: 0 6px 16px rgba(26, 175, 255, 0.3);
  }
  .rp-btn-gradient:hover {
    opacity: 0.92;
    transform: translateY(-1px);
  }
  .rp-btn-gold {
    background: linear-gradient(90deg, #f59e0b 0%, #d97706 100%);
    color: #fff !important;
    box-shadow: 0 6px 16px rgba(245, 158, 11, 0.3);
  }
  .rp-btn-outline {
    background: rgba(255, 255, 255, 0.07);
    color: #fff !important;
    border: 1px solid rgba(255, 255, 255, 0.14);
  }
  .rp-btn-outline:hover {
    background: rgba(255, 255, 255, 0.14);
  }
  .rp-btn-danger {
    background: rgba(239, 68, 68, 0.16);
    color: #fca5a5 !important;
    border: 1px solid rgba(239, 68, 68, 0.35);
  }
  .rp-btn-danger:hover {
    background: #ef4444;
    color: #fff !important;
  }
  .rp-stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin-bottom: 35px;
  }
  .rp-stat-card {
    background: #28282d;
    border: 1px solid rgba(255, 255, 255, 0.06);
    border-radius: 14px;
    padding: 20px 24px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
  }
  .rp-stat-label {
    color: rgba(255, 255, 255, 0.55);
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    margin-bottom: 4px;
  }
  .rp-stat-value {
    font-size: 26px;
    font-weight: 700;
    color: #fff;
  }
  .rp-stat-icon {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
  }
  .rp-section-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 18px;
    padding-bottom: 12px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.08);
  }
  .rp-section-title {
    font-size: 20px;
    font-weight: 700;
    margin: 0;
    color: #fff;
    display: flex;
    align-items: center;
    gap: 10px;
  }
  .rp-books-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(190px, 1fr));
    gap: 22px;
    margin-bottom: 40px;
  }
  .rp-book-item {
    background: #28282d;
    border: 1px solid rgba(255, 255, 255, 0.06);
    border-radius: 12px;
    overflow: hidden;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    display: flex;
    flex-direction: column;
  }
  .rp-book-item:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.4);
  }
  .rp-book-cover {
    width: 100%;
    aspect-ratio: 3/4;
    overflow: hidden;
    background: #1f1f24;
    position: relative;
  }
  .rp-book-cover img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  .rp-book-body {
    padding: 14px;
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }
  .rp-book-title {
    font-size: 15px;
    font-weight: 600;
    color: #fff;
    margin: 0 0 4px;
    text-decoration: none;
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }
  .rp-book-author {
    font-size: 12px;
    color: #ff55a5;
    margin-bottom: 10px;
  }
  .rp-book-footer {
    display: flex;
    gap: 8px;
    margin-top: 8px;
  }
  .rp-reviews-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
  }
  .rp-review-card {
    background: #28282d;
    border: 1px solid rgba(255, 255, 255, 0.06);
    border-radius: 12px;
    padding: 18px;
  }
  .rp-review-top {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 10px;
  }
  .rp-review-book {
    font-size: 16px;
    font-weight: 600;
    color: #fff;
    text-decoration: none;
  }
  .rp-review-book:hover {
    color: #ff55a5;
  }
  .rp-stars {
    color: #fbbf24;
    font-size: 14px;
    letter-spacing: 2px;
  }
  .rp-empty-box {
    background: #28282d;
    border: 1px dashed rgba(255, 255, 255, 0.14);
    border-radius: 14px;
    padding: 36px 24px;
    text-align: center;
    margin-bottom: 40px;
  }
  .rp-empty-box i {
    font-size: 36px;
    color: rgba(255, 255, 255, 0.25);
    margin-bottom: 12px;
  }
  .rp-empty-box p {
    color: rgba(255, 255, 255, 0.6);
    margin: 0 0 16px;
  }
  /* Edit drawer */
  .rp-edit-panel {
    display: none;
    background: #28282d;
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 14px;
    padding: 24px;
    margin-bottom: 30px;
  }
  .rp-edit-panel.active {
    display: block;
  }
  .rp-input {
    width: 100%;
    height: 44px;
    border-radius: 8px;
    background: #2b2b31;
    border: 1px solid rgba(255, 255, 255, 0.12);
    padding: 0 14px;
    color: #fff;
    font-size: 14px;
  }
</style>

<body class="body">
  @include('vendor.sweetalert.alert')
  @include('component.user-header')

  <div class="rp-profile-wrap">
    <div class="container">

      @if(session('success'))
        <div style="background: rgba(16, 185, 129, 0.18); border: 1px solid #10b981; color: #6ee7b7; padding: 12px 18px; border-radius: 10px; margin-bottom: 20px;">
          <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
      @endif

      {{-- Hero Profile Card --}}
      <div class="rp-hero-card">
        <div class="rp-hero-banner"></div>
        <div class="rp-hero-body">
          <div class="rp-user-main">
            <div class="rp-avatar-box">
              @if($user->avatar)
                <img src="{{ $user->avatar }}" alt="{{ $user->name }}">
              @else
                {{ strtoupper(substr($user->name, 0, 1)) }}
              @endif
            </div>
            <div class="rp-user-details">
              <h1>
                {{ $user->name }}
                @if($user->is_premium)
                  <span class="rp-badge-premium"><i class="fas fa-crown"></i> PREMIUM MEMBER</span>
                @else
                  <span class="rp-badge-standard">STANDARD MEMBER</span>
                @endif
                @if(!empty($pendingPremium) && !$user->is_premium)
                  <span class="rp-badge-pending"><i class="fas fa-clock"></i> Approval Pending</span>
                @endif
              </h1>
              <p class="rp-user-meta" id="welcome-message">
                <i class="fas fa-envelope" style="margin-right:6px;"></i> {{ $user->email }}
                &nbsp;&middot;&nbsp;
                <i class="fas fa-calendar-alt" style="margin-right:6px;"></i> Joined {{ $user->created_at?->format('M d, Y') }}
              </p>
            </div>
          </div>

          <div class="rp-hero-actions">
            <button type="button" class="rp-btn rp-btn-outline" onclick="document.getElementById('edit-profile-panel').classList.toggle('active')">
              <i class="fas fa-user-edit"></i> Edit Profile
            </button>
            @if(!$user->is_premium)
              <a href="{{ route('upload.form') }}" class="rp-btn rp-btn-gold">
                <i class="fas fa-crown"></i> Upgrade Premium
              </a>
            @endif
            <a href="{{ route('home') }}" class="rp-btn rp-btn-gradient">
              <i class="fas fa-book-open"></i> Browse Books
            </a>
            <button type="button" id="logout-btn" class="rp-btn rp-btn-danger">
              <i class="fas fa-sign-out-alt"></i> Logout
            </button>
          </div>
        </div>
      </div>

      {{-- Collapsible Edit Profile Panel --}}
      <div id="edit-profile-panel" class="rp-edit-panel">
        <h3 style="margin: 0 0 16px; font-size: 18px; color: #fff;">Edit Profile & Photo</h3>
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-12 col-md-5" style="margin-bottom: 14px;">
              <label style="display:block; font-size:13px; color:rgba(255,255,255,0.7); margin-bottom:6px;">Display Name</label>
              <input type="text" name="name" class="rp-input" value="{{ $user->name }}" required>
            </div>
            <div class="col-12 col-md-5" style="margin-bottom: 14px;">
              <label style="display:block; font-size:13px; color:rgba(255,255,255,0.7); margin-bottom:6px;">Profile Photo (Avatar)</label>
              <input type="file" name="avatar" class="rp-input" accept="image/*" style="padding-top:8px;">
            </div>
            <div class="col-12 col-md-2" style="margin-bottom: 14px; display:flex; align-items:flex-end;">
              <button type="submit" class="rp-btn rp-btn-gradient" style="width:100%; justify-content:center; height:44px;">Save</button>
            </div>
          </div>
        </form>
      </div>

      {{-- Stats Row --}}
      <div class="rp-stats-grid">
        <div class="rp-stat-card">
          <div>
            <div class="rp-stat-label">Saved Books</div>
            <div class="rp-stat-value">{{ $user->savedBooks->count() }}</div>
          </div>
          <div class="rp-stat-icon" style="background: rgba(255, 85, 165, 0.15); color: #ff55a5;">
            <i class="fas fa-bookmark"></i>
          </div>
        </div>

        <div class="rp-stat-card">
          <div>
            <div class="rp-stat-label">My Reviews</div>
            <div class="rp-stat-value">{{ $user->reviews->count() }}</div>
          </div>
          <div class="rp-stat-icon" style="background: rgba(26, 175, 255, 0.15); color: #1aafff;">
            <i class="fas fa-star"></i>
          </div>
        </div>

        <div class="rp-stat-card">
          <div>
            <div class="rp-stat-label">Account Plan</div>
            <div class="rp-stat-value" style="font-size: 20px; color: {{ $user->is_premium ? '#fbbf24' : '#e5e7eb' }};">
              {{ $user->is_premium ? 'Premium Access' : 'Standard Free' }}
            </div>
          </div>
          <div class="rp-stat-icon" style="background: rgba(245, 158, 11, 0.15); color: #fbbf24;">
            <i class="fas fa-crown"></i>
          </div>
        </div>
      </div>

      {{-- Saved Books --}}
      <div class="rp-section-header">
        <h2 class="rp-section-title">
          <i class="fas fa-bookmark" style="color: #ff55a5;"></i> Saved Books
        </h2>
        <a href="{{ route('home') }}" style="color: #1aafff; font-size: 13px; text-decoration: none;">Explore More Books &rarr;</a>
      </div>

      @if($user->savedBooks->count() > 0)
        <div class="rp-books-grid">
          @foreach($user->savedBooks as $book)
            <div class="rp-book-item">
              <a href="{{ route('books.show', $book->id) }}" class="rp-book-cover">
                <img src="{{ $book->book_cover ?? 'https://images.unsplash.com/photo-1544947950-fa07a98d237f?q=80&w=640&auto=format&fit=crop' }}" alt="{{ $book->name }}">
              </a>
              <div class="rp-book-body">
                <div>
                  <a href="{{ route('books.show', $book->id) }}" class="rp-book-title">{{ $book->name }}</a>
                  <div class="rp-book-author">{{ $book->author }}</div>
                </div>
                <div class="rp-book-footer">
                  <a href="{{ route('books.show', $book->id) }}" class="rp-btn rp-btn-gradient" style="flex:1; justify-content:center; padding:7px 10px; font-size:11px;">
                    View
                  </a>
                  <form action="{{ route('books.save', $book->id) }}" method="POST" style="margin:0;">
                    @csrf
                    <button type="submit" class="rp-btn rp-btn-danger" style="padding:7px 10px; font-size:11px;" title="Remove from Saved">
                      <i class="fas fa-trash"></i>
                    </button>
                  </form>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      @else
        <div class="rp-empty-box">
          <i class="fas fa-book-reader"></i>
          <p>You haven't saved any books to your reading list yet.</p>
          <a href="{{ route('home') }}" class="rp-btn rp-btn-gradient">
            <i class="fas fa-compass"></i> Discover Books
          </a>
        </div>
      @endif

      {{-- My Reviews --}}
      <div class="rp-section-header">
        <h2 class="rp-section-title">
          <i class="fas fa-pen-fancy" style="color: #1aafff;"></i> My Reviews
        </h2>
      </div>

      @if($user->reviews->count() > 0)
        <div class="rp-reviews-grid">
          @foreach($user->reviews as $review)
            <div class="rp-review-card">
              <div class="rp-review-top">
                <a href="{{ $review->book ? route('books.show', $review->book->id) : '#' }}" class="rp-review-book">
                  {{ $review->book->name ?? 'Book' }}
                </a>
                <div class="rp-stars">
                  @for ($i = 1; $i <= 5; $i++)
                    <span>{{ $i <= $review->rating ? '★' : '☆' }}</span>
                  @endfor
                </div>
              </div>
              <p style="color: rgba(255,255,255,0.78); font-size: 14px; line-height: 1.6; margin: 0 0 10px;">
                {{ $review->comment }}
              </p>
              <small style="color: rgba(255,255,255,0.45); font-size: 12px;">
                Reviewed on {{ $review->created_at?->format('M d, Y') }}
              </small>
            </div>
          @endforeach
        </div>
      @else
        <div class="rp-empty-box" style="margin-bottom: 0;">
          <i class="fas fa-comment-dots"></i>
          <p>You haven't written any book reviews yet. Share your thoughts after reading a book!</p>
        </div>
      @endif

    </div>
  </div>

  @include('component.user-fooder')
  @include('component.user-js')

  <script>
    const logoutBtn = document.getElementById('logout-btn');
    if (logoutBtn) {
      logoutBtn.addEventListener('click', function() {
        localStorage.removeItem("auth_token");
        window.location.href = "/logout";
      });
    }
  </script>
</body>
</html>
