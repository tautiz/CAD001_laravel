@extends('layouts.admin.main')

@section('title', 'Kuriame persona')

@section('content')
    <h1>Creating person</h1>
    <span>Creating</span>
    <form action="{{route('persons.store')}}" method="post">
        @include('person.form_fields', ['person' => null, 'argumentai' => ''])
        @csrf
        <hr>
        <input type="submit" class="waves-effect waves-light btn" value="Create">
    </form>
@endsection
