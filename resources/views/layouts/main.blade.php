<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/js/app.js'])
    <title>Document</title>
</head>
<body>
<div>
    <div>
        <nav>
            <a href="{{route('main-page')}}">Generate text</a>
            <a href="{{route('text.create')}}">Add text</a>
            <a href="{{route('text.index')}}">Show texts</a>
        </nav>
    </div>
    @yield('content')
</div>
</body>
</html>
