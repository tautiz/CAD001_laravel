@extends('layouts.admin.main')

@section('title', __('paymentTypes.paymentType_edit'))

@section('content')
    <h1>{{__('paymentTypes.paymentType_edit')}}</h1>
    <form action="{{route('paymentTypes.update', $paymentType)}}" method="post">
        @method('PUT')
        <x-forms.input field="name" :model="$paymentType"/>
        <hr>
        <input type="submit" class="waves-effect waves-light btn" value="SEND">
        @csrf
    </form>
@endsection

