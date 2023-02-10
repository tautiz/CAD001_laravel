@extends('layouts.admin.main')

@section('title', 'Vartotojo informacija')

@section('content')
    @include('users.form_fields', $user)
    <x-forms.buttons.action :model="$user"/>
@endsection
