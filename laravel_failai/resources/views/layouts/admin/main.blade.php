<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'E-Shop'))</title>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="icon" type="image/svg+xml" href="{{asset('favicon.svg')}}">

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>

{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">--}}
{{--    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" >--}}
{{--    <link href="{{asset('/css/style.css')}}" rel="stylesheet">--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>--}}

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@shoelace-style/shoelace@2.0.0/dist/themes/light.css"/>
    <script type="module" src="https://cdn.jsdelivr.net/npm/@shoelace-style/shoelace@2.0.0/dist/shoelace.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.50.1/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        clifford: '#da373d',
                    }
                }
            }
        }
        module.exports = {
            plugins: [require("@tailwindcss/typography"), require("daisyui")],
            daisyui: {
                styled: true,
                themes: true,
                base: true,
                utils: true,
                logs: true,
                rtl: false,
                prefix: "",
                darkTheme: "dark",
            },
        }
    </script>

    <link rel="stylesheet" href="{{asset('/css/app.css')}}" />
    <script type="module" src="{{asset('/js/mano.js')}}"></script>
</head>
<body>
{{--<img src="{{asset('/img/background.png')}}" class="full_fit" alt="">--}}
<div class="main_grid">
    @include('layouts.admin.header')
    <div class="container">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="message hidden">{{ $error }}</div>
            @endforeach
        @endif
        @yield('content', 'Default content')
    </div>
    <br>
    @include('layouts.admin.footer')
</div>
<script src="{{asset('/js/mano.js')}}"></script>
</body>
</html>
