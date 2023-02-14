@extends('layouts.admin.main')

@section('title', 'Pavadinimas')

@section('content')
    <div class="row">
        <div class="col s12 m3">
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
                </div>
                <div class="card-action">
                    <x-forms.buttons.action :model="$product" mainRoute="products" />
                </div>
            </div>
        </div>
    </div>
@endsection
