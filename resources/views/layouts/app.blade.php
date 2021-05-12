<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:400,500,700,400italic|Material+Icons">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">

        <dash url_logout="{{url('/logout')}}" user='{{ Auth::user()->name }}'>
            <template slot="content">             
                @yield('content')
            </template>
        </dash>
    </div>
    <script>
        @auth
        window.Permissions = {!!json_encode(Auth::user()->allPermissions, true) !!};
        @else
        window.Permissions = [];
        @endauth
    </script>
</body>

</html>