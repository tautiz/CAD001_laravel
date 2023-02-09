@extends('layouts.admin.main')

@section('title', __('orders.order_new'))

@section('content')
    <h1>{{__('orders.order_new')}}</h1>
    <form action="{{route('orders.store')}}" method="post">
        <x-forms.inputs :model="$order ?? (new \App\Models\Order())" fields="user_id,shipping_address_id,billing_address_id"/>
        <hr>
        <input type="submit" class="waves-effect waves-light btn" value="SEND">
        @csrf
    </form>
@endsection
