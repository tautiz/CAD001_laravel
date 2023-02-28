@extends('public.layouts.main')

@section('title', $category->name)

@section('content')
    <x-products :data="$products" />
@endsection
