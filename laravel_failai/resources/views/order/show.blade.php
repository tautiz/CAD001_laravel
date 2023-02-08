@extends('layouts.admin.main')

@section('title', __('orders.order'))

@section('content')
    <h1>{{__('orders.order')}}</h1>
    <input type="text" name="user_id" placeholder="{{__('orders.user_id')}}" value="{{$order->user}}"><br>
    <input type="text" name="shipping_address_id" placeholder="{{__('orders.shipping_address_id')}}" value="{{$order->shippingAddress}}"><br>
    <input type="text" name="billing_address_id" placeholder="{{__('orders.billing_address_id')}}" value="{{$order->billingAddress}}"><br>
    <input type="text" name="status_id" placeholder="{{__('orders.status_id')}}" value="{{$order->status}}"><br>
@endsection
