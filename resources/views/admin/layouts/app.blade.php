<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>@yield('title', 'Final Touch Admin Panel')</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
        {{-- bootstrap v4 --}}
    <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/ready.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/demo.css') }}">
    <link rel="icon" type="image/x-icon" href="/assets/images/Final-Touch-Icon.jpg">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="wrapper">

        {{-- top header --}}
        <div class="main-header">
            <div class="logo-header">
                <a href="/admin" class="logo">
                    Dashboard
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
            </div>
            <nav class="navbar navbar-header navbar-expand-lg">
                <div class="container-fluid">
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <li class="nav-item dropdown hidden-caret">
                            <a class="nav-link dropdown-toggle" href="/admin/messages" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="la la-envelope"></i>
                                {{-- <span class="notification">  {{ $msg->count() }} </span> --}}
                            </a>
                        </li>
                        <li class="nav-item dropdown hidden-caret">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="la la-bell"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"
                                aria-expanded="false"> <img
                                    src="https://png.pngtree.com/png-vector/20190118/ourmid/pngtree-user-vector-icon-png-image_328702.jpg"
                                    alt="user-img" width="36" class="img-circle"><span>Admin</span></span> </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li>
                                    <div class="user-box">

                                        <div class="u-text">
                                            <h4>Admin</h4>
                                            {{-- <p class="text-muted">{{ auth()->user()->email }}</p> --}}
                                            {{-- <a href="{{ route('admin.profile') }}" class="text-primary">Change Email & Password</a> --}}
                                        </div>
                                    </div>
                                </li>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">
                                    {{-- <form action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Logout</button>
                                    </form> --}}
                                </a>
                            </ul>
                            <!-- /.dropdown-user -->
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        {{-- sidebar --}}
        <div class="sidebar">
            <div class="scrollbar-inner sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                        <img
                            src="https://png.pngtree.com/png-vector/20190118/ourmid/pngtree-user-vector-icon-png-image_328702.jpg">
                    </div>
                    <div class="info">
                        <a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                            <span>
                                <span class="user-level">Administrator</span>
                                <span class="caret"></span>
                            </span>
                        </a>
                        <div class="clearfix"></div>

                        <div class="collapse in" id="collapseExample" aria-expanded="true" style="">
                            {{-- <ul class="nav">
                                <li>
                                    <a href="#profile">
                                        <span class="link-collapse">My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.profile') }}">
                                        <span class="link-collapse">Change Email & Password</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#settings">
                                        <span class="link-collapse">Settings</span>
                                    </a>
                                </li>
                            </ul> --}}
                        </div>
                    </div>
                </div>
                <ul class="nav">                    

                    <li class="nav-item active border">
                        <a href="/admin/categories">
                            <p> Categories  </p>
                        </a>
                    </li>


                    <li class="nav-item active border">
                        <a href="/admin/blogs">
                            <p> Blogs  </p>
                        </a>
                    </li>
                  
                </ul>
            </div>
        </div>


        <div class="main-panel">
            <div class="content">


                {{-- Main Content --}}

                @yield('content')



            </div>




            {{-- <footer class="footer fixed-bottom ">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="http://www.themekita.com">
                                    ThemeKita
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Help
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://themewagon.com/license/#free-item">
                                    Licenses
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright ml-auto">
                        2018, made with <i class="la la-heart heart text-danger"></i> by <a
                            href="http://www.themekita.com">ThemeKita</a>
                    </div>
                </div>
            </footer> --}}
        </div>
    </div>
    </div>

</body>
<script src=" {{ asset('/backend/assets/js/core/jquery.3.2.1.min.js') }}"></script>
<script src=" {{ asset('/backend/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
<script src=" {{ asset('/backend/assets/js/core/popper.min.js') }}"></script>
<script src=" {{ asset('/backend/assets/js/core/bootstrap.min.js') }}"></script>
{{-- <script src=" {{asset('/backend/assets/js/plugin/chartist/chartist.min.js')}}"></script> --}}
{{-- <script src=" {{asset('/backend/assets/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js')}}"></script> --}}
{{-- <script src=" {{asset('/backend/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script> --}}
<script src=" {{ asset('/backend/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>
<script src=" {{ asset('/backend/assets/js/plugin/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src=" {{ asset('/backend/assets/js/plugin/jquery-mapael/maps/world_countries.min.js') }}"></script>
<script src=" {{ asset('/backend/assets/js/plugin/chart-circle/circles.min.js') }}"></script>
<script src=" {{ asset('/backend/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
<script src=" {{ asset('/backend/assets/js/ready.min.js') }}"></script>
<script src=" {{ asset('/backend/assets/js/demo.js') }}"></script>


    <!-- TinyMCE Script -->

<script src="https://cdn.tiny.cloud/1/zu7ey1ky86td80nvbsd6smu0wwwj1g7mn0xca8ugraat9wdw/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>



<script>
    tinymce.init({
        selector: '#description',
        plugins: 'code lists',
        toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist',
        height: 300
    });

    function syncTinyMCEContent() {
        tinymce.triggerSave(); // Synchronize TinyMCE content with the original <textarea>
    }
</script>




</html>
