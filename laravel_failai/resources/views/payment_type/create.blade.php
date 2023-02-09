@php use App\Models\PaymentType; @endphp
@extends('layouts.admin.main')

@section('title', __('paymentTypes.paymentType_new'))

@section('content')
    <h1>{{__('paymentTypes.paymentType_new')}}</h1>
    <form action="{{route('paymentTypes.store')}}" method="post">
        <x-forms.inputs :model="(new PaymentType())" fields="name"/>
        <hr>
        <input type="submit" class="waves-effect waves-light btn" value="SEND">
        @csrf
    </form>
@endsection
