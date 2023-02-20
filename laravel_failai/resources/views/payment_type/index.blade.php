@extends('layouts.admin.main')

@section('title', __('paymentTypes.list'))

@section('content')
    <x-basic-page :title="__('paymentTypes.list')">
        <x-new-button route="paymentTypes"/>
        <x-tables.table :iterable="$paymentTypes" columns="id,name" :actions="true" mainRoute="paymentTypes"/>
    </x-basic-page>
@endsection
