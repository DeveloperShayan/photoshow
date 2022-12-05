<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
    <title>Photo Show App</title>
</head>
<body>
    
    @include('inc.nav')
    @include('inc.messages')
    <div class="m-3"></div>
    <div class="container">
        @yield('content')
    </div>

</body>
</html>