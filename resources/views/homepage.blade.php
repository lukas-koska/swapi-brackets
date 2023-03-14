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

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #E63946;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body @class('homepage')>

    <section id="main-homapage" class="flex-center position-ref full-height">
        <div @class(['row'])>

            <div @class(['col-12'])>
                <h1 @class(['title'])>
                    Planets Explorer
                </h1>
            </div>
            <div @class(['col-12', 'links', 'content'])>
                <a @class(['button', 'm-b-md']) href="/{{ app()->getLocale() }}/planets">
                    {{ __('planets.browse') }}
                </a>
            </div>
            <div @class(['col-12', 'content'])>
                {{ __('i.have') }} {{ $planetsCount }} {{ __('planets') }}
            </div>

        </div>
    </section>

    @include('footer')

    <script src="{{ asset('js/vendor/jquery.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
