@extends('layouts.admin.main')

@php
    $product = $product ?? null;
@endphp

@section('title', $product ? 'Editing product' : 'Create new product')

@section('content')
    <x-basic-page :title="$product ? __('products.product_edit') : __('products.add_new')">
        <form action="{{$product ? route('products.update', $product) : route('products.store')}}"
              method="post"
              enctype="multipart/form-data"
        >
            @if($product)
                @method('PUT')
            @endif
            <x-forms.inputs :model="$product ?? (new \App\Models\Product())"
                            fields="name,slug,description,category_id,color,size,price,status_id"/>
            <input type="file" name="foto">
            <div class="divider">DO IT</div>
            <input type="submit" class="waves-effect waves-light btn" value="SEND">
            @csrf
        </form>
    </x-basic-page>
@endsection
