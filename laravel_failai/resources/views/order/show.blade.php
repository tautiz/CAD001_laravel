@extends('layouts.admin.main')

@section('title', __('orders.order'))

@section('content')
    <h1>{{__('orders.order')}}</h1>
    <x-forms.inputs :model="$order ?? (new \App\Models\Order())" fields="user,shippingAddress,billingAddress,status"/>
@endsection
