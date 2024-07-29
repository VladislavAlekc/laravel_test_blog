@extends('index')

@section('page.title', 'Мои посты')


{{-- <?php
dd(session()->has('alert'));
?> --}}

@section('content')
    <div class="my-4">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>{{ __('Список постов') }}</h1>
                <a href="{{ route('user.posts.create') }}">{{ __('Создать пост') }}</a>

            </div>
            <form class="my-3" action="{{ route('user.posts.index') }}" method="GET">

                <div class="d-flex">
                    <select class="form-control w-25 " style="margin-right: 96px" value="{{ request('category_id') }}"
                        name="category_id">
                        @foreach ($options as $key => $text)
                            <option value="{{ $key }}" {{ $key == request('category_id') ? 'selected' : '' }}>
                                {{ $text }}
                            </option>
                        @endforeach

                    </select>
                    <input type="search" class="form-control" value="{{ request()->input('search') }}" name="search"
                        placeholder="{{ __('Поиск') }}">


                    <button type="submit" class="btn btn-primary ms-3">{{ __('Поиск') }}</button>

                </div>

            </form>

            @if (@empty($posts))
                <div>
                    {{ __('Нет ни одного поста') }}
                </div>
            @else
                <div class="d-flex flex-column  align-items-center ">
                    @foreach ($posts as $post)
                        <div class="d-flex flex-column  align-items-center border p-4 w-50 my-3 ">
                            <h3 class="mb-3">

                                <a class="text-success"
                                    href="{{ route('user.posts.show', $post->id) }}">{{ $post->title }}
                                    {{ $loop->iteration }} </a>
                            </h3>
                            <div class="d-flex flex-column mb-3">
                                {{ $post->content }}
                            </div>
                            <div class="text-muted">
                                {{ $post->published_at?->format('H:i:s d.m.Y') }}
                                {{-- published_at? - можеть быть и null --}}
                            </div>
                        </div>
                    @endforeach

                </div>
                {{ $posts->links() }}
        </div>
    </div>
    @endif
@endsection
