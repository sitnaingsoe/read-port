<!doctype html>
<html class="no-js" lang="en">
 <head>
    <link rel="stylesheet" href="../css/vendor.css">
    <link rel="stylesheet" href="../css/app.css">
</head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

    <body>
        <div class="main-wrapper">
            <div class="app" id="app">
                @include('component.header')
                @include('component.sidebar')
                 <div class="sidebar-overlay" id="sidebar-overlay"></div>
                <div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
                <div class="mobile-menu-handle"></div>
                <article class="content item-editor-page">
                    <div class="title-block">
                        <h3 class="title"> Edit Book Details
                            <span class="sparkline bar" data-type="bar"></span>
                        </h3>
                    </div>

                    <form action="/book-editor/{{ $book->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="card card-block">

                            <!-- Name -->
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right"> Name: </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control boxed" name="name" value="{{ old('name', $book->name) }}">
                                </div>
                            </div>

                            <!-- Price -->
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right"> Price: </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control boxed" name="price" value="{{ old('price', $book->price) }}">
                                </div>
                            </div>

                            <!-- Author -->
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right"> Author: </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control boxed" name="author" value="{{ old('author', $book->author) }}">
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right"> Description: </label>
                                <div class="col-sm-10">
                                    <textarea name="description" cols="100" rows="5" class="editor form-control">{{ old('description', $book->description) }}</textarea>
                                </div>
                            </div>

                            <!-- Category -->
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right"> Category: </label>
                                <div class="col-sm-10">
                                    <select class="c-select form-control boxed" name="category">
                                        <option disabled>Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category['id'] }}" {{ $book->category_id == $category['id'] ? 'selected' : '' }}>
                                                {{ $category['categoryName'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Book Type -->
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right"> Book Type: </label>
                                <div class="col-sm-10">
                                    <select class="c-select form-control boxed" name="booktype">
                                        <option value="premium" {{ $book->booktype == 'premium' ? 'selected' : '' }}>Premium</option>
                                        <option value="free" {{ $book->booktype == 'free' ? 'selected' : '' }}>Free</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Cover Image -->
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right"> Cover Image: </label>
                                <div class="col-sm-10">
                                    @if($book->book_cover)
                                        <p>Current: <img src="{{ asset('storage/'.$book->book_cover) }}" width="80" class="rounded mb-2"></p>
                                    @endif
                                    <input class="form-control" type="file" name="book_cover" id="book_cover">
                                </div>
                            </div>

                            <!-- PDF File -->
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right"> Pdf File: </label>
                                <div class="col-sm-10">
                                    @if($book->file)
                                        <p>Current: <a href="{{ asset('storage/'.$book->file) }}" target="_blank">View PDF</a></p>
                                    @endif
                                    <input class="form-control" type="file" name="file" id="pdf_file">
                                </div>
                            </div>

                            <!-- Submit -->
                            <div class="form-group row">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                        </div>
                    </form>
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