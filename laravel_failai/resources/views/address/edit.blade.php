@extends('layouts.admin.main')

@section('title', 'Adreso redagavimas')

@section('content')
    <h1>Adreso redagavimas</h1>
    <form action="{{route('addresses.update', $address)}}" method="post">
        @method('PUT')
        <input type="text" name="name" placeholder="Pavadinimas" value="{{old('name') ?? $address->name}}"><br>
        <input type="text" name="country" placeholder="Šalis" value="{{old('country') ?? $address->country}}"><br>
        <input type="text" name="city" placeholder="Miestas" value="{{old('city') ?? $address->city}}"><br>
        <input type="text" name="zip" placeholder="Pašto kodas" value="{{old('zip') ?? $address->zip}}"><br>
        <input type="text" name="street" placeholder="Gatvė" value="{{old('street') ?? $address->street}}"><br>
        <input type="text" name="house_number" placeholder="Namo numeris"
               value="{{old('house_number') ?? $address->house_number}}"><br>
        <input type="text" name="apartment_number" placeholder="Buto numeris"
               value="{{old('apartment_number') ?? $address->apartment_number}}"><br>
        <input type="text" name="state" placeholder="Valstija" value="{{old('state') ?? $address->state}}"><br>
        <input type="text" name="type" placeholder="Tipas" value="{{old('type') ?? $address->type}}"><br>
        <input type="text" name="additional_info" placeholder="Papildoma informacija"
               value="{{old('additional_info') ?? $address->additional_info}}"><br>
        <input type="text" name="user_id" placeholder="Vartotojo ID"
               value="{{old('user_id') ?? $address->user_id}}"><br>
        <hr>
        <input type="submit" class="waves-effect waves-light btn" value="{{__('messages.save')}}">
        @csrf
    <form>
@endsection
