@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')

<style>
    a {
        text-decoration: none !important; 
    }
</style>

    <h3>Welcome to News Dashboard</h3>
    <p>This is the admin dashboard where you can manage the application.</p>



    <div class="container-fluid">
        <h4 class="page-title">Dashboard</h4>
        <div class="row">

            {{-- Jobs card --}}
          

            {{-- categories card --}}
            <div class="col-md-3">
                <a href="/admin/categories">
                <div class="card card-stats card-info">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <div class="icon-big text-center">
                                    <i class="la la-ambulance"></i>
                                </div>
                            </div>
                            <div class="col-9 d-flex align-items-center">
                                <div class="numbers">
                                    <p class="card-category"> Categories </p>
                                    <h4 class="card-title"> Total: {{ $categories->count() }} </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            </div>

            {{-- Blogs card --}}
            <div class="col-md-3">
                <a href="/admin/blogs">
                <div class="card card-stats card-info">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <div class="icon-big text-center">
                                    <i class="la la-ambulance"></i>
                                </div>
                            </div>
                            <div class="col-9 d-flex align-items-center">
                                <div class="numbers">
                                    <p class="card-category"> Blogs </p>
                                    <h4 class="card-title"> Total: {{ $blogs->count() }} </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            </div>


    

        </div>



    </div>
@endsection
