@extends('admin.layouts.app')
@section('title', 'Create Blog')
@section('content')

<div class="container">
    <a href="{{ route('topbar-banner.create') }}" class="btn btn-primary mb-3">Add Banner</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Link</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($banners as $banner)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><img src="{{ asset('/uploads/banners/' . $banner->image) }}" alt="Banner Image" width="100"></td>
                    <td>{{ $banner->link }}</td>
                    <td>{{ $banner->is_active ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <a href="{{ route('topbar-banner.edit', $banner->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('topbar-banner.destroy', $banner->id) }}" method="POST" style="display: inline;">
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