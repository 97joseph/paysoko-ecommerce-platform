<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" href="{{ asset('css/utilities.css') }}">
    {{ $style }}


    <link rel="shortcut icon" href="{{ asset('img/paysoko.png') }}" />
    <title>Paysoko  | Business Suite</title>

    <script src="{{ asset('js/utilities.js') }}" defer></script>
    {{ $js ?? '' }}
</head>

<body class="m-0">

    @include('components.header')

    {{-- main contents --}}
    {{ $slot }}
    {{-- main contents --}}
    <footer>
        <div class="footer-links _container flex_align">
            @each('components.temp', range(1, 4), 'link')
        </div>
        <div class="site-info">
            <a class="logo-link d-b" href="#"><img class="d-b" src="{{ asset('img/paysoko.png') }}"
                    alt="logo"></a>
            <p>Made by passion by Joseph Kibira @2024</p>
        </div>
    </footer>
</body>

</html>
