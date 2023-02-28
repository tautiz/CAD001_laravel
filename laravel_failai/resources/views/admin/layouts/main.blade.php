@extends('public.layouts.main')

@section('title', 'Admin');

@section('content')
    <div class="main_grid">
        @include('admin.layouts.header')
        <div class="lg:px-8 justify-center">
            @yield('content', 'Default content')
        </div>
        <br>
        @include('admin.layouts.footer')
    </div>
    <script src="{{asset('/js/mano.js')}}"></script>
@endsection
