@extends('layouts.admin.main')

@section('title', 'Editing person')

@section('content')
    <h1>Edit person</h1>
    <span>Editing {{$person->name}}</span>
    <form action="{{route('persons.update', $person)}}" method="post">
        @method('PUT')
        <x-forms.inputs :model="$person ?? (new \App\Models\Person())" fields="name,surname,personal_code,email,phone,user_id"/>
        @csrf
        <hr>
        <input type="submit" class="waves-effect waves-light btn" value="Update">
    </form>
@endsection
