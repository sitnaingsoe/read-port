<!DOCTYPE html>
<html lang="en">
@include('component.user-head')
<style>
  :root {
    --bg: #2b2b31;
    --card: #28282d;
    --muted: #9ca3af;
    --text: #f9fafb;
    --accent: #ff55a5;
    --accent-2: #1aafff;
    --border: rgba(255, 255, 255, 0.08);
    --shadow: 0 15px 35px rgba(0, 0, 0, 0.4);
  }
  .book-detail-wrap {
    padding: 110px 0 60px;
    background: radial-gradient(1200px 600px at 10% -10%, rgba(255, 85, 165, 0.12), transparent 50%),
                radial-gradient(1000px 800px at 110% 10%, rgba(26, 175, 255, 0.1), transparent 50%),
                var(--bg);
    color: var(--text);
    min-height: calc(100vh - 160px);
  }
  .book-container { max-width: 1140px; margin: 0 auto; padding: 0 16px; }
  .book-card {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: 20px;
    box-shadow: var(--shadow);
    overflow: hidden;
  }
  .book-header { display: grid; grid-template-columns: 240px 1fr; gap: 28px; align-items: stretch; padding: 28px; border-bottom: 1px solid var(--border); }
  .book-cover { width: 100%; aspect-ratio: 2/3; border-radius: 14px; overflow: hidden; background: #1f1f24; border: 1px solid var(--border); box-shadow: 0 10px 25px rgba(0,0,0,0.4); }
  .book-cover img { width: 100%; height: 100%; object-fit: cover; display: block; }
  .book-title { font-size: clamp(24px, 2.6vw, 34px); line-height: 1.2; margin: 0; font-weight: 700; color: #fff; }
  .book-meta { color: var(--muted); margin-top: 8px; font-size: 14.5px; }
  .book-rating-summary { margin-top: 16px; display: flex; align-items: center; gap: 12px; flex-wrap: wrap; }
  .book-stars { display: inline-flex; gap: 4px; color: #fbbf24; }
  .book-star { width: 20px; height: 20px; display: inline-grid; place-items: center; }
  .book-star svg { width: 100%; height: 100%; fill: none; stroke: var(--muted); stroke-width: 1.5; }
  .book-star.filled svg path { fill: #fbbf24; stroke: #fbbf24; }
  .book-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 7px 14px;
    border: 1px solid var(--border);
    border-radius: 999px;
    color: var(--text);
    font-size: 12.5px;
    font-weight: 600;
    background: rgba(255, 255, 255, 0.05);
  }
  .book-body { padding: 28px; display: grid; grid-template-columns: 1.25fr 0.85fr; gap: 28px; }
  .book-section-title { font-size: 15px; letter-spacing: 0.5px; color: var(--muted); margin: 0 0 10px; text-transform: uppercase; font-weight: 700; }
  .book-desc { background: rgba(255, 255, 255, 0.03); border: 1px solid var(--border); border-radius: 14px; padding: 18px; line-height: 1.7; font-size: 15px; color: rgba(255,255,255,0.88); }
  .book-reviews { background: rgba(255, 255, 255, 0.03); border: 1px solid var(--border); border-radius: 16px; }
  .book-reviews-header { display: flex; align-items: center; justify-content: space-between; padding: 14px 18px; border-bottom: 1px solid var(--border); }
  .book-reviews-list { list-style: none; margin: 0; padding: 0; max-height: 420px; overflow: auto; }
  .book-review { padding: 14px 18px; border-bottom: 1px dashed var(--border); }
  .book-review:last-child { border-bottom: 0; }
  .book-review .name { font-weight: 700; color: #fff; }
  .book-review .date { color: var(--muted); font-size: 12px; margin-left: 8px; }
  .book-review .text { margin-top: 6px; color: #d1d5db; font-size: 14px; line-height: 1.5; }
  .book-form { background: rgba(255,255,255,0.03); border:1px solid var(--border); border-radius:16px; padding:18px; display:grid; gap:14px; margin-top:24px; }
  .book-form .row { display:grid; gap:8px; margin:0; }
  .book-form label { font-size:13.5px; color:var(--muted); font-weight:600; }
  .book-form textarea { width:100%; padding:12px 14px; border-radius:12px; border:1px solid var(--border); background:#1f1f24; color:var(--text); min-height:95px; resize:vertical; }
  .book-rate-input { display:flex; gap:8px; align-items:center; }
  .book-rate-star { width:30px; height:30px; cursor:pointer; color:#6b7280; background:transparent; border:0; padding:0; }
  .book-rate-star.active { color:#fbbf24; }
  .book-actions { display:flex; gap:10px; justify-content:flex-end; }
  .rp-action-btn {
    border: 1px solid var(--border);
    padding: 10px 18px;
    border-radius: 10px;
    cursor: pointer;
    background: rgba(255,255,255,0.06);
    color: #fff;
    font-weight: 600;
    font-size: 13px;
    text-decoration: none !important;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.2s ease;
  }
  .rp-action-btn.primary {
    background: linear-gradient(90deg, #1aafff 0%, #1f41da 100%);
    border: 0;
    box-shadow: 0 6px 16px rgba(26, 175, 255, 0.3);
  }
  .rp-reader-panel {
    display: none;
    padding: 24px 28px;
    border-bottom: 1px solid var(--border);
    background: #1f1f24;
  }
  .rp-reader-panel.open {
    display: block;
  }
  .rp-pdf-frame {
    width: 100%;
    height: 640px;
    border-radius: 12px;
    border: 1px solid var(--border);
    background: #111827;
  }
  @media (max-width:900px) { .book-header { grid-template-columns:1fr; } .book-body { grid-template-columns:1fr; } }
</style>

<body class="body">
@include('vendor.sweetalert.alert')
@include('component.user-header')

<div class="book-detail-wrap">
  <div class="book-container">
    <div style="margin-bottom: 16px;">
      <a href="{{ route('home') }}" style="color: rgba(255,255,255,0.65); text-decoration: none; font-size: 14px;">
        <i class="fas fa-arrow-left" style="margin-right: 6px;"></i> Back to Catalog
      </a>
    </div>

    <div class="book-card" role="article" aria-labelledby="book-title">
      <div class="book-header">
        <div class="book-cover" aria-hidden="true">
          <img
            src="{{ $book->book_cover ?? 'https://images.unsplash.com/photo-1544947950-fa07a98d237f?q=80&w=640&auto=format&fit=crop' }}"
            alt="{{ $book->name }}"
            onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1544947950-fa07a98d237f?q=80&w=640&auto=format&fit=crop';"
          />
        </div>
        <div>
          @php
            $isPremiumBook = in_array(strtolower($book->booktype ?? ''), ['premiun', 'premium']);
          @endphp
          <div style="display:flex; gap:8px; margin-bottom:10px; flex-wrap:wrap;">
            <span class="book-badge" style="background: {{ $isPremiumBook ? 'linear-gradient(90deg, #f59e0b, #fbbf24)' : 'rgba(16, 185, 129, 0.2)' }}; color: {{ $isPremiumBook ? '#111827' : '#6ee7b7' }}; border:0;">
              @if($isPremiumBook) <i class="fas fa-crown"></i> Premium Book @else Free Book @endif
            </span>
            @if($book->category)
              <span class="book-badge">{{ $book->category->categoryName }}</span>
            @endif
            <span class="book-badge">{{ number_format((float) preg_replace('/[^0-9.]/', '', (string) $book->price)) }} MMK</span>
          </div>

          <h1 id="book-title" class="book-title">{{ $book->name }}</h1>
          <div class="book-meta">by <strong style="color:#ff55a5;">{{ $book->author ?? 'Unknown Author' }}</strong></div>

          <div class="book-rating-summary" aria-live="polite">
            <div class="book-stars" id="book-avg-stars" aria-label="Average rating"></div>
            <div id="book-avg-score" class="book-badge">{{ number_format($averageRating ?? 0, 1) }} / 5</div>
            <div id="book-rating-count" class="book-badge">{{ $book->reviews->count() }} review{{ $book->reviews->count() === 1 ? '' : 's' }}</div>
          </div>

          <div style="margin-top:22px; display:flex; gap:12px; flex-wrap:wrap; align-items:center;">
            @auth
              @php
                $isSaved = Auth::user()->savedBooks()->where('book_id', $book->id)->exists();
                $canRead = !$isPremiumBook || Auth::user()->is_premium || Auth::user()->usertype === 'admin';
                $pdfUrl = ($book->file && $book->file !== '#') ? $book->file : asset('sample-book.pdf');
              @endphp

              @if($canRead)
                <button type="button" class="rp-action-btn primary" onclick="togglePdfReader()">
                  <i class="fas fa-book-open"></i> Read in Browser
                </button>
                <a href="{{ $pdfUrl }}" download class="rp-action-btn">
                  <i class="fas fa-download"></i> Download PDF
                </a>
              @else
                <a href="{{ route('upload.form') }}" class="rp-action-btn" style="background:linear-gradient(90deg, #f59e0b, #d97706); border:0;">
                  <i class="fas fa-crown"></i> Upgrade to Premium to Read
                </a>
              @endif

              <form action="{{ route('books.save', $book->id) }}" method="POST" style="margin:0;">
                @csrf
                <button type="submit" class="rp-action-btn" style="background:{{ $isSaved ? 'rgba(16, 185, 129, 0.2)' : 'rgba(255,255,255,0.06)' }}; border-color:{{ $isSaved ? '#10b981' : 'var(--border)' }}; color:{{ $isSaved ? '#6ee7b7' : '#fff' }};">
                  <i class="{{ $isSaved ? 'fas' : 'far' }} fa-bookmark"></i> {{ $isSaved ? 'Saved in Library' : 'Save Book' }}
                </button>
              </form>
            @else
              <a href="{{ route('login') }}" class="rp-action-btn primary">
                <i class="fas fa-sign-in-alt"></i> Sign In to Read or Save
              </a>
            @endauth
          </div>
        </div>
      </div>

      {{-- Built-in PDF Reader Drawer --}}
      @auth
        @if($canRead)
          <div id="rp-reader-panel" class="rp-reader-panel">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:14px;">
              <h3 style="margin:0; font-size:17px; color:#fff;">
                <i class="fas fa-book-reader" style="color:#ff55a5; margin-right:8px;"></i> Reading: {{ $book->name }}
              </h3>
              <div style="display:flex; gap:10px;">
                <a href="{{ $pdfUrl }}" target="_blank" class="rp-action-btn" style="padding:6px 12px; font-size:12px;">
                  <i class="fas fa-expand"></i> Full Screen Tab
                </a>
                <button type="button" class="rp-action-btn" style="padding:6px 12px; font-size:12px;" onclick="togglePdfReader()">
                  <i class="fas fa-times"></i> Close Reader
                </button>
              </div>
            </div>
            <iframe src="{{ $pdfUrl }}" class="rp-pdf-frame" title="PDF Reader"></iframe>
          </div>
        @endif
      @endauth

      <div class="book-body">
        <section>
          <h2 class="book-section-title">About This Book</h2>
          <div class="book-desc">{{ $book->description }}</div>

          <h2 class="book-section-title" style="margin-top:26px;">Write a Review</h2>
          <form class="book-form" method="POST" action="{{ route('reviews.store') }}">
            @csrf
            <div class="row">
              <label>Your Rating (1 to 5 Stars)</label>
              <div class="book-rate-input" id="book-rate-input" role="radiogroup"></div>
              <input type="hidden" name="rating" id="book-rating-value" value="5" required />
            </div>
            <input type="hidden" name="book_id" value="{{ $book->id }}">
            <div class="row">
              <label for="book-comment">Your Review</label>
              <textarea id="book-comment" name="comment" placeholder="Share your thoughts on this book..." required></textarea>
            </div>
            <div class="book-actions">
              <button type="reset" class="rp-action-btn">Clear</button>
              <button type="submit" class="rp-action-btn primary">Submit Review</button>
            </div>
          </form>
        </section>

        <aside>
          <div class="book-reviews" aria-labelledby="book-reviews-title">
            <div class="book-reviews-header">
              <h2 id="book-reviews-title" class="book-section-title" style="margin:0">Reader Reviews ({{ $book->reviews->count() }})</h2>
            </div>
            <ul id="book-reviews-list" class="book-reviews-list">
              @forelse($book->reviews as $review)
                <li class="book-review">
                  <div>
                    <span class="name">{{ $review->user->name ?? 'Anonymous' }}</span>
                    <span class="date">&middot; {{ $review->created_at?->format('M d, Y') }}</span>
                  </div>
                  <div class="book-stars" style="margin-top:4px;">
                    @for($i=1;$i<=5;$i++)
                      <span class="book-star {{ $i <= $review->rating ? 'filled' : '' }}">
                        <svg viewBox="0 0 24 24"><path d="M12 2.5l2.9 6 6.6.9-4.8 4.7 1.1 6.6L12 17.9 6.3 20.7l1.1-6.6L2.6 9.4l6.6-.9L12 2.5z"/></svg>
                      </span>
                    @endfor
                  </div>
                  <div class="text">{{ $review->comment }}</div>
                </li>
              @empty
                <li class="book-review" style="color:var(--muted); text-align:center; padding:30px 16px;">
                  No reviews yet. Be the first to review this book!
                </li>
              @endforelse
            </ul>
          </div>
        </aside>
      </div>
    </div>
  </div>
</div>

@include('component.user-fooder')
@include('component.user-js')

<template id="book-star-template">
  <span class="book-star" aria-hidden="true">
    <svg viewBox="0 0 24 24" aria-hidden="true">
      <path d="M12 2.5l2.9 6 6.6.9-4.8 4.7 1.1 6.6L12 17.9 6.3 20.7l1.1-6.6L2.6 9.4l6.6-.9L12 2.5z"/>
    </svg>
  </span>
</template>

<template id="book-rate-star-template">
  <button type="button" class="book-rate-star active" role="radio" aria-checked="true" aria-label="star">
    <svg viewBox="0 0 24 24" width="100%" height="100%">
      <path d="M12 2.5l2.9 6 6.6.9-4.8 4.7 1.1 6.6L12 17.9 6.3 20.7l1.1-6.6L2.6 9.4l6.6-.9L12 2.5z" fill="currentColor"/>
    </svg>
  </button>
</template>

<script>
  function togglePdfReader() {
    var panel = document.getElementById('rp-reader-panel');
    if (panel) {
      panel.classList.toggle('open');
      if (panel.classList.contains('open')) {
        panel.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    }
  }

  function createStars(container, value, outOf = 5){
    container.innerHTML = '';
    const tpl = document.getElementById('book-star-template');
    for(let i=1;i<=outOf;i++){
      const n = tpl.content.firstElementChild.cloneNode(true);
      if(i<=Math.round(value)) n.classList.add('filled');
      container.appendChild(n);
    }
  }
  createStars(document.getElementById('book-avg-stars'), {{ $averageRating ?? 0 }});

  const holder = document.getElementById('book-rate-input');
  holder.innerHTML = '';
  const tpl = document.getElementById('book-rate-star-template');
  let current = 5;
  const buttons = [];
  for(let i=1;i<=5;i++){
    const b = tpl.content.firstElementChild.cloneNode(true);
    b.addEventListener('click',()=>{
      current=i;
      buttons.forEach((btn,idx)=>btn.classList.toggle('active',idx<current));
      document.getElementById('book-rating-value').value = current;
    });
    buttons.push(b);
    holder.appendChild(b);
  }
</script>
</body>
</html>
