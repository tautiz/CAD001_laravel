@extends('layouts.admin.main')

@section('title', __('categories.order_edit'))

@section('content')
    <h1>{{__('categories.order_edit')}}</h1>
    <form action="{{route('orders.update', $order)}}" method="post">
        @method('PUT')
        <input type="text" name="user_id" placeholder="{{__('orders.user_id')}}" value="{{old('user_id') ?? $order->user_id}}"><br>
        <input type="text" name="shipping_address_id" placeholder="{{__('orders.shipping_address_id')}}" value="{{old('shipping_address_id') ?? $order->shipping_address_id}}"><br>
        <input type="text" name="billing_address_id" placeholder="{{__('orders.billing_address_id')}}" value="{{old('billing_address_id') ?? $order->billing_address_id}}"><br>
        <input type="text" name="status_id" placeholder="{{__('orders.status_id')}}" value="{{old('status_id') ?? $order->status_id}}"><br>
        <hr>
        <input type="submit" class="waves-effect waves-light btn" value="SEND">
        @csrf
    </form>
@endsection

