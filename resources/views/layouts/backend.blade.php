<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link href="{{ mix('css/backend.css') }}" rel="stylesheet">
    </head>
    <body class="h-full flex flex-row bg-grey-lighter">

            @auth
                <div class="flex h-full w-1/6">
                    @include('backend.menu')
                </div>
            @endauth

            <div class="flex flex-col w-full">

                @auth

                <div class="p-4 text-lg bg-white border-b border-grey">
                    @yield('toolbar')
                </div>

                @endauth

                <div class="p-4 w-full h-full">
                    @yield('content')
                </div>
            </div>
    </body>
</html>
