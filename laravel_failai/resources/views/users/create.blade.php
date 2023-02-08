@extends('layouts.admin.main')

@section('title', 'Kuriame vartotoją')

@section('content')
    <h1>Creating user</h1>
    <span>Creating</span>
    <form action="{{route('users.store')}}" method="post">
        @include('users.form_fields', ['user' => null])
        <input type="password" name="password" placeholder="Password"><br>
        <input type="password" name="password_confirmation" placeholder="Password confirmation"><br>
        @csrf
        <hr>
        <input type="submit" class="waves-effect waves-light btn" value="Create">
    </form>
@endsection
