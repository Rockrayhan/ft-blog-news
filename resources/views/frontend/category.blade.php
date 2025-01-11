<div class="container">
    <h2>{{ $category->name }} Blogs</h2>
    
    @if($blogs->isEmpty())
        <p>No blogs available in this category yet.</p>
    @else
        <div class="row">
            @foreach($blogs as $blog)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $blog->title }}</h5>
                            <p class="card-text">{{ Str::limit($blog->content, 100) }}</p>
                            {{-- <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-primary">Read More</a> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>