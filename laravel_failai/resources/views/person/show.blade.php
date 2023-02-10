@extends('layouts.admin.main')

@section('title', 'Person details')

@section('content')
    <x-forms.inputs :model="$person" fields="name,surname,personal_code,email,phone,user"/>
    <x-forms.buttons.action :model="$person"/>
@endsection
