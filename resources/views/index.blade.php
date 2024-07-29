<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css">
    @stack('css')
    @vite(['resources/css/app.css'])
    <title>@yield('page.title', config('app.name'))</title>
</head>

<body>
    <div style="display: flex; flex-direction:column; min-height: 100%;">
        @include('components.alert')
        @include('components.header')
        <main>
            <div class="wrapper">
                @yield('content')
            </div>
        </main>
        @include('components.footer')
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.min.js"></script>
    @stack('js')
</body>

</html>
