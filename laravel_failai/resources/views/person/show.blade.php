@extends('layouts.admin.main')

@section('title', 'Pavadinimas')

@section('content')
    <x-forms.inputs :model="$person ?? (new \App\Models\Person())" fields="name,surname,personal_code,email,phone,user"/>
@endsection
