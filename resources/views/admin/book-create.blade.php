<!doctype html>
<html class="no-js" lang="en">
 <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ModularAdmin - Free Dashboard Theme | HTML Version</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="apple-touch-icon" href="apple-touch-icon.html">
    <!-- Place favicon.ico in the root directory -->

    <!-- Static CSS loading instead of dynamic theme script -->
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="css/app.css">
</head>
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
                <article class="content item-editor-page">
                    <div class="title-block">
                        <h3 class="title"> Add new item
                            <span class="sparkline bar" data-type="bar"></span>
                        </h3>
                    </div>
                    <form   action="/createBook" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card card-block">
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right"> Name: </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control boxed" placeholder="" name="name"> </div>
                            </div>
                              <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right"> Price: </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control boxed" placeholder="" name="price"> </div>
                            </div>
                             <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right"> Author: </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control boxed" placeholder="" name="author"> </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right"> Description: </label>
                                <div class="col-sm-10">

                                        <textarea name="description" id="" cols="100" rows="5" class="editor"></textarea>
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right"> Category: </label>
                                <div class="col-sm-10">
                                    <select class="c-select form-control boxed" name="category_id">
                                        <option selected>Select Category</option>
                                        @foreach ($categories as $category)
                                             <option value="{{ $category['id'] }}">{{ $category['categoryName'] }}</option>
                                        @endforeach  
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right"> BookType: </label>
                                <div class="col-sm-10">
                                    <select class="c-select form-control boxed" name="booktype">
                                        <option selected>Select Type</option>
                                       
                                             <option value="premium">Preminum</option>
                                            <option value="free">Free</option>
                                       
                                       
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right"></label>
                                
                            </div>
                               <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right"> Cover Image: </label>
                                <div class="col-sm-10">
                                    <div class="images-container">
                                        <div class="mb-3">
                                   <input class="form-control" type="file" name="book_cover" id="file" required>
                                </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right"> Pdf file: </label>
                                <div class="col-sm-10">
                                    <div class="images-container">
                                        <div class="mb-3">
                                   <input class="form-control" type="file" name="file" id="file" required>
                                </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <button  class="btn btn-primary" type="submit"> Submit </button>
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