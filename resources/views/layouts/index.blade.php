<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keyword" content="kadın gömlek, erkek gömlek, sıfır kol kadın gömlek, uzun kol kadın gömlek,">
    <title>@yield("title")</title>
    <link rel="icon" href="{{ url('/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    @yield('css')
</head>
<body>
@include("layouts.header")
@yield("content")
@include("layouts.footer")
@yield('js')

<script src="{{asset("assets/bootstrap/js/popper.min.js")}}"></script>
<script src="{{asset("assets/bootstrap/js/bootstrap.min.js")}}"></script>
</body>
</html>

