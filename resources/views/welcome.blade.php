<!DOCTYPE html>
<html lang="en">
@include('component.user-head')
<style>
  .card__cover {
    position: relative;
    width: 100%;
    aspect-ratio: 2 / 3;
    border-radius: 10px;
    overflow: hidden;
    background: #1f1f24;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.35);
  }
  .card__cover img {
    width: 100% !important;
    height: 100% !important;
    object-fit: cover !important;
    display: block;
    transition: transform 0.35s ease;
  }
  .card:hover .card__cover img {
    transform: scale(1.05);
  }
  .rp-type-pill {
    position: absolute;
    top: 10px;
    left: 10px;
    z-index: 3;
    padding: 4px 10px;
    border-radius: 999px;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.4px;
    text-transform: uppercase;
    box-shadow: 0 4px 10px rgba(0,0,0,0.35);
  }
  .rp-type-pill.premium {
    background: linear-gradient(90deg, #f59e0b, #fbbf24);
    color: #111827;
  }
  .rp-type-pill.free {
    background: linear-gradient(90deg, #10b981, #059669);
    color: #fff;
  }
  .rp-price-pill {
    position: absolute;
    bottom: 10px;
    right: 10px;
    z-index: 3;
    padding: 3px 9px;
    border-radius: 6px;
    font-size: 11px;
    font-weight: 700;
    background: rgba(17, 24, 39, 0.85);
    color: #fff;
    backdrop-filter: blur(4px);
  }
  .card__title a {
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
    white-space: normal;
  }
  .rp-book-desc {
    color: rgba(255, 255, 255, 0.6);
    font-size: 12.5px;
    line-height: 1.5;
    margin: 8px 0 10px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    min-height: 38px;
  }
  .rp-read-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    padding: 8px 12px;
    border-radius: 7px;
    background: rgba(255, 255, 255, 0.07);
    border: 1px solid rgba(255, 255, 255, 0.1);
    color: #fff !important;
    font-size: 12px;
    font-weight: 600;
    text-decoration: none !important;
    transition: all 0.2s ease;
  }
  .rp-read-btn:hover {
    background: linear-gradient(90deg, #ff55a5 0%, #ff5860 100%);
    border-color: transparent;
  }
  .header__logo img {
    background: transparent !important;
    max-height: 44px;
    width: auto;
  }
</style>
<body class="body">
  @include('component.user-header')

  <!-- Hero / Popular Books Section -->
  <section class="home">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h1 class="home__title">
            @if(request('search'))
              <b>SEARCH RESULTS FOR:</b> "{{ request('search') }}"
            @else
              <b>POPULAR BOOKS</b> OF THIS SEASON
            @endif
          </h1>

          <button class="home__nav home__nav--prev" type="button">
            <i class="icon ion-ios-arrow-round-back"></i>
          </button>
          <button class="home__nav home__nav--next" type="button">
            <i class="icon ion-ios-arrow-round-forward"></i>
          </button>
        </div>

        <div class="col-12">
          <div class="owl-carousel home__carousel">
            @foreach ($books->take(6) as $book)
              @php
                $isPrem = in_array(strtolower($book->booktype ?? ''), ['premiun', 'premium']);
                $avg = $book->reviews->avg('rating');
              @endphp
              <div class="item">
                <div class="card card--big">
                  <div class="card__cover">
                    <span class="rp-type-pill {{ $isPrem ? 'premium' : 'free' }}">
                      @if($isPrem) <i class="fas fa-crown"></i> Premium @else Free @endif
                    </span>
                    <span class="rp-price-pill">{{ number_format($book->price) }} Ks</span>
                    <img
                      src="{{ $book->book_cover }}"
                      alt="{{ $book->name }}"
                      onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1544947950-fa07a98d237f?auto=format&fit=crop&w=600&q=80';"
                    >
                    <a href="{{ route('books.show', $book->id) }}" class="card__play">
                      <i class="fas fa-book-open" style="font-size: 18px;"></i>
                    </a>
                  </div>
                  <div class="card__content">
                    <h3 class="card__title">
                      <a href="{{ route('books.show', $book->id) }}">{{ $book->name }}</a>
                    </h3>
                    <span class="card__category">
                      <a href="{{ route('books.show', $book->id) }}">{{ $book->author }}</a>
                    </span>
                    <span class="card__rate">
                      <i class="icon ion-ios-star"></i>{{ $avg ? number_format($avg, 1) : '4.8' }}
                    </span>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Catalog by Category Section -->
  <section class="content">
    <div class="content__head">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h2 class="content__title">
              <i class="fas fa-book-reader" aria-hidden="true" style="margin-right: 10px; color: #ff55a5;"></i>
              Explore Our Library
            </h2>

            <ul class="nav nav-tabs content__tabs" id="content__tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#tab-all" role="tab" aria-controls="tab-all" aria-selected="true">All Books ({{ $books->count() }})</a>
              </li>

              @foreach ($categories as $category)
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab"
                     href="#tab-{{ $category->id }}" role="tab"
                     aria-controls="tab-{{ $category->id }}"
                     aria-selected="false">
                    {{ $category->categoryName }}
                  </a>
                </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="tab-content" id="myTabContent">
        {{-- All Books Tab --}}
        <div class="tab-pane fade show active" id="tab-all" role="tabpanel">
          <div class="row">
            @forelse ($books as $book)
              @php
                $isPrem = in_array(strtolower($book->booktype ?? ''), ['premiun', 'premium']);
                $avg = $book->reviews->avg('rating');
              @endphp
              <div class="col-6 col-sm-4 col-lg-3 col-xl-2" style="margin-bottom: 28px;">
                <div class="card" style="height: 100%; display: flex; flex-direction: column; justify-content: space-between;">
                  <div>
                    <div class="card__cover">
                      <span class="rp-type-pill {{ $isPrem ? 'premium' : 'free' }}">
                        @if($isPrem) <i class="fas fa-crown"></i> @endif {{ $isPrem ? 'Premium' : 'Free' }}
                      </span>
                      <img
                        src="{{ $book->book_cover }}"
                        alt="{{ $book->name }}"
                        onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1544947950-fa07a98d237f?auto=format&fit=crop&w=600&q=80';"
                      >
                      <a href="{{ route('books.show', $book->id) }}" class="card__play">
                        <i class="fas fa-book-open" style="font-size: 16px;"></i>
                      </a>
                    </div>
                    <div class="card__content">
                      <h3 class="card__title"><a href="{{ route('books.show', $book->id) }}">{{ $book->name }}</a></h3>
                      <span class="card__category">
                        <a href="{{ route('books.show', $book->id) }}">{{ $book->author }}</a>
                      </span>
                      <span class="card__rate"><i class="icon ion-ios-star"></i>{{ $avg ? number_format($avg, 1) : '4.8' }}</span>
                    </div>
                    <div class="rp-book-desc">
                      {{ Str::limit($book->description, 75, '...') }}
                    </div>
                  </div>
                  <a href="{{ route('books.show', $book->id) }}" class="rp-read-btn">
                    View Details
                  </a>
                </div>
              </div>
            @empty
              <div class="col-12">
                <p style="color: rgba(255,255,255,0.65); padding: 30px 0;">No books found.</p>
              </div>
            @endforelse
          </div>
        </div>

        {{-- Category Tabs --}}
        @foreach ($categories as $category)
          <div class="tab-pane fade" id="tab-{{ $category->id }}" role="tabpanel">
            <div class="row">
              @forelse ($books->where('category_id', $category->id) as $book)
                @php
                  $isPrem = in_array(strtolower($book->booktype ?? ''), ['premiun', 'premium']);
                  $avg = $book->reviews->avg('rating');
                @endphp
                <div class="col-6 col-sm-4 col-lg-3 col-xl-2" style="margin-bottom: 28px;">
                  <div class="card" style="height: 100%; display: flex; flex-direction: column; justify-content: space-between;">
                    <div>
                      <div class="card__cover">
                        <span class="rp-type-pill {{ $isPrem ? 'premium' : 'free' }}">
                          @if($isPrem) <i class="fas fa-crown"></i> @endif {{ $isPrem ? 'Premium' : 'Free' }}
                        </span>
                        <img
                          src="{{ $book->book_cover }}"
                          alt="{{ $book->name }}"
                          onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1544947950-fa07a98d237f?auto=format&fit=crop&w=600&q=80';"
                        >
                        <a href="{{ route('books.show', $book->id) }}" class="card__play">
                          <i class="fas fa-book-open" style="font-size: 16px;"></i>
                        </a>
                      </div>
                      <div class="card__content">
                        <h3 class="card__title"><a href="{{ route('books.show', $book->id) }}">{{ $book->name }}</a></h3>
                        <span class="card__category">
                          <a href="{{ route('books.show', $book->id) }}">{{ $book->author }}</a>
                        </span>
                        <span class="card__rate"><i class="icon ion-ios-star"></i>{{ $avg ? number_format($avg, 1) : '4.8' }}</span>
                      </div>
                      <div class="rp-book-desc">
                        {{ Str::limit($book->description, 75, '...') }}
                      </div>
                    </div>
                    <a href="{{ route('books.show', $book->id) }}" class="rp-read-btn">
                      View Details
                    </a>
                  </div>
                </div>
              @empty
                <div class="col-12">
                  <p style="color: rgba(255,255,255,0.6); padding: 25px 0;">No books available in this category yet.</p>
                </div>
              @endforelse
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  @include('component.user-fooder')
  @include('component.user-js')
</body>
</html>
