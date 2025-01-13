

@extends('admin.layouts.app')
@section('title', 'All Blogs')
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



    <a href="{{ route('blogs.create') }}" class="btn btn-primary mb-3">Add Blog</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Image</th>
                <th>Category</th>
                <th>Author</th>
                <th>Tags</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><img src="{{ asset('uploads/' . $blog->image) }}" alt="Blog Image" height="100" width="100">
                    </td>
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
            @endforeach
        </tbody>
    </table>
</div>

@endsection
