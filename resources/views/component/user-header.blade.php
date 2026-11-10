<header class="header">
				<div class="header__wrap">
					<div class="container">
						<div class="row">
							<div class="col-12">
								<div class="header__content">
									<!-- header logo -->
									<a href="{{ url('/') }}" class="header__logo">
										<img src="{{ asset('img/reportlogo.png') }}" alt="Report Logo">
									</a>

									<!-- end header logo -->

									<!-- header nav -->
									<ul class="header__nav">
										<li class="header__nav-item">
											<a href="{{ route('home') }}" class="header__nav-link header__nav-link--active">Home</a>
										</li>

										<li class="header__nav-item">
											<a href="{{ route('upload.form') }}" class="header__nav-link">Premium</a>
										</li>

										@auth
										<li class="header__nav-item">
											<a href="{{ Auth::user()->usertype === 'admin' ? route('dashboard') : route('profile') }}" class="header__nav-link">
												{{ Auth::user()->usertype === 'admin' ? 'Admin Dashboard' : 'My Profile' }}
											</a>
										</li>
										@endauth

										<!-- dropdown -->
										<li class="dropdown header__nav-item">
											<a class="dropdown-toggle header__nav-link header__nav-link--more" href="#" role="button" id="dropdownMenuMore" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon ion-ios-more"></i></a>

											<ul class="dropdown-menu header__dropdown-menu" aria-labelledby="dropdownMenuMore">
												@guest
												<li><a href="{{ route('login') }}">Sign In</a></li>
												<li><a href="{{ route('signup') }}">Sign Up</a></li>
												@else
												<li><a href="{{ route('profile') }}">Profile</a></li>
												<li><a href="{{ route('logout') }}">Logout</a></li>
												@endguest
											</ul>
										</li>
										<!-- end dropdown -->
									</ul>
									<!-- end header nav -->

									<!-- header auth -->
									<div class="header__auth">
										<button class="header__search-btn" type="button">
											<i class="icon ion-ios-search"></i>
										</button>

										@guest
										<a href="{{ route('login') }}" class="header__sign-in">
											<i class="icon ion-ios-log-in"></i>
											<span>sign in</span>
										</a>
										@else
										<a href="{{ route('logout') }}" class="header__sign-in">
											<i class="icon ion-ios-log-out"></i>
											<span>logout</span>
										</a>
										@endguest
									</div>
									<!-- end header auth -->

									<!-- header menu btn -->
									<button class="header__btn" type="button">
										<span></span>
										<span></span>
										<span></span>
									</button>
									<!-- end header menu btn -->
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- header search -->
				<form action="{{ route('home') }}" method="GET" class="header__search">
					<div class="container">
						<div class="row">
							<div class="col-12">
								<div class="header__search-content">
									<input type="text" name="search" value="{{ request('search') }}" placeholder="Search for books by title or author...">

									<button type="submit">search</button>
								</div>
							</div>
						</div>
					</div>
				</form>
				<!-- end header search -->
			</header>