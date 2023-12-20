<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>{{$attributes->has('title') ? "SMDB - " . $attributes->get('title') : 'SMDB'}}</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{ $head ?? null }}
    </head>
    <body>
        {{ $slot }}
    </body>
</html>
