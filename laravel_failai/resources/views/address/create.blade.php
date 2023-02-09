@extends('layouts.admin.main')

@section('title', 'Adreso kūrimas')

@section('content')
    <h1>Adreso kūrimas</h1>
    <form action="{{route('addresses.store')}}" method="post">
        <x-forms.inputs :model="$address ?? (new \App\Models\Address())"
                        fields="name,country,city,zip,street,house_number,apartment_number,state,type,additional_info,user_id"/>
        <input type="submit" class="waves-effect waves-light btn" value="{{__('messages.save')}}">
        @csrf
        <form>
@endsection
