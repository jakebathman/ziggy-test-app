<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- Ziggy --}}
    @routes
</head>
<body>
    <div id="app" class="mx-4">
        <main class="py-4">
            <div class="text-muted"><span class="font-weight-bold">Laravel vesion:</span> {{ $laravelVersion }}</div>
            <div class="text-muted"><span class="font-weight-bold">Ziggy version:</span> {{ $ziggyVersion }}</div>
            @yield('content')
            <div id="ziggyInfo" style=" padding:24px;">
                <h2 style="margin-bottom:1em;">Route name: <strong>{{ \Request::route()->getName() }}</strong></h2>

                <h5 style="">route().current()</h5>
                <div id="currentRoute" style="display: flex;">
                    <pre style="padding-left: 42px;"></pre>
                </div>
                <h5 style="">Ziggy.namedRoutes</h5>
                <div id="namedRoutes" style="display: flex;">
                    <pre style="padding-left: 42px;"></pre>
                </div>
            </div>
            <script>
                $('#currentRoute pre').html(route().current());
                $('#namedRoutes pre').html(JSON.stringify(Ziggy.namedRoutes,null,3));
            </script>
        </main>
    </div>
</body>
</html>
