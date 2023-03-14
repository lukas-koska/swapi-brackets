<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ __('title.planets') }}</title>

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

            .row {
                width: 100%;
            }

            .flex-center {
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
                display: flex;
                text-align: center;
                width: 100%;
            }

            .title {
                font-size: 84px;
            }

            .links > a, .links > button {
                color: #fff;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                background-color: #E63946;
                padding: 16px 32px;
                border: none;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            form {
                align-items: center;
                display: flex !important;
            }

            form > div {
                display: flex;
                flex-direction: column;
                margin: 0 4px;
            }

            form > div > label {
                display: flex;
                margin-bottom: 8px;
            }

            form input.input {
                display: flex;
                font-size: 16px;
                border: 1px solid #F1FAEE;
                padding: 8px 16px;
            }

            .planet {
                display: flex;
                margin: 30px;
                border: 1px solid #F1FAEE;
                width: 30%;
            }

            .planet ul {
                list-style: none;
                color: #1D3557;
                font-weight: 400;
            }

            .planet ul li {
                text-align: left;
            }

            .planet ul span {
                color: #A8DADC;
                font-weight: 200;
            }
        </style>
    </head>
    <body>

    <section id="main-homapage" class="flex-center position-ref full-height">
        <div @class(['row'])>

            <div @class(['col-12'])>
                <h1 @class(['title'])>
                    Planets Explorer
                </h1>
            </div>
            <div @class(['filter', 'm-b-md'])>
                <form method="get">
                    <div>
                        <label for="diameter">{{ __('diameter') }}</label>
                        <input @class(['input']) name="diameter" id="diameter" type="number">
                    </div>
                    <div>
                        <label for="rotation_period">{{ __('rotation.period') }}</label>
                        <input @class(['input']) name="rotation_period" id="rotation_period" type="number">
                    </div>
                    <div>
                        <label for="gravity">{{ __('gravity') }}</label>
                        <input @class(['input']) name="gravity" id="gravity" type="number">
                    </div>
                    <div @class(['links'])>
                        <button type="submit" @class(['button', 'm-b-md'])>
                            {{ __('planets.browse') }}
                        </button>
                    </div>
                </form>
            </div>
            <div @class(['col-12', 'content'])>
                @foreach($planets->items() as $key => $planet)
                    <div @class(['planet'])>
                        <ul>
                            <li>
                                <span>{{ __('planet') }} #{{ $key + 1 }}</span>
                            </li>
                            <li>
                                <span>{{ __('diameter') }}</span>
                                {{ $planet['diameter'] }}
                            </li>
                            <li>
                                <span>{{ __('rotation.period') }}</span>
                                {{ $planet['rotationPeriod'] }}
                            </li>
                            <li>
                                <span>{{ __('orbital.period') }}</span>
                                {{ $planet['orbitalPeriod'] }}
                            </li>
                            <li>
                                <span>{{ __('gravity') }}</span>
                                {{ $planet['gravity'] }}
                            </li>
                            <li>
                                <span>{{ __('population') }}</span>
                                {{ $planet['population'] }}
                            </li>
                            <li>
                                <span>{{ __('climate') }}</span>
                                {{ $planet['climate'] }}
                            </li>
                            <li>
                                <span>{{ __('terrain') }}</span>
                                {{ $planet['terrain'] }}
                            </li>
                            <li>
                                <span>{{ __('surface.water') }}</span>
                                {{ $planet['surfaceWater'] }}
                            </li>
                        </ul>
                    </div>
                @endforeach
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
    </section>

    @include('footer')

    <script src="{{ asset('js/vendor/jquery.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
