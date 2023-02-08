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
    <form action="{{$product ? route('products.edit', $product) : route('products.store')}}" method="post">
        @if($product)
            @method('PUT')
        @endif
        <input
            type="text"
            name="name"
            placeholder="Name"
            value="{{old('name') ?? $product?->name}}"
            class="@error('name') is-invalid @enderror"
        ><br>
        <input type="text" name="slug" placeholder="Slug" value="{{old('slug') ?? $product?->slug}}"><br>
        <input type="text" name="description" placeholder="Description"
               value="{{old('description') ?? $product?->description}}"><br>
        <input type="text" name="image" placeholder="Image" value="{{old('image') ?? $product?->image}}"><br>
        <input type="text" name="category_id" placeholder="Category ID"
               value="{{old('category_id') ?? $product?->category_id}}"><br>
        <input type="text" name="color" placeholder="Color" value="{{old('color') ?? $product?->color}}"><br>
        <input type="text" name="size" placeholder="Size" value="{{old('size') ?? $product?->size}}"><br>
        <input type="text" name="price" placeholder="Price" value="{{old('price') ?? $product?->price}}"><br>
        <input type="text" name="status_id" placeholder="Status ID"
               value="{{old('status_id') ?? $product?->status_id}}"><br>
        <hr>
        <input type="submit" class="waves-effect waves-light btn" value="SEND">
        @csrf
    </form>
@endsection
