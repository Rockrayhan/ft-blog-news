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

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

{{-- @endsection --}}