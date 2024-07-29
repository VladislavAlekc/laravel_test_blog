@extends('index')

@section('page.title', 'Статьи')


@section('content')
    <div class="my-4">
        <div class="container">
            <h1 class="mb-4">{{ __('Список постов') }}</h1>
            <form class="my-3" action="{{ route('blog') }}" method="GET">

                <div class="d-flex">
                    <select class="form-control w-50 " style="margin-right: 64px" value="{{ request('category_id') }}"
                        name="category_id">
                        @foreach ($options as $key => $text)
                            <option value="{{ $key }}" {{ $key == request('category_id') ? 'selected' : '' }}>
                                {{ $text }}
                            </option>
                        @endforeach

                    </select>
                    <input type="search" class="form-control" value="{{ request()->input('search') }}" name="search"
                        placeholder="{{ __('Поиск') }}">
                    <input type="search" class="form-control ms-4" value="{{ request()->input('from_date') }}"
                        name="from_date" placeholder="{{ __('Поиск по дате начала') }}">
                    <input type="search" class="form-control ms-4" value="{{ request()->input('to_date') }}"
                        name="to_date" placeholder="{{ __('Поиск по дате окончания') }}">
                    <input type="search" class="form-control ms-4" value="{{ request()->input('tags') }}" name="tags"
                        placeholder="{{ __('Поиск по тэгам') }}">
                    <button type="submit" class="btn btn-primary ms-3">{{ __('Поиск') }}</button>
                </div>

            </form>
            @if ($posts->isEmpty())
                <div>
                    {{ __('Нет ни одного поста') }}
                </div>
            @else
                <div class="row ">
                    @foreach ($posts as $post)
                        <x-posts.card :post="$post" :loop="$loop" />
                    @endforeach
                </div>
                {{ $posts->links() }}
        </div>
    </div>
    @endif
@endsection
