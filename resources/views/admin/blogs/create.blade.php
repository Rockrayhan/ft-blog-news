<div class="container">
    <h2>Create Blog</h2>
    <form action="{{ route('blogs.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" id="category_id" class="form-control">
                <option value="">No Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" name="author" id="author" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="tags" class="form-label">Tags</label>
            <input type="text" name="tags" id="tags" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>