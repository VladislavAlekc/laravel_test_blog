@extends('index')

@section('page.title', 'Изменить пост')


@section('content')
<div class="my-4">
    <div class="container">
        <div class="d-flex flex-column mb-4">
            <a class="mb-3" href="{{route('user.posts.show', $post->id) }}">{{__('Назад')}}</a>
            <h1 class="mb-4">{{__('Изменение поста')}}</h1>
        </div>
    <form action="{{route('user.posts.update', $post->id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label class="required mb-2">{{__('Название поста')}}</label>
            <input type="text" name="title" value="{{$post->name}}" class="form-control"> 
            <x-errors name='title'/>         
        </div>
        <div class="mb-3">
            <label class="required mb-2">{{__('Содержание поста')}}</label>          
            <x-trix name="content" value="{{$post -> title ?? ''}}"/>    
            <x-errors name='title'/>           
        </div>
        <button type="submit" class="btn btn-primary">{{__('Сохранить')}}</button>
    </form>
    </div>
</div>


@endsection
