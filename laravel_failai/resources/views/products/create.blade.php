@extends('layouts.admin.main')

@section('title', 'New Product')

@section('content')
    <h1>Editing {{$product->name}}</h1>
    <span>Redagavimo forma</span>
    <form action="{{route('products.store'}}" method="post">
        @method('PUT')
        @csrf
        <input type="text" name="name" placeholder="Name" value="{{$product->name}}"><br>
        <input type="text" name="slug" placeholder="Slug" value="{{$product->slug}}"><br>
        <input type="text" name="description" placeholder="Description" value="{{$product->description}}"><br>
        <input type="text" name="image" placeholder="Image" value="{{$product->image}}"><br>
        <input type="text" name="category_id" placeholder="Category ID" value="{{$product->category_id}}"><br>
        <input type="text" name="color" placeholder="Color" value="{{$product->color}}"><br>
        <input type="text" name="size" placeholder="Size" value="{{$product->size}}"><br>
        <input type="text" name="price" placeholder="Price" value="{{$product->price}}"><br>
        <input type="text" name="status_id" placeholder="Status ID" value="{{$product->status_id}}"><br>
        <hr>
        <input type="submit" class="waves-effect waves-light btn" value="Atnaujinti">
    </form>
@endsection
