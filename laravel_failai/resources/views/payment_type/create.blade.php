@php use App\Models\PaymentType; @endphp
@extends('layouts.admin.main')

@section('title', __('paymentTypes.paymentType_new'))

@section('content')
    <h1>{{__('paymentTypes.paymentType_new')}}</h1>
    <x-basic-page :title="__('paymentTypes.paymentType_new')">
        <form action="{{route('paymentTypes.store')}}" method="post">
            <x-forms.inputs :model="(new PaymentType())" fields="name"/>
            <div class="divider">AND NOW</div>
            <input type="submit" class="waves-effect waves-light btn" value="SEND">
            @csrf
        </form>
    </x-basic-page>
@endsection
