<!-- resources/views/books/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
    
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $book->title }} - Book Details</title>
    <style>
      /* --- Your full CSS from template --- */
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
        background: radial-gradient(
            1200px 600px at 10% -10%,
            rgba(122, 162, 255, 0.12),
            transparent 50%
          ),
          radial-gradient(1000px 800px at 110% 10%, rgba(45, 212, 191, 0.1), transparent 50%),
          var(--bg);
        color: var(--text);
      }
      .container { max-width: 1100px; margin: 40px auto; padding: 24px; }
      .card {
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.02), rgba(255, 255, 255, 0));
        border: 1px solid var(--border);
        border-radius: 20px;
        box-shadow: var(--shadow);
        overflow: hidden;
      }
      .header { display: grid; grid-template-columns: 240px 1fr; gap: 24px; align-items: stretch; padding: 24px; border-bottom: 1px solid var(--border); }
      .cover { width: 100%; aspect-ratio: 3/4; border-radius: 16px; overflow: hidden; background: #0e1430; border: 1px solid var(--border); display: flex; align-items: center; justify-content: center; }
      .cover img { width: 100%; height: 100%; object-fit: cover; display: block; }
      .title { font-size: clamp(24px, 2.6vw, 36px); line-height: 1.15; margin: 0; }
      .meta { color: var(--muted); margin-top: 6px; font-size: 14px; }
      .rating-summary { margin-top: 14px; display: flex; align-items: center; gap: 12px; }
      .stars { display: inline-flex; gap: 4px; }
      .star { width: 22px; height: 22px; display: inline-grid; place-items: center; cursor: default; }
      .star svg { width: 100%; height: 100%; fill: none; stroke: var(--muted); stroke-width: 1.5; }
      .star.filled svg path { fill: currentColor; stroke: currentColor; }
      .badge { padding: 6px 10px; border: 1px solid var(--border); border-radius: 999px; color: var(--muted); font-size: 12px; }
      .body { padding: 24px; display: grid; grid-template-columns: 1.25fr 0.85fr; gap: 28px; }
      .section-title { font-size: 16px; letter-spacing: 0.3px; color: var(--muted); margin: 0 0 8px; text-transform: uppercase; }
      .desc { background: rgba(255, 255, 255, 0.02); border: 1px solid var(--border); border-radius: 16px; padding: 16px; line-height: 1.6; }
      .reviews { background: rgba(255, 255, 255, 0.02); border: 1px solid var(--border); border-radius: 16px; }
      .reviews-header { display: flex; align-items: center; justify-content: space-between; padding: 14px 16px; border-bottom: 1px solid var(--border); }
      .reviews-list { list-style: none; margin: 0; padding: 0; max-height: 380px; overflow: auto; }
      .review { padding: 14px 16px; border-bottom: 1px dashed var(--border); }
      .review:last-child { border-bottom: 0; }
      .review .name { font-weight: 600; }
      .review .date { color: var(--muted); font-size: 12px; margin-left: 8px; }
      .review .text { margin-top: 6px; color: #d7e3f7; }
      @media (max-width: 900px) { .header { grid-template-columns: 1fr; } .body { grid-template-columns: 1fr; } }
          .form { background: rgba(255,255,255,0.02); border:1px solid var(--border); border-radius:16px; padding:16px; display:grid; gap:12px; margin-top:20px; }
    .form .row { display:grid; gap:10px; }
    .form label { font-size:14px; color:var(--muted); }
    input[type="text"], textarea { width:100%; padding:10px 12px; border-radius:12px; border:1px solid var(--border); background:#0d1328; color:var(--text); }
    textarea { min-height:90px; resize:vertical; }
    .rate-input { display:flex; gap:8px; align-items:center; }
    .rate-input .rate-star { width:28px; height:28px; cursor:pointer; color:#6c7ca1; }
    .rate-input .rate-star.active { color:#f1c40f; }
    .actions { display:flex; gap:10px; justify-content:flex-end; }
    button { border:1px solid var(--border); padding:10px 14px; border-radius:12px; cursor:pointer; background:#121938; color:var(--text); font-weight:600; box-shadow:var(--shadow); }
    button.primary { background:linear-gradient(135deg, var(--accent), var(--accent-2)); border:0; }
    button:disabled { opacity:0.6; cursor:not-allowed; }
    @media (max-width:900px) { .header { grid-template-columns:1fr; } .body { grid-template-columns:1fr; } }
    </style>
  </head>
  @include('component.user-head')   
   @include('component.user-header')
  <body>
   
  <div class="container">
  <div class="card" role="article" aria-labelledby="book-title">
    <div class="header">
      <div class="cover" aria-hidden="true">
        <img src="{{ $book->book_cover ?? 'https://images.unsplash.com/photo-1544947950-fa07a98d237f?q=80&w=640&auto=format&fit=crop' }}" alt="Book cover" />
      </div>
      <div>
        <h1 id="book-title" class="title">{{ $book->name }}</h1>
        <div class="meta">by {{ $book->author ?? 'Unknown Author' }} · {{ $book->pages ?? 'N/A' }} pages</div>
        <div class="rating-summary" aria-live="polite">
          <div class="stars" id="avg-stars" aria-label="Average rating"></div>
          <div id="avg-score" class="badge">{{ number_format($averageRating,1) }} / 5</div>
          <div id="rating-count" class="badge">{{ $book->reviews->count() }} review{{ $book->reviews->count() === 1 ? '' : 's' }}</div>
        </div>
          <div style="margin-top: 16px; display: flex; gap: 10px; flex-wrap: wrap">
              <span class="badge">{{ $book->booktype  }}</span>
              <span class="badge">Burmese</span>
              <span class="badge">ISBN 978-0525559474</span>
            </div>
      </div>
    </div>

    <div class="body">
      <section>
        <h2 class="section-title">Description</h2>
        <div class="desc">{{ $book->description }}</div>

        <h2 class="section-title" style="margin-top:20px;">Add a Review</h2>
        <form class="form" method="POST" action="">
          @csrf
          <div class="row">
            <label for="name">Your Name</label>
            <input type="text" id="name" name="name" placeholder="Jane Doe" required />
          </div>
          <div class="row">
            <label>Rating</label>
            <div class="rate-input" id="rate-input" role="radiogroup">
              <!-- interactive stars injected by JS -->
            </div>
            <input type="hidden" name="rating" id="rating-value" required />
          </div>
          <div class="row">
            <label for="comment">Your Review</label>
            <textarea id="comment" name="comment" placeholder="What did you think?" required></textarea>
          </div>
          <div class="actions">
            <button type="reset">Clear</button>
            <button type="submit" class="primary">Submit Review</button>
          </div>
        </form>
      </section>

      <aside>
        <div class="reviews" aria-labelledby="reviews-title">
          <div class="reviews-header">
            <h2 id="reviews-title" class="section-title" style="margin:0">Reviews</h2>
          </div>
          <ul id="reviews" class="reviews-list">
            @forelse($book->reviews as $review)
              <li class="review">
                <div>
                  <span class="name">{{ $review->user->name ?? $review->name ?? 'Anonymous' }}</span>
                  <span class="date">· {{ $review->created_at->format('M d, Y') }}</span>
                </div>
                <div class="stars">
                  @for($i=1;$i<=5;$i++)
                    <span class="star {{ $i <= $review->rating ? 'filled' : '' }}">
                      <svg viewBox="0 0 24 24"><path d="M12 2.5l2.9 6 6.6.9-4.8 4.7 1.1 6.6L12 17.9 6.3 20.7l1.1-6.6L2.6 9.4l6.6-.9L12 2.5z"/></svg>
                    </span>
                  @endfor
                </div>
                <div class="text">{{ $review->comment }}</div>
              </li>
            @empty
              <li class="review">No reviews yet.</li>
            @endforelse
          </ul>
        </div>
      </aside>
    </div>
  </div>
</div>

<template id="star-template">
  <span class="star" aria-hidden="true">
    <svg viewBox="0 0 24 24" aria-hidden="true">
      <path d="M12 2.5l2.9 6 6.6.9-4.8 4.7 1.1 6.6L12 17.9 6.3 20.7l1.1-6.6L2.6 9.4l6.6-.9L12 2.5z"/>
    </svg>
  </span>
</template>

<template id="rate-star-template">
  <button type="button" class="rate-star" role="radio" aria-checked="false" aria-label="1 star">
    <svg viewBox="0 0 24 24" width="100%" height="100%">
      <path d="M12 2.5l2.9 6 6.6.9-4.8 4.7 1.1 6.6L12 17.9 6.3 20.7l1.1-6.6L2.6 9.4l6.6-.9L12 2.5z" fill="currentColor"/>
    </svg>
  </button>
</template>

<script>
  // Render average rating stars
  function createStars(container, value, outOf = 5){
    container.innerHTML = '';
    const tpl = document.getElementById('star-template');
    for(let i=1;i<=outOf;i++){
      const n = tpl.content.firstElementChild.cloneNode(true);
      if(i<=Math.round(value)) n.classList.add('filled');
      container.appendChild(n);
    }
  }
  createStars(document.getElementById('avg-stars'), {{ $averageRating ?? 0 }});

  // Interactive rating input
  const holder = document.getElementById('rate-input');
  holder.innerHTML = '';
  const tpl = document.getElementById('rate-star-template');
  let current = 0;
  const buttons = [];
  for(let i=1;i<=5;i++){
    const b = tpl.content.firstElementChild.cloneNode(true);
    b.addEventListener('click',()=>{
      current=i;
      buttons.forEach((btn,idx)=>btn.classList.toggle('active',idx<current));
      document.getElementById('rating-value').value = current;
    });
    buttons.push(b);
    holder.appendChild(b);
  }
</script>
</body>
</html>