@extends('layouts.admin.main')

@section('title', 'Pavadinimas')

@section('content')
    @include('person.form_fields', $person)
    <input type="text" value="{{$person->user}}"><br>
@endsection
