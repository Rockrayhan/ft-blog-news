<div class="container">
    <a href="{{ route('blogs.create') }}" class="btn btn-primary mb-3">Add Blog</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
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
                <td>{{ $blog->title }}</td>
                <td>{{ $blog->category->name ?? 'No Category' }}</td>
                <td>{{ $blog->author }}</td>
                <td>{{ $blog->tags }}</td>
                <td>
                    <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>