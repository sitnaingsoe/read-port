<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>- Book Details</title>
  <style>
    :root {
      --bg: #0b1020;
      --card: #11162a;
      --muted: #8ea0b6;
      --text: #eaf2ff;
      --accent: #7aa2ff;
      --accent-2: #2dd4bf;
      --border: #1e2844;
      --shadow: 0 10px 30px rgba(0, 0, 0, 0.35);
    }
    * { box-sizing: border-box; }
    body {
      margin: 0;
      font-family: system-ui, -apple-system, Segoe UI, Roboto, Ubuntu, Cantarell, Noto Sans,
        "Helvetica Neue", Arial, "Apple Color Emoji", "Segoe UI Emoji";
      background: radial-gradient(1200px 600px at 10% -10%, rgba(122, 162, 255, 0.12), transparent 50%),
                  radial-gradient(1000px 800px at 110% 10%, rgba(45, 212, 191, 0.1), transparent 50%),
                  var(--bg);
      color: var(--text);
    }
    .book-container { max-width: 1100px; margin: 40px auto; padding: 24px; }
    .book-card {
      background: linear-gradient(180deg, rgba(255, 255, 255, 0.02), rgba(255, 255, 255, 0));
      border: 1px solid var(--border);
      border-radius: 20px;
      box-shadow: var(--shadow);
      overflow: hidden;
    }
    .book-header { display: grid; grid-template-columns: 240px 1fr; gap: 24px; align-items: stretch; padding: 24px; border-bottom: 1px solid var(--border); }
    .book-cover { width: 100%; aspect-ratio: 3/4; border-radius: 16px; overflow: hidden; background: #0e1430; border: 1px solid var(--border); display: flex; align-items: center; justify-content: center; }
    .book-cover img { width: 100%; height: 100%; object-fit: cover; display: block; }
    .book-title { font-size: clamp(24px, 2.6vw, 36px); line-height: 1.15; margin: 0; }
    .book-meta { color: var(--muted); margin-top: 6px; font-size: 14px; }
    .book-rating-summary { margin-top: 14px; display: flex; align-items: center; gap: 12px; }
    .book-stars { display: inline-flex; gap: 4px; }
    .book-star { width: 22px; height: 22px; display: inline-grid; place-items: center; cursor: default; }
    .book-star svg { width: 100%; height: 100%; fill: none; stroke: var(--muted); stroke-width: 1.5; }
    .book-star.filled svg path { fill: currentColor; stroke: currentColor; }
    .book-badge { padding: 6px 10px; border: 1px solid var(--border); border-radius: 999px; color: var(--muted); font-size: 12px; }
    .book-body { padding: 24px; display: grid; grid-template-columns: 1.25fr 0.85fr; gap: 28px; }
    .book-section-title { font-size: 16px; letter-spacing: 0.3px; color: var(--muted); margin: 0 0 8px; text-transform: uppercase; }
    .book-desc { background: rgba(255, 255, 255, 0.02); border: 1px solid var(--border); border-radius: 16px; padding: 16px; line-height: 1.6; }
    .book-reviews { background: rgba(255, 255, 255, 0.02); border: 1px solid var(--border); border-radius: 16px; }
    .book-reviews-header { display: flex; align-items: center; justify-content: space-between; padding: 14px 16px; border-bottom: 1px solid var(--border); }
    .book-reviews-list { list-style: none; margin: 0; padding: 0; max-height: 380px; overflow: auto; }
    .book-review { padding: 14px 16px; border-bottom: 1px dashed var(--border); }
    .book-review:last-child { border-bottom: 0; }
    .book-review .name { font-weight: 600; }
    .book-review .date { color: var(--muted); font-size: 12px; margin-left: 8px; }
    .book-review .text { margin-top: 6px; color: #d7e3f7; }
    .book-form { background: rgba(255,255,255,0.02); border:1px solid var(--border); border-radius:16px; padding:16px; display:grid; gap:12px; margin-top:20px; }
    .book-form .row { display:grid; gap:10px; }
    .book-form label { font-size:14px; color:var(--muted); }
    .book-form input[type="text"], .book-form textarea { width:100%; padding:10px 12px; border-radius:12px; border:1px solid var(--border); background:#0d1328; color:var(--text); }
    .book-form textarea { min-height:90px; resize:vertical; }
    .book-rate-input { display:flex; gap:8px; align-items:center; }
    .book-rate-star { width:28px; height:28px; cursor:pointer; color:#6c7ca1; }
    .book-rate-star.active { color:#f1c40f; }
    .book-actions { display:flex; gap:10px; justify-content:flex-end; }
    button { border:1px solid var(--border); padding:10px 14px; border-radius:12px; cursor:pointer; background:#121938; color:var(--text); font-weight:600; box-shadow:var(--shadow); }
    button.primary { background:linear-gradient(135deg, var(--accent), var(--accent-2)); border:0; }
    button:disabled { opacity:0.6; cursor:not-allowed; }
    @media (max-width:900px) { .book-header { grid-template-columns:1fr; } .book-body { grid-template-columns:1fr; } }
  </style>
</head>

@include('component.user-head')   
@include('component.user-header')

<body style="color: white">
<div class="book-container">
  <div class="book-card" role="article" aria-labelledby="book-title">
    <div class="book-header">
      <div class="book-cover" aria-hidden="true">
        <img src="{{ $book->book_cover ?? 'https://images.unsplash.com/photo-1544947950-fa07a98d237f?q=80&w=640&auto=format&fit=crop' }}" alt="Book cover" />
      </div>
      <div>
        <h1 id="book-title" class="book-title">{{ $book->name }}</h1>
        <div class="book-meta">by {{ $book->author ?? 'Unknown Author' }} · {{ $book->pages ?? 'N/A' }} pages</div>
        <div class="book-rating-summary" aria-live="polite">
          <div class="book-stars" id="book-avg-stars" aria-label="Average rating"></div>
          <div id="book-avg-score" class="book-badge">{{ number_format($averageRating,1) }} / 5</div>
          <div id="book-rating-count" class="book-badge">{{ $book->reviews->count() }} review{{ $book->reviews->count() === 1 ? '' : 's' }}</div>
        </div>
        <div style="margin-top:16px; display:flex; gap:10px; flex-wrap:wrap;">
          <span class="book-badge">{{ $book->booktype }}</span>
          <span class="book-badge">Save</span>
          <span class="book-badge"> <a href="{{ $book->file }}">Read</a></span>
        </div>
      </div>
    </div>

    <div class="book-body">
      <section>
        <h2 class="book-section-title">Description</h2>
        <div class="book-desc">{{ $book->description }}</div>

        <h2 class="book-section-title" style="margin-top:20px;">Add a Review</h2>   
              
              <form class="book-form" method="POST" action='{{ route('reviews.store') }}'>
                @csrf
                <div class="row">
                    <label>Rating</label>
                    <div class="book-rate-input" id="book-rate-input" role="radiogroup"></div>
                    <input type="hidden" name="rating" id="book-rating-value" required />
                </div>
                <input type="hidden" name="book_id" value="{{ $book->id }}">
                <div class="row">
                  <label for="book-comment">Your Review</label>
                  <textarea id="book-comment" name="comment" placeholder="What did you think?" required></textarea>
                 </div>
                  <div class="book-actions">
                  <button type="reset">Clear</button>
                  <button class="primary">Submit Review</button>
              </div>
            </form>

      </section>

      <aside>
        <div class="book-reviews" aria-labelledby="book-reviews-title">
          <div class="book-reviews-header">
            <h2 id="book-reviews-title" class="book-section-title" style="margin:0">Reviews</h2>
          </div>
          <ul id="book-reviews-list" class="book-reviews-list">
            @forelse($book->reviews as $review)
              <li class="book-review">
                <div>
                  <span class="name">{{ $review->user->name ?? $review->name ?? 'Anonymous' }}</span>
                  <span class="date">· {{ $review->created_at->format('M d, Y') }}</span>
                </div>
                <div class="book-stars">
                  @for($i=1;$i<=5;$i++)
                    <span class="book-star {{ $i <= $review->rating ? 'filled' : '' }}">
                      <svg viewBox="0 0 24 24"><path d="M12 2.5l2.9 6 6.6.9-4.8 4.7 1.1 6.6L12 17.9 6.3 20.7l1.1-6.6L2.6 9.4l6.6-.9L12 2.5z"/></svg>
                    </span>
                  @endfor
                </div>
                <div class="text">{{ $review->comment }}</div>
              </li>
            @empty
              <li class="book-review">No reviews yet.</li>
            @endforelse
          </ul>
        </div>
      </aside>
    </div>
  </div>
</div>

<template id="book-star-template">
  <span class="book-star" aria-hidden="true">
    <svg viewBox="0 0 24 24" aria-hidden="true">
      <path d="M12 2.5l2.9 6 6.6.9-4.8 4.7 1.1 6.6L12 17.9 6.3 20.7l1.1-6.6L2.6 9.4l6.6-.9L12 2.5z"/>
    </svg>
  </span>
</template>

<template id="book-rate-star-template">
  <button type="button" class="book-rate-star" role="radio" aria-checked="false" aria-label="1 star">
    <svg viewBox="0 0 24 24" width="100%" height="100%">
      <path d="M12 2.5l2.9 6 6.6.9-4.8 4.7 1.1 6.6L12 17.9 6.3 20.7l1.1-6.6L2.6 9.4l6.6-.9L12 2.5z" fill="currentColor"/>
    </svg>
  </button>
</template>

<script>
  // Average stars
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

  // Interactive rating input
  const holder = document.getElementById('book-rate-input');
  holder.innerHTML = '';
  const tpl = document.getElementById('book-rate-star-template');
  let current = 0;
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
