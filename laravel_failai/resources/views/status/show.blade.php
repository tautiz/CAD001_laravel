@extends('layouts.admin.main')

@section('title', __('paymentTypes.paymentsType'))

@section('content')
    <h1>{{__('paymentTypes.paymentsTypes')}}</h1>
    <x-forms.inputs :model="$status" fields="name,type"/>
@endsection
