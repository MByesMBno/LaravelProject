<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>

        </style>
    @endif
    <title>NothernFoxShop</title>
</head>
<body>

    <div class="card">
        @foreach ($data as $el)
            <h2>{{$el->name}}</h2>
            <h3>{{$el->tastes}}</h3>
            <p>{{$el->description}}</p>
        @endforeach

    </div>


</body>
</html>

