@extends('admin.layouts.app')

@section('title', 'Create Banner')

@section('content')
<div class="container">
    <h4>Insert Top bar Banner</h4>

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

    <form action="{{ route('topbar-banner.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="image" class="form-label">Banner Image</label>
            <input type="file" name="image" id="image" class="form-control" required>
            <label class="text-danger" for=""> * (DImension = 728 X 90) </label>
        </div>

        <div class="mb-3">
            <label for="link" class="form-label">Banner Link</label>
            <input name="link" id="link" class="form-control" value="{{ old('link') }}">
        </div>

        <div class="mb-3 w-50">
            <label for="is_active" class="form-label">Is Active</label>
            <select name="is_active" id="is_active" class="form-control">
                <option value="1" {{ old('is_active') == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('is_active') == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Banner</button>
    </form>
</div>
@endsection
