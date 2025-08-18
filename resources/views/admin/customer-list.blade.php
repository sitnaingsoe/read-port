<!doctype html>
<html class="no-js" lang="en">
    @include('component.head')
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

    <body>
        @include('vendor.sweetalert.alert')
        <div class="main-wrapper">
            <div class="app" id="app">
                @include('component.header')
                @include('component.sidebar')
                                <div class="sidebar-overlay" id="sidebar-overlay"></div>
                <div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
                <div class="mobile-menu-handle"></div>
                <article class="content items-list-page">
                    <div class="title-search-block">
                        <div class="title-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="title"> Customer List
                                    </h3>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="items-search">
                            <form class="form-inline">
                                <div class="input-group">
                                    <input type="text" class="form-control boxed rounded-s" placeholder="Search for...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-secondary rounded-s" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                   <div class="card">
                    <ul class="list-group list-group-flush">
                    <!-- Header Row -->
                    <li class="list-group-item bg-light fw-bold">
                        <div class="row align-items-center">
                            <div class="col-1">No</div>
                            <div class="col-2">Image</div>
                            <div class="col">Name</div>
                            <div class="col">Email</div>
                            <div class="col">Premium</div>
                           
                        </div>
                    </li>

                    <!-- Item Row -->
                @foreach($users as $index => $user)
                    <li class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-1">{{ $loop->iteration }}</div>
                            <div class="col-2">
                                <img src="{{ $user->profile_photo_url ?? 'https://via.placeholder.com/40' }}"
                                    alt="Profile"
                                    class="rounded img-fluid">
                            </div>
                            <div class="col">{{ $user->name }}</div>
                            <div class="col">{{ $user->email }}</div>
                            <div class="col">

                            <div class="col">
                            <span class="badge {{ $user->is_premium ? 'bg-success' : 'bg-warning text-dark' }}">
                                    {{ $user->is_premium ? 'Approved' : 'Pending' }}
                                </span>
                            </div>
                           
                        </div>
                        </div>
                    </li>
                @endforeach
                </ul>

            </div>

<!-- Pagination -->
<nav class="mt-3">
    <ul class="pagination justify-content-end">
        <li class="page-item">
            <a class="page-link" href="#">Prev</a>
        </li>
        <li class="page-item active">
            <a class="page-link" href="#">1</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">4</a></li>
        <li class="page-item"><a class="page-link" href="#">5</a></li>
        <li class="page-item">
            <a class="page-link" href="#">Next</a>
        </li>
    </ul>
</nav>

                </article>
                @include('component.fooder')
                <!-- /.modal -->
            </div>
        </div>
        @include('component.script')
        <script src="js/vendor.js"></script>
        <script src="js/app.js"></script>
    </body>

</html>