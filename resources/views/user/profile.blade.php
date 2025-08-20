<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('component.user-head')
     <style>
    .container {
      max-width: 1000px;
      margin: auto;
    }
    .profile-header {
      display: flex;
      align-items: center;
      background: #a1a4ad;
      padding: 20px;
      border-radius: 10px;
      margin-top: 110px;
      margin-bottom: 20px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }
    .avatar {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      background: #ccc;
      margin-right: 20px;
      overflow: hidden;
    }
    .avatar img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    .profile-info h1 {
      margin: 0;
      font-size: 28px;
    }
    .profile-info p {
      margin: 5px 0;
      color: #555;
    }
    h2 {
      margin-top: 30px;
      font-size: 22px;
      color: #444;
    }
/* Saved Books as horizontal scroll */
.book-list {
    display: flex;
    gap: 20px;
    overflow-x: auto;
    padding-bottom: 10px;
}

.book-card {
    flex: 0 0 200px; /* fixed width for each card */
    background: #fff;
    padding: 15px;
    border-radius: 10px;
    box-shadow: 0 1px 4px rgba(0,0,0,0.1);
}

.book-card img {
    width: 100%;
    height: 280px;
    object-fit: cover;
    border-radius: 8px;
}

.book-card h3 {
    font-size: 18px;
    margin: 10px 0 5px;
}

.book-card p {
    font-size: 14px;
    color: #555;
}
.book-list::-webkit-scrollbar {
    height: 8px;
}
.book-list::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 4px;
}
.book-list::-webkit-scrollbar-track {
    background: #f1f1f1;
}
.review-list {
    display: flex;
    gap: 20px;
    overflow-x: auto;
    padding-bottom: 10px;
}

.review-card {
    flex: 0 0 250px; /* fixed width for each review card */
    background: #fff;
    padding: 15px;
    border-radius: 10px;
    box-shadow: 0 1px 4px rgba(0,0,0,0.1);
}

.review-card h4 {
    margin: 0 0 5px;
    font-size: 16px;
}

.stars {
    display: flex;
    margin-bottom: 8px;
}

.stars span {
    color: gold;
    font-size: 16px;
}

.review-card p {
    font-size: 14px;
    color: #555;
    margin: 0 0 5px;
}

.review-card small {
    color: #888;
    font-size: 12px;
}
.card {
    background: #11162a;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 10px rgba(0,0,0,0.3);
    transition: transform 0.2s ease-in-out;
}

.card:hover {
    transform: translateY(-5px);
}

.card__cover img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    border-bottom: 2px solid #222;
}

.card__content {
    padding: 12px;
    text-align: center;
}

.card__title {
    font-size: 16px;
    font-weight: 600;
    margin: 5px 0;
    color: #fff;
}

.card__title a {
    color: inherit;
    text-decoration: none;
}

.card__category {
    display: block;
    font-size: 14px;
    color: #aaa;
    margin-bottom: 5px;
}

.card__rate {
    color: #ffcc00;
    font-size: 14px;
    font-weight: bold;
}

.upcoming-description {
    padding: 10px;
    background: #0b1020;
    font-size: 14px;
    color: #ccc;
}

.upcoming-read-more {
    display: inline-block;
    margin-top: 5px;
    color: #1db954;
    font-weight: bold;
    text-decoration: none;
}
  </style>
</head>
<body class="body">
    @include('component.user-header')
    @auth
    <div class="container">

  {{-- Profile Header --}}
  <div class="profile-header">
    <div class="avatar">
      <img src="{{ auth()->user()->avatar?? 'https://via.placeholder.com/100' }}" alt="User Avatar">
    </div>
    <div class="profile-info">
      <h1>{{ auth()->user()->name }}</h1>
      <p>Email: {{ auth()->user()->email }}</p>
      <p>Member since: {{ auth()->user()->created_at->format('M d, Y') }}</p>
    </div>
  </div>

  {{-- Saved Books --}}
  <section>
    <div class="container">
        <section>
            <h2>📚 Saved Books</h2>
            <div class="row">
                @forelse(auth()->user()->savedBooks as $book)
                    <div class="col-6 col-sm-3 col-lg-4 col-xl-3">
                    <div class="card">
                        <div class="card__cover">
                            <a href="{{ route('books.show', $book->id) }}">
                                <img src="{{ $book->book_cover ?? 'https://via.placeholder.com/200x280' }}" alt="Book cover">
                            </a>
                        </div>
                        <div class="card__content">
                            <h3 class="card__title">
                                <a href="{{ route('books.show', $book->id) }}">{{ $book->name }}</a>
                            </h3>
                            <span class="card__category">
                                <a href="#">{{ $book->author ?? 'Unknown Author' }}</a>
                            </span>
                            <span class="card__rate">
                                <i class="icon ion-ios-star"></i> 
                                {{ number_format($book->reviews->avg('rating'), 1) ?? 'N/A' }}
                            </span>
                        </div>

                        <div class="upcoming-description">
                            <p>{{ \Illuminate\Support\Str::limit($book->description, 25, '...') }}</p>
                            <a href="{{ route('books.show', $book->id) }}" class="upcoming-read-more">Read More</a>
                        </div>
                    </div>
                </div>
                @empty
                    <p>No saved books yet.</p>
                @endforelse
            </div>
        </section>
    </div>
  </section>

  {{-- User Reviews --}}
  <section>
    <h2>✍️ My Reviews</h2>
    <div class="review-list">
        @forelse(auth()->user()->reviews as $review)
            <div class="review-card">
                <h4>{{ $review->book->title }}</h4>
                <div class="stars">
                    @for ($i = 1; $i <= 5; $i++)
                        <span>{{ $i <= $review->rating ? '★' : '☆' }}</span>
                    @endfor
                </div>
                <p>{{ $review->comment }}</p>
                <small>Reviewed on {{ $review->created_at->format('M d, Y') }}</small>
            </div>
        @empty
            <p>You haven’t written any reviews yet.</p>
        @endforelse
    </div>
</section>
@else
    <p>Please <a href="{{ route('login') }}">log in</a> to view your profile.</p>
@endauth    
</body>
</html>
