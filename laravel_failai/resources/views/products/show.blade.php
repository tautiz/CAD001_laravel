@extends('layouts.admin.main')

@section('title', 'Pavadinimas')

@section('content')
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-image">
                    <img src="{{$product->image}}" alt="">
                    <span class="card-title">{{ $product->name }}</span>
                </div>
                <div class="card-content">
                    <div>ID: {{$product->id}}</div>
                    <p>Price: {{ $product->price }}</p>
                    <p>Description: {{ $product->description }}</p>
                    <p>Categories: {{ $product->category }}</p>
                    <p>Creation date: {{ $product->created_at }}</p>
                    <p>Last updated: {{ $product->updated_at }}</p>
                    <p>
                        @foreach($product->images as $file)
                            <img src="{{url($file)}}" width="50" alt="{{$file->name}}">
                        @endforeach
                            <hr>
                        @foreach($product->files as $file)
                            <span class="new badge" data-badge-caption="">
                                <a href="{{url($file)}}" style="text-decoration: none; color: white" target="_blank">{{ $file->name }}</a>
{{-- @TODO: Uzbaigti ikigalo failo trynima --}}
                                <form action="{{route('product.destroy-file', $file)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">D</button>
                                </form>
                            </span>
                        @endforeach
                    </p>
                        <br>
                </div>
                <div class="card-action">
                    <x-forms.buttons.action :model="$product" mainRoute="products" />
                </div>
            </div>
        </div>
    </div>
@endsection
