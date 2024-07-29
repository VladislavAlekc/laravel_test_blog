@extends('index')

@section('page.title', 'Мои донаты')


{{-- <?php
dd(session()->has('alert'));
?> --}}

@section('content')
    <div class="my-4">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4 border-bottom">
                <h1>{{ __('Мои донаты') }}</h1>
            </div>

            @include('user.donates.stats')

        </div>
    </div>
@endsection
