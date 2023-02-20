@extends('layouts.main')

@section('title', 'Admin');

@section('content')
<div class="main_grid">
    @include('layouts.admin.header')
    <div class="lg:px-8 justify-center">
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
@endsection
