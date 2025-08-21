<!DOCTYPE html>
<html lang="en">
@include('component.user-head')
<body class="body">
			@include('component.user-header')
			<section class="home">
				<div class="owl-carousel home__bg">
					<div class="item home__cover" data-bg="img/covers/popular/popu1.jpg"></div>
					<div class="item home__cover" data-bg="img/covers/popular/popu2.jpg"></div>
					<div class="item home__cover" data-bg="img/covers/popular/popu3.jpg"></div>
					<div class="item home__cover" data-bg="img/covers/popular/popu4.jpg"></div>
					
				</div>
				<div class="container">
					<div class="row">
						<div class="col-12">
							<h1 class="home__title"><b>POPULAR BOOKS</b> OF THIS SEASON</h1>

							<button class="home__nav home__nav--prev" type="button">
								<i class="icon ion-ios-arrow-round-back"></i>
							</button>
							<button class="home__nav home__nav--next" type="button">
								<i class="icon ion-ios-arrow-round-forward"></i>
							</button>
						</div>

						<div class="col-12">
						<div class="owl-carousel home__carousel">
							@foreach($topBooks as $book)
								<div class="item">
									<!-- card -->
									<div class="card card--big">
										<div class="card__cover">
											<img src="{{ $book->book_cover ?? asset('img/default-book.png') }}" alt="{{ $book->title }}">
											<a href="{{ route('books.show', $book->id) }}" class="card__play">
												<i class="icon ion-ios-play"></i>
											</a>
										</div>
										<div class="card__content">
											<h3 class="card__title">
												<a href="{{ route('books.show', $book->id) }}">	@if ($book->booktype == "premium")
														<i class="fas fa-crown" style="color:gold;"></i>
													@endif
													&nbsp;{{ $book->title }}
												</a>
											</h3>
											<span class="card__category">
												<a href="#">{{ $book->author ?? 'Unknown Author' }}</a>
											</span>
											<span class="card__rate">
												<i class="icon ion-ios-star"></i>
												{{ number_format($book->avg_rating, 1) }}
											</span>
											<div class="upcoming-description">
											<p>
												{{ Str::limit($book->description, 40, '...') }}
												</p>
												<a href="{{ route('books.show', $book->id) }}" class="upcoming-read-more">Read More</a>
													</div>
										</div>
									</div>
									<!-- end card -->
								</div>
							@endforeach
						</div>
					</div>	

					</div>
				</div>
			</section>
			<section class="content">
				<div class="content__head">
					<div class="container">
						<div class="row">
							<div class="col-12">
								<!-- content title -->
								<h2 class="content__title">
									<i class="fas fa-clock" aria-hidden="true" style="margin-right: 10px;  color: #1aafff;"></i>
										It's Book O'clock
								</h2>

								<!-- content tabs nav -->
								<ul class="nav nav-tabs content__tabs" id="content__tabs" role="tablist">
								{{-- First tab: All Books --}}
								<li class="nav-item">
									<a class="nav-link active" data-toggle="tab" href="#tab-all" role="tab" aria-controls="tab-all" aria-selected="true">All Books</a>
								</li>

								{{-- Dynamic tabs from categories --}}
								@foreach ($categories as $key => $category)
									<li class="nav-item">
										<a class="nav-link {{ $key == 0 ? '' : '' }}" data-toggle="tab" 
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
							@foreach ($books as $book)
								<div class="col-6 col-sm-4 col-lg-4 col-xl-3">
									<div class="card">
										<div class="card__cover">
											<img src="{{ $book->book_cover }}" alt="">
										</div>
										<div class="card__content">
											<h3 class="card__title">												<a href="{{ route('books.show', $book->id) }}">	@if ($book->booktype == "premium")
														<i class="fas fa-crown" style="color:gold;"></i>
													@endif
													&nbsp;{{ $book->title }}
												</a></h3>
											<span class="card__category">
												<a href="#">{{ $book->author }}</a>
											</span>
											<span class="card__rate"><i class="icon ion-ios-star"></i>{{ number_format($book->reviews->avg('rating'), 1) ?? 'N/A' }}</span>
										</div>
										<div class="upcoming-description">
									<p>
										{{ Str::limit($book->description, 40, '...') }}
									</p>
									<a href="{{ route('books.show', $book->id) }}" class="upcoming-read-more">Read More</a>
										</div>
									</div>
								</div>
							@endforeach
						</div>
					</div>

					{{-- Category Tabs --}}
					@foreach ($categories as $category)
						<div class="tab-pane fade" id="tab-{{ $category->id }}" role="tabpanel">
							<div class="row">
								@forelse ($books->where('category_id', $category->id) as $book)
									<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
										<div class="card">
											<div class="card__cover">
												<img src="{{ $book->book_cover }}" alt="">
											</div>
											<div class="card__content">
												<h3 class="card__title">												<a href="{{ route('books.show', $book->id) }}">	@if ($book->booktype == "premium")
														<i class="fas fa-crown" style="color:gold;"></i>
													@endif
													&nbsp;{{ $book->title }}
												</a></h3>
												<span class="card__category">
													<a href="#">{{ $book->author }}</a>
												</span>
												<span class="card__rate"><i class="icon ion-ios-star"></i>{{ $book->rating }}</span>
											</div>
										<div class="upcoming-description">
										<p>
										{{ Str::limit($book->description, 100, '...') }}
									</p>
									<a href="{{ route('books.show', $book->id) }}" class="upcoming-read-more">Read More</a>
										</div>
										</div>
									</div>
								@empty
									<p class="m-3">No books available in this category.</p>
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