@extends('index')

@section('page.title', 'Создание поста')

@section('content')
<div class="my-4">
    <div class="container">
        <div class="d-flex flex-column mb-4">
            <a class="mb-3" href="{{route('user.posts.index')}}">{{__('Назад')}}</a>
            <h1 class="mb-4">{{__('Создание поста')}}</h1>
        </div>
       
        <form action="{{route('user.posts.store')}}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label class="required mb-2">{{__('Название поста')}}</label>
            <input type="text" name="title" class="form-control" value="{{old('title')}}">   
            <x-errors name='title'/> 
        </div>
        <div class="mb-3">
            <label class="required mb-2">{{__('Содержание поста')}}</label>          
            <x-trix name="content"  value="{{old('content')}}"/>  
            <x-errors name='content'/> 
        </div>
        <div class="mb-3">
            <label for="start" class="mb-2">{{__('Создание поста')}}</label>
            <input type="date" class="form-control w-25 " id="start" name="published_at" value="{{date('Y-m-d')}}" min="{{date('Y-m-d')}}" max="{{date('Y-m-d')}}" /> 
        </div>
        <div class="mb-3">
            <label for="published" class="mb-2">{{__('Опубликовано')}}</label>
            <input class="form-check-input" name="published" type="checkbox" value="1" id="published" >
        </div>
        <button type="submit" class="btn btn-primary">{{__('Создать пост')}}</button>
    
        </form>
    </div>
</div>
@endsection
