<html>
    <head>
        <title>App Name - @yield('titulo')</title>
    </head>
    <body>
        @section('sidebar')
            This is the master sidebar.
        @show
 
        <div class="container">
            @yield('contenido')
        </div>
    </body>
</html>