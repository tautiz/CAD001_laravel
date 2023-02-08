@extends('layouts.admin.main')

@section('title', __('orders.order_new'))

@section('content')
    <h1>{{__('orders.order_new')}}</h1>
    <form action="{{route('orders.store')}}" method="post">
        <input type="text" name="user_id" placeholder="{{__('orders.user_id')}}" value="{{old('user_id')}}"><br>
        <input type="text" name="shipping_address_id" placeholder="{{__('orders.shipping_address_id')}}" value="{{old('shipping_address_id')}}"><br>
        <input type="text" name="billing_address_id" placeholder="{{__('orders.billing_address_id')}}" value="{{old('billing_address_id')}}"><br>
        <input type="text" name="status_id" placeholder="{{__('orders.status_id')}}" value="{{old('status_id')}}"><br>
        <hr>
        <input type="submit" class="waves-effect waves-light btn" value="SEND">
        @csrf
    </form>
@endsection
