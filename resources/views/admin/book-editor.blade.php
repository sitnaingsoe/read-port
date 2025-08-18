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
                    <form action="/book-editor/{{ $book->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card card-block">
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right"> Name: </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control boxed" placeholder="" name="name" value="{{ $book->name }}"> </div>
                            </div>
                              <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right"> Price: </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control boxed" placeholder="" name="price" value="{{ $book->price }}"> </div>
                            </div>
                             <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right"> Author: </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control boxed" placeholder="" name="author" value="{{ $book->author }}"> </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right"> Description: </label>
                                <div class="col-sm-10">
                                    <div class="wyswyg">
                                 <textarea name="description" id="" cols="100" rows="5" class="editor">{{ $book->description }}</textarea>
                                                                            
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right"> Category: </label>
                                <div class="col-sm-10">
                                    <select class="c-select form-control boxed" name="category">
                                          <option disabled>Select Category</option>
                                        
                                        @foreach ($categories as $category)
                                             <option value="{{ $category['id'] }}">{{ $category['categoryName'] }}</option>
                                        @endforeach  
                                        </select>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right"></label>
                                
                            </div>
                          
                            <div class="form-group row">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <button  class="btn btn-primary"> Submit </button>
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