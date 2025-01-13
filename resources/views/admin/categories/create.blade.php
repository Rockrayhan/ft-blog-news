
@extends('admin.layouts.app')
@section('title', 'Create Category')
@section('content')

<div class="container">
    <h2>Add Category</h2>
    <form action="{{route('categories.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Feature in Home</label>
            <div>
                <div class="form-check form-check-inline">
                    <input type="radio" name="feature_in_home" id="feature_yes" value="1" class="form-check-input" {{ old('feature_in_home', $category->feature_in_home ?? 0) == 1 ? 'checked' : '' }}>
                    <label for="feature_yes" class="form-check-label">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" name="feature_in_home" id="feature_no" value="0" class="form-check-input" {{ old('feature_in_home', $category->feature_in_home ?? 0) == 0 ? 'checked' : '' }}>
                    <label for="feature_no" class="form-check-label">No</label>
                </div>
            </div>
        </div>
        

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection


