<!doctype html>
<html class="no-js" lang="en">
 <head>
    <link rel="stylesheet" href="{{ asset('css/vendor.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
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
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right"> Name: </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control boxed" placeholder="" name="name" value="{{ $book->name }}" required> </div>
                            </div>
                              <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right"> Price: </label>
                                <div class="col-sm-10">
                                     <input type="text" class="form-control boxed" placeholder="" name="price" value="{{ $book->price }}" required> </div>
                            </div>
                             <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right"> Author: </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control boxed" placeholder="" name="author" value="{{ $book->author }}" required> </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right"> Description: </label>
                                <div class="col-sm-10">
                                    <div class="wyswyg">
                                 <textarea name="description" id="" cols="100" rows="5" class="editor" required>{{ $book->description }}</textarea>
                                                                            
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right"> Category: </label>
                                <div class="col-sm-10">
                                    <select class="c-select form-control boxed" name="category_id" required>
                                          <option disabled>Select Category</option>
                                        
                                        @foreach ($categories as $category)
                                             <option value="{{ $category['id'] }}" {{ $book->category_id == $category['id'] ? 'selected' : '' }}>{{ $category['categoryName'] }}</option>
                                        @endforeach  
                                        </select>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right"> BookType: </label>
                                <div class="col-sm-10">
                                    <select class="c-select form-control boxed" name="booktype" required>
                                        <option disabled>Select Type</option>
                                        <option value="premiun" {{ in_array(strtolower($book->booktype), ['premiun', 'premium']) ? 'selected' : '' }}>Premium</option>
                                        <option value="free" {{ strtolower($book->booktype) === 'free' ? 'selected' : '' }}>Free</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right"> Cover Image: </label>
                                <div class="col-sm-10">
                                    @if ($book->book_cover)
                                        <div style="margin-bottom: 10px;">
                                            <img src="{{ $book->book_cover }}" alt="Current Cover" style="height: 120px; border-radius: 6px; object-fit: cover;">
                                        </div>
                                    @endif
                                    <div class="images-container">
                                        <div class="mb-3">
                                            <input class="form-control" type="file" name="book_cover" id="book_cover" accept="image/*">
                                            <small class="text-muted">Leave empty to keep the current cover image.</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right"> Pdf file: </label>
                                <div class="col-sm-10">
                                    @if ($book->file && $book->file !== '#')
                                        <div style="margin-bottom: 8px;">
                                            <a href="{{ $book->file }}" target="_blank">View Current PDF File</a>
                                        </div>
                                    @endif
                                    <div class="images-container">
                                        <div class="mb-3">
                                            <input class="form-control" type="file" name="file" id="file" accept=".pdf">
                                            <small class="text-muted">Leave empty to keep the current PDF file.</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          
                            <div class="form-group row">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <button type="submit" class="btn btn-primary"> Submit </button>
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
    </body>

</html>