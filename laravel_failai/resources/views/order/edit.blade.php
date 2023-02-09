@extends('layouts.admin.main')

@section('title', __('categories.order_edit'))

@section('content')
    <h1>{{__('categories.order_edit')}}</h1>
    <form action="{{route('orders.update', $order)}}" method="post">
        @method('PUT')
        <x-forms.inputs :model="$order ?? (new \App\Models\Order())" fields="user_id,shipping_address_id,billing_address_id,status_id"/>
        <hr>
        <input type="submit" class="waves-effect waves-light btn" value="SEND">
        @csrf
    </form>
@endsection

