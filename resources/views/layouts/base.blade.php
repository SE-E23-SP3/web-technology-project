<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        @section('html-head')
        <title>SMDB - @yield('title', 'Home')</title>
        <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}" />
        @show
    </head>
    <body>
        @yield('body')
    </body>
</html>
