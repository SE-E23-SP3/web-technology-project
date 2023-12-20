<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>{{$attributes->has('title') ? "SMDB - " . $attributes->get('title') : 'SMDB'}}</title>
        <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{ $head ?? null }}
        <link rel="stylesheet" type="text/css" href="{{asset('css/cookie.css')}}" />
    </head>
    <body>
        {{ $slot }}
        @if (!Cookie::has('acceptedCookies'))
            <x-cookie-consent.cookie/>
        @endif
    </body>
</html>