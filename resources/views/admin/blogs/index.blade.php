@extends('admin.layouts.app')
@section('title', 'Manage Blogs')
@section('content')

<div class="container">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h2>Manage Blogs</h2>

    <!-- Category Filter -->
    <form method="GET" action="{{ route('admin.blogs.index') }}" class="mb-3">
        <div class="row">
            <div class="col-md-6">
                <select name="category" class="form-select" onchange="this.form.submit()">
                    <option value="">All Categories</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>

    <a href="{{ route('blogs.create') }}" class="btn btn-primary mb-3">Add Blog</a>

    <!-- Blogs Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Title</th>
                <th>Category</th>
                <th>Author</th>
                <th>Tags</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($blogs as $blog)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><img src="{{ asset('uploads/' . $blog->image) }}" alt="Blog Image" height="100" width="100"></td>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->category->name ?? 'No Category' }}</td>
                    <td>{{ $blog->author }}</td>
                    <td>{{ $blog->tags }}</td>
                    <td>
                        <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No blogs found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
