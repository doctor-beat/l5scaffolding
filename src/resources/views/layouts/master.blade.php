<html>
    <head>
        <title>Scaffold - @yield('title')</title>
    </head>
    <body>
        <h1>Scaffold @yield('title')</h1>

        <p class="buttons">
            <a href="{{ route('scf-models') }}">Models</a>
            @include('l5scaffolding::shared.buttons')
            @yield('buttons')
        </p>

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>