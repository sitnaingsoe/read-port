<!doctype html>
<html class="no-js" lang="en">
    
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ModularAdmin - Free Dashboard Theme | HTML Version</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr"
            crossorigin="anonymous"
        />
    <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
            crossorigin="anonymous"
        ></script>
    <!-- Favicon -->
    <link rel="apple-touch-icon" href="apple-touch-icon.html">
    <!-- Place favicon.ico in the root directory -->

    <!-- Static CSS loading instead of dynamic theme script -->
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="css/app.css">
</head>
    <body>
        @include('vendor.sweetalert.alert')
        <div class="main-wrapper">
            <div class="app" id="app">
                @include('component.header')
                 @include('component.sidebar')
                <div class="sidebar-overlay" id="sidebar-overlay"></div>
                <div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
                <div class="mobile-menu-handle"></div>
                <article class="container content cards-page">  
    <div class="mb-4 row justify-content-between">
        <div class="title col-4">Category</div>
        <div class="col-4 text-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add New
            </button>
        </div>
    </div>

    <section class="section">
        <ul class="list-group list-group-flush">
            <!-- Header Row -->
            <li class="list-group-item bg-light fw-bold">
                <div class="row align-items-center">
                    <div class="col-1">No</div>
                    <div class="col">Name</div>
                    <div class="col-auto text-end">Actions</div>
                </div>
            </li>

            @foreach ($categories as $category)
                <li class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col-1">{{ $loop->iteration }}</div>
                        <div class="col">{{ $category->categoryName }}</div>
                        <div class="col-auto text-end">

                            <!-- Edit button -->
                            <button type="button" 
                                class="btn btn-primary edit-btn"
                                data-id="{{ $category->id }}"
                                data-name="{{ $category->categoryName }}"
                                data-bs-toggle="modal"
                                data-bs-target="#exampleModalEdit">
                                Edit
                            </button>

                            <!-- Delete form -->
                            <form action="/category-delete/{{ $category->id }}" 
                                method="POST" 
                                class="d-inline"
                                onsubmit="return confirm(' if you delete this category ,will also delete book below this category ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </section>

    <!-- Create Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="/create-category" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Create Category</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" class="form-control" name="categoryName">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal (Reusable) -->
    <div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="editModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editCategoryForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editModalLabel">Edit Category</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" id="categoryNameInput" class="form-control" name="categoryName">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</article>

<!-- Script for Edit Modal -->
<script>
document.querySelectorAll('.edit-btn').forEach(btn => {
    btn.addEventListener('click', function () {
        let categoryId = this.dataset.id;
        let categoryName = this.dataset.name;

        // Update form action dynamically
        document.getElementById('editCategoryForm').action = `/categories/${categoryId}`;
        // Fill input field
        document.getElementById('categoryNameInput').value = categoryName;
    });
});
</script>

                @include('component.fooder')
           
        </div>
            </div>
        </div>
      
           @includeIf('component.script')
 <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"
            integrity="sha384-7qAoOXltbVP82dhxHAUje59V5r2YsVfBafyUDxEdApLPmcdhBPg1DKg1ERo0BZlK"
            crossorigin="anonymous"
        ></script>
    </body>

</html> 