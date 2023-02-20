@extends('layouts.main')

@section('title', $category->title)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ $category->title }}</h1>
                <p>{{ $category->description }}</p>
            </div>
        </div>
    </div>
    <x-products :data="$category->products" />
@endsection
