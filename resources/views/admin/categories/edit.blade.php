{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}
<div class="container">
    <h2>Edit Category</h2>
    <form action="/categories/{{ $category->id }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $category->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="feature_in_home" class="form-label">Feature in Home</label><br>
            <input type="radio" name="feature_in_home" value="1" id="yes" {{ old('feature_in_home', $category->feature_in_home) == 1 ? 'checked' : '' }}>
            <label for="yes" class="form-label">Yes</label>
            <input type="radio" name="feature_in_home" value="0" id="no" {{ old('feature_in_home', $category->feature_in_home) == 0 ? 'checked' : '' }}>
            <label for="no" class="form-label">No</label>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

{{-- @endsection --}}
