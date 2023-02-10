@extends('layouts.admin.main')

@section('title', __('paymentTypes.paymentsType'))

@section('content')
    <h1>{{__('paymentTypes.paymentsTypes')}}</h1>
    <x-forms.input field="name" :model="$paymentType"/>
    <x-forms.buttons.action :model="$paymentType"/>
@endsection
