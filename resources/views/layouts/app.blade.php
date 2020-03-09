<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/107c56b88c.js" crossorigin="anonymous"></script>
    @livewireStyles
</head>
<body>
    @yield('content')
    @livewireScripts
</body>
</html>
