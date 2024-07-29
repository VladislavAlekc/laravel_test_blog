@extends('index')

@section('page.title', 'Регистрация')



@section('content')
<section>
    <div class="container">
       <div class="row my-5">
        <div class="col-12 col-md-6 offset-md-3">
            <x-register-modal />
        </div>
       </div>
    </div>
</section>
@endsection