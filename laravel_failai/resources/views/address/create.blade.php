@extends('layouts.admin.main')

@section('title', 'Adreso kūrimas')

@section('content')
    <h1>Adreso kūrimas</h1>
    <form action="{{route('addresses.store')}}" method="post">
        <input type="text" name="name" placeholder="Pavadinimas" value="{{old('name')}}"><br>
        <input type="text" name="country" placeholder="Šalis" value="{{old('country')}}"><br>
        <input type="text" name="city" placeholder="Miestas" value="{{old('city')}}"><br>
        <input type="text" name="zip" placeholder="Pašto kodas" value="{{old('zip')}}"><br>
        <input type="text" name="street" placeholder="Gatvė" value="{{old('street')}}"><br>
        <input type="text" name="house_number" placeholder="Namo numeris"
               value="{{old('house_number')}}"><br>
        <input type="text" name="apartment_number" placeholder="Buto numeris"
               value="{{old('apartment_number')}}"><br>
        <input type="text" name="state" placeholder="Valstija" value="{{old('state')}}"><br>
        <select name="type" name="type" >
            <option value="home">Home</option>
            <option value="work">Work</option>
            <option value="other">Other</option>
        </select>
        <input type="text" name="additional_info" placeholder="Papildoma informacija"
               value="{{old('additional_info')}}"><br>
        <input type="text" name="user_id" placeholder="Vartotojo ID"
               value="{{old('user_id')}}"><br>
        <hr>
        <input type="submit" class="waves-effect waves-light btn" value="{{__('messages.save')}}">
        @csrf
        <form>
@endsection
