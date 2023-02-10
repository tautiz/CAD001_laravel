@extends('layouts.admin.main')

@section('title', __('orders.order'))

@section('content')
    <h1>{{__('orders.order')}}</h1>
    <x-forms.inputs :model="$order" fields="user,shippingAddress,billingAddress,status"/>
    <x-forms.buttons.action :model="$order"/>
@endsection
