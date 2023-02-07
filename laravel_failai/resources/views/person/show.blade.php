@extends('layouts.admin.main')

@section('title', 'Pavadinimas')

@section('content')
    @include('person.form_fields', $person)
@endsection
