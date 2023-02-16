@extends('layouts.admin.main')

@section('title', __('orders.order_new'))

@section('content')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{__('orders.order_new')}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form action="{{route('orders.store')}}" method="post">
                        <x-forms.inputs :model="$order ?? (new \App\Models\Order())"
                                        fields="user_id,shipping_address_id,billing_address_id"/>
                        <div class="divider">NOW SAVE IT</div>
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
