@extends('admin.layouts.app')

@section('title', 'Edit Banner')

@section('content')
<div class="container">
    <h2>Edit Banner</h2>

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

    <form action="{{ route('topbar-banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="image" class="form-label">Banner Image</label>
            <input type="file" name="image" id="image" class="form-control">
            <label class="text-danger" for=""> * (DImension = 728 X 90) </label>
            @if ($banner->image)
                <div class="mt-2">
                    <img src="{{ asset('/uploads/banners/' . $banner->image) }}" alt="Current Banner Image" width="200">
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="link" class="form-label">Banner Link</label>
            <input  name="link" id="link" class="form-control" value="{{ old('link', $banner->link) }}">
        </div>

        <div class="mb-3">
            <label for="is_active" class="form-label">Is Active</label>
            <select name="is_active" id="is_active" class="form-control">
                <option value="1" {{ old('is_active', $banner->is_active) == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('is_active', $banner->is_active) == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Banner</button>
    </form>
</div>
@endsection
