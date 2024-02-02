<html>
    <head>
        <title>App Name - @yield('titulo')</title>
    </head>
    <body>
        @section('encabezado')
            This is the master sidebar.
        @show
 
        <div class="container">
            @yield('contenido')
        </div>
    </body>
</html>