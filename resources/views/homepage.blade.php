<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ __('title.homepage') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="https://kit.fontawesome.com/2776f5b3c6.js" crossorigin="anonymous"></script>
    </head>
    <body @class('homepage')>

    <div id="app">
        <example-component></example-component>
    </div>

    <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
