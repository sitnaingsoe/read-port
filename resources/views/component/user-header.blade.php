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
                                <a href="{{ url('/') }}" class="header__nav-link header__nav-link--active">Home</a>
                            </li>
                            <li class="header__nav-item">
                                <a href="{{ route('premium') }}" class="header__nav-link">Premium</a>
                            </li>
                            <li class="header__nav-item">
                                <a href="" class="header__nav-link">Review</a>
                            </li>
                            <!-- dropdown -->
                            <li class="dropdown header__nav-item">
                                <a class="dropdown-toggle header__nav-link header__nav-link--more" href="#" role="button" id="dropdownMenuMore" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon ion-ios-more"></i>
                                </a>
                                <ul class="dropdown-menu header__dropdown-menu" aria-labelledby="dropdownMenuMore">
                                    <li><a href="">About</a></li>
                                    @guest
                                        <li><a href="{{ route('login') }}">Sign In</a></li>
                                        <li><a href="{{ route('signup') }}">Sign Up</a></li>
                                    @endguest
                                </ul>
                            </li>
                            <!-- end dropdown -->
                        </ul>
                        <!-- end header nav -->

                        <!-- header auth -->
                        <div class="header__auth">
                            <!-- search button -->
                            <button class="header__search-btn" type="button">
                                <i class="icon ion-ios-search"></i>
                            </button>

                            @guest
                                <!-- Not logged in -->
                                <a href="{{ route('login') }}" class="header__sign-in">
                                    <i class="icon ion-ios-log-in"></i>
                                    <span>Sign in</span>
                                </a>
                            @endguest

                            @auth
                                <!-- Logged in -->
                                <div class="header__profile dropdown">
                                    <a class="dropdown-toggle header__sign-in" href="#" role="button" id="userMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="{{ Auth::user()->avatar ?? asset('img/default-avatar.png') }}"
                                             alt="Avatar"
                                             style="width:30px; height:30px; border-radius:50%; object-fit:cover; margin-right:5px;">
                                        <span>{{ Auth::user()->name }}</span>
                                    </a>
                                    <ul class="dropdown-menu header__dropdown-menu" aria-labelledby="userMenu">
                                        <li><a href="{{ route('profile') }}">Profile</a></li>
                                        <li>
                                            <form action="{{ route('logout') }}" method="POST">
                                                @csrf
                                                <button type="submit" style="background:none;border:none;color:#fff;cursor:pointer;">Logout</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            @endauth
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
    <form action="" method="GET" class="header__search">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="header__search-content">
                        <input type="text" name="q" placeholder="Search for a book, author, or review...">
                        <button type="submit">search</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- end header search -->
</header>
