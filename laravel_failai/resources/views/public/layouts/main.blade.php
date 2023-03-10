<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark" class="dark" data-mode="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'E-Shop'))</title>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="icon" type="image/svg+xml" href="{{asset('favicon.svg')}}">

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@shoelace-style/shoelace@2.0.0/dist/themes/light.css"/>
    <script type="module" src="https://cdn.jsdelivr.net/npm/@shoelace-style/shoelace@2.0.0/dist/shoelace.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.50.1/dist/full.css" rel="stylesheet" type="text/css"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" type="text/css"/>
    <script defer src="{{ mix('/js/app.js') }}"></script>

    <script type="module" src="{{asset('/js/mano.js')}}"></script>

    @yield('css_files')
</head>
<body>
<div class="main_grid">
    @include('public.layouts.header')
    <div class="lg:px-8 justify-center">
        @include('public.layouts.flash-message')
        @hasSection('admin_content')
            @yield('admin_content')
        @else
            @yield('content', 'Missing page content')
        @endif
    </div>
    <br>
    @include('public.layouts.footer')
</div>
</body>
</html>
