@extends('index')

@section('page.title', "Статья $post->id")



@section('content')
    <div class="container">
        <div class="my-3">
            <a href="{{ route('blog') }}">Назад</a>
        </div>
        <h3 class="mb-3">
            {{ $post->title }}
        </h3>
        <div class="d-flex flex-column mb-3">
            {{ $post->content }}
        </div>
        <div class="text-muted">{{ $post->published_at }}</div>
    </div>
@endsection
