@extends('layouts.admin.main')

@section('title', 'Editing user')

@section('content')
    <h1>Edit user</h1>
    <span>Editing {{$user->name}}</span>
    <form action="{{route('users.update', $user)}}" method="post">
        @method('PUT')
        @include('users.form_fields', $user)
        <input type="password" name="password" placeholder="Password" value="{{old('password')}}"><br>
        <input type="password" name="password_confirmation" placeholder="Password confirmation" value="{{old('password_confirmation')}}"><br>
        @csrf
        <hr>
        <input type="submit" class="waves-effect waves-light btn" value="Update">
    </form>
@endsection
