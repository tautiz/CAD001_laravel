@extends('layouts.admin.main')

@section('title', __('products.list'))

@section('content')
    <x-basic-page :title="__('products.list')">
        <x-new-button route="products"/>
        <x-tables.table :iterable="$products" :columns="['id','name','price','status']" :actions="true"/>
    </x-basic-page>
@endsection
