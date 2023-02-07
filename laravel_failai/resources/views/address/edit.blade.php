@extends('layouts.admin.main')

@section('title', 'Pavadinimas')

@section('content')
    Netrukus...


    <input type="text" name="city" placeholder="City" value="{{$person->city}}"><br>
    <input type="text" name="country" placeholder="Country" value="{{$person->country}}"><br>
    <input type="text" name="email" placeholder="Email" value="{{$person->email}}"><br>
    <input type="text" name="phone" placeholder="Phone" value="{{$person->phone}}"><br>
    <input type="text" name="address" placeholder="Address" value="{{$person->address}}"><br>
    <input type="text" name="zip" placeholder="Zip" value="{{$person->zip}}"><br>
@endsection
