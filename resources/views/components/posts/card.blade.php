<div class="col-12 col-md-4">
    <div class="card mb-3">
        <div class="card-body">

            <h2 class="mb-3 h4">
                <a href="{{ route('blog.show', $post->id) }}">{{ $post->title }} {{ $loop->iteration }} </a>
            </h2>

            <div class="text-muted">{{ $post->published_at->diffForHumans() }}</div>

        </div>
    </div>
</div>
