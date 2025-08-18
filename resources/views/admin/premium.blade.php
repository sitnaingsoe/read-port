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
                <article class="content dashboard-page">
                       <div class="title-block">
                        <h3 class="title"> Cards </h3>
                        <p class="title-description"> Cards can contain almost any kind of element inside </p>
                    </div> 
                    <section class="section">
                        <div class="row">
                          @foreach($premiums as $premium)
                                <?php
                                $i=0; 
                                ?>
                            @if(!$premium->is_disabled)
                                <?php
                                $i +=1;
                                ?>
                                <div class="col-xl-4">
                                <div class="card card-secondary shadow"> 
                                    
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ $premium->user->avatar ?? 'https://avatars3.githubusercontent.com/u/3959008?v=3&amp;s=40' }}" 
                                                class="rounded-circle m-2" 
                                                alt="Avatar" 
                                                style="width:44px; height:44px; object-fit:cover;">
                                            <div class="ms-5">
                                                <strong>{{ $premium->user->name }}</strong><br>
                                                <small class="text-muted">{{ $premium->user->email }}</small>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Card Body -->
                                    <div class="card-body text-center">
                                        <img src="{{ $premium->e_receipt ?? 'https://via.placeholder.com/200x300' }}" 
                                            class="img-fluid img-thumbnail" 
                                            alt="Responsive image" 
                                            style="width:200px; height:300px; object-fit:cover;">
                                    </div>

                                    <!-- Card Footer -->
                                    <div class="card-footer text-muted">
                                        <div class="row">
                                            <div class="col">
                                                <form action="{{ route('users.approve', $premium->user->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button class="btn btn-success btn-sm w-100">Approve</button>
                                                </form>
                                            </div>
                                            {{--<div class="col">
                                                <form action="" method="POST">
                                                    @csrf
                                                    <button class="btn btn-danger btn-sm w-100">Reject</button>
                                                </form>
                                            </div>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                           
                         @endforeach
                             @if (!$i)
                                <h2>Request not found</h2>
                            @endif
                        </div>
                    </section>
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