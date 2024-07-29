@extends('index')

@section('page.title', "Пост $post->id")


@section('content')
<div class="my-4">
<div class="container">
    <div  class="mb-3">  <a  href="{{route('user.posts.index')}}">{{__('Назад')}}</a></div>
  
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-4">{{__('Просмотр поста')}}</h1>
        <a  href="{{route('user.posts.edit', $post->id)}}">{{__('Редактировать пост')}}</a>
       
     </div>
    <div>
   
</div>
    <div class="d-flex flex-column p-4 w-50 mb-3">
        <h3 class="mb-3 text-success"> 
           
           {{$post -> name}}  
        </h3>
        <div class="d-flex flex-column mb-3">
           {{$post -> title}} 
        </div>
        <div class="text-muted">{{now()->format('d.m.Y H:i')}}</div>
    </div>

</div>
</div>
</div>

@endsection