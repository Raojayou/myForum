<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MyForum') }} Admin</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
          integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <!-- Icons -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    @stack ('script-head')
</head>
<body>
<div id="app">
    @include('admin.partials.nav')

    @yield('content')
</div>

<footer>
    <div class="container">
        <span class="text-muted">Encuentranos en nuestras redes sociales.
                <a href="https://www.twitter.com/Raojayou1">
                    <i class="fa fa-twitter"></i></a>
                <a href="https://www.facebook.com">
                    <i class="fa fa-facebook"></i></a>
                <a href="https://www.instagram.com/Raojayoulol">
                    <i class="fa fa-instagram"></i></a>
                <a href="https://www.youtube.com/user/Raojayou">
                    <i class="fa fa-youtube"></i></a>
        </span>
    </div>
</footer>

@stack('scripts')
</body>
</html>