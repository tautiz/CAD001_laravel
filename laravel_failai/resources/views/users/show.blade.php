@extends('layouts.admin.main')

@section('title', 'Vartotojo informacija')

@section('content')
    @include('users.form_fields', $user)
@endsection
