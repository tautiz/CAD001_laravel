@extends('layouts.admin.main')

@php
    $product = $product ?? null;
@endphp

@section('title', $product ? 'Editing product' : 'Create new product')

@section('content')
    <h1>
        @if($product)
            Editing {{$product->name}}
        @else
            Creating new product
        @endif
    </h1>
    <span>
        @if($product)
            Redagavimo forma
        @else
            Sukūrimo forma
        @endif
    </span>
    <form action="{{$product ? route('products.update', $product) : route('products.store')}}"
          method="post"
          enctype="multipart/form-data"
    >
        @if($product)
            @method('PUT')
        @endif
            <x-forms.inputs :model="$product ?? (new \App\Models\Product())" fields="name,slug,description,category_id,color,size,price,status_id"/>
            <input type="file" name="foto">
            <hr>
        <input type="submit" class="waves-effect waves-light btn" value="SEND">
        @csrf
    </form>
@endsection
