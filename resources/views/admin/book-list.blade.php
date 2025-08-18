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
                                    <h3 class="title"> Items
                                        <a href="{{ route('book-create') }}" class="btn btn-primary btn-sm rounded-s"> Add New </a>
                                    </h3>
                                   
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="card items">
                    <ul class="item-list striped">
                        <!-- Header Row -->
                        <li class="item item-list-header">
                            <div class="item-row">
                                <div class="item-col item-col-header fixed" style="width:50px;">
                                    <div><span>No</span></div>
                                </div>

                                <div class="item-col item-col-header fixed item-col-img md">
                                    <div><span>Cover</span></div>
                                </div>

                                <div class="item-col item-col-header item-col-title">
                                    <div><span>Name</span></div>
                                </div>

                                <div class="item-col item-col-header item-col-sales">
                                    <div><span>Price</span></div>
                                </div>

                                <div class="item-col item-col-header item-col-category">
                                    <div class="no-overflow"><span>Category</span></div>
                                </div>

                                <div class="item-col item-col-header item-col-author">
                                    <div class="no-overflow"><span>Author</span></div>
                                </div>

                                <div class="item-col item-col-header item-col-date">
                                    <div><span>Published</span></div>
                                </div>

                                <div class="item-col item-col-header fixed" style="width:80px;">
                                    <div><span>Actions</span></div>
                                </div>
                            </div>
                        </li>

                        <!-- Item Rows -->
                        @foreach ($books as $index => $book)
                        <li class="item">
                            <div class="item-row">
                                <!-- No -->
                                <div class="item-col fixed" style="width:50px;">
                                    {{ $loop->iteration }}
                                </div>

                                <!-- Cover -->
                                <div class="item-col fixed item-col-img md">
                                    <a href="/book-editor/{{ $book->id }}">
                                        <div class="item-img rounded" style="background-image: url({{ $book['book_cover'] ?? 'https://via.placeholder.com/50' }})"></div>
                                    </a>
                                </div>

                                <!-- Name -->
                                <div class="item-col fixed pull-left item-col-title">
                                    <div class="item-heading">Name</div>
                                    <div>
                                        <a href="/book-editor/{{ $book->id }}">
                                            <h4 class="item-title">{{ $book['name'] }}</h4>
                                        </a>
                                    </div>
                                </div>

                                <!-- Price -->
                                <div class="item-col item-col-sales">
                                    <div class="item-heading">Price</div>
                                    <div>{{ $book['price'] }}</div>
                                </div>

                                <!-- Category -->
                                <div class="item-col item-col-category no-overflow">
                                    <div class="item-heading">Category</div>
                                    <div class="no-overflow">
                                        <a href="#">{{ $book->category->categoryName ?? 'No Category' }}</a>
                                    </div>
                                </div>

                                <!-- Author -->
                                <div class="item-col item-col-author">
                                    <div class="item-heading">Author</div>
                                    <div class="no-overflow">
                                        <a href="#">{{ $book['author'] }}</a>
                                    </div>
                                </div>

                                <!-- Published -->
                                <div class="item-col item-col-date">
                                    <div class="item-heading">Published</div>
                                    <div class="no-overflow">{{ $book['created_at'] }}</div>
                                </div>

                                <!-- Actions -->
                                <div class="item-col fixed" style="width:80px; display:flex; justify-content:center; gap:5px;">
                                    <!-- Delete Icon -->
                                    <form action="/book-delete/{{ $book->id }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger p-1" title="Delete">
                                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                                            </svg>
                                        </button>
                                    </form>
                                    <!-- Edit Icon -->
                                    <a href="/book-editor/{{ $book->id }}" class="btn btn-sm btn-primary p-1" title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </li>

                        @endforeach
                    </ul>
                    </div>



                    <nav class="text-right">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#"> Prev </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#"> 1 </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#"> 2 </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#"> 3 </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#"> 4 </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#"> 5 </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#"> Next </a>
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