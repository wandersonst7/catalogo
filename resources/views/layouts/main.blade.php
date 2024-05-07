<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset("css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{ asset("css/styles.css")}}">
    <link rel="stylesheet" href="{{ asset("css/nav-bar.css")}}">
    <script src="{{ asset("js/bootstrap.bundle.min.js")}}" defer></script>
    <title>@yield('title')</title>
</head>
<body>
    @auth
        <x-nav-bar :username="Auth::user()->username"></x-nav-bar>
    @endauth

    @guest
        <x-nav-bar :username="''"></x-nav-bar>
    @endguest

    @yield('content')
</body>
</html>