@extends('layouts.admin.main')

@section('title', __('orders.order_list'))

@section('content')
    <h1>{{__('orders.order_list')}}</h1>
    <a href="{{route('orders.create')}}" class="waves-effect waves-light btn">{{__('orders.add_new')}}</a>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>{{__('orders.user')}}</th>
            <th>{{__('orders.shipping_address')}}</th>
            <th>{{__('orders.billing_address')}}</th>
            <th>{{__('orders.status')}}</th>

            <th>{{__('general.created_at')}}</th>
            <th>{{__('general.updated_at')}}</th>
            <th>{{__('general.actions')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{$order?->id}}</td>
                <td>{{$order?->user?->person}}</td>
                <td>{{$order?->shippingAddress}}</td>
                <td>{{$order?->billingAddress}}</td>
                <td>{{$order?->status?->name}}</td>
                <td>{{$order?->created_at}}</td>
                <td>{{$order?->updated_at}}</td>
                <td>
                    @include('layouts.admin.list_actions_buttons', ['modelObject' => $order, 'mainRoute' => 'orders'])
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
