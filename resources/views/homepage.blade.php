<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ __('title.homepage') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('css/foundation.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.7.5/css/foundation-float.min.css" integrity="sha512-COhcCg6IPtpBb4rDu3fJb+MOVP8vjJmoASF9jl8KoPQwQTlh3pKBE7FHPBPLnd3jV/ZJ77g+8haAFlNwtkOi1Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="https://kit.fontawesome.com/2776f5b3c6.js" crossorigin="anonymous"></script>
    </head>
    <body @class('homepage')>

    @include('navbar')

    <section id="main-homapage" @class('homepage-main-image')>
        <div @class('booking')>
            <a @class(['button']) href="#">
                {{ __('page.booking') }}
            </a>
            <div @class(['special-booking-line'])></div>
        </div>

        <h1>
            {!! __('homepage.headline') !!}
        </h1>
    </section>

    @include('news')

    @include('footer')

    <script src="{{ asset('js/vendor/jquery.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>
    <script src="{{ asset('js/vendor/what-input.js') }}"></script>
    <script src="{{ asset('js/vendor/foundation.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/menu.js') }}"></script>
    <script src="{{ asset('js/news.js') }}"></script>
    </body>
</html>
