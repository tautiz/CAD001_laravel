@extends('layouts.admin.main')

@section('title', 'Editing person')

@section('content')
    <h1>Edit person</h1>
    <span>Editing {{$person->name}}</span>
    <form action="{{route('persons.update', $person)}}" method="post">
        @method('PUT')
        @include('person.form_fields', $person)
        <input type="text" name="user_id" value="{{$person->user_id}}"><br>

        @csrf
        <hr>
        <input type="submit" class="waves-effect waves-light btn" value="Update">
    </form>
@endsection
