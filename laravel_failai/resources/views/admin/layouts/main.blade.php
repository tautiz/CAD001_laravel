@extends('public.layouts.main')

@section('title', 'Admin');

@section('customers_header')
    <div class="px-6 pb-9">
        <div class="container mx-auto flex items-center justify-center">
            @include('admin.layouts.header')
        </div>
    </div>
@endsection

@section('admin_content')
    <div class="main_grid">
        <div class="lg:px-8 justify-center">
            @yield('content', 'Default content')
        </div>
        <br>
        @include('admin.layouts.footer')
    </div>
    <script src="{{asset('/js/mano.js')}}"></script>
@endsection
