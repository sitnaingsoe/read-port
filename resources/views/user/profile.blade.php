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
      background: #fff;
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
    .book-list, .review-list {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
      gap: 20px;
      margin-top: 15px;
    }
    .book-card, .review-card {
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
    .review-card h4 {
      margin: 0 0 5px;
      font-size: 16px;
    }
    .stars {
      display: flex;
    }
    .stars span {
      color: gold;
      font-size: 16px;
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
    <h2>📚 Saved Books</h2>
    <div class="book-list">
      {{--@forelse(auth()->user()->savedBooks as $book)
        <div class="book-card">
          <a href="{{ route('books.show', $book->id) }}">
            <img src="{{ $book->cover_url ?? 'https://via.placeholder.com/200x280' }}" alt="Book cover">
          </a>
          <h3>{{ $book->title }}</h3>
          <p>{{ \Illuminate\Support\Str::limit($book->description, 80) }}</p>
        </div>
      @empty
        <p>No saved books yet.</p>
      @endforelse--}}
       <p>No saved books yet.</p>
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
