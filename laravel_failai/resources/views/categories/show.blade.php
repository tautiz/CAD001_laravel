@extends('layouts.admin.main')

@section('title', __('categories.category'))

@section('content')
    <h1>{{__('categories.category')}}</h1>
    <x-forms.inputs :model="$category ?? (new \App\Models\Category())" fields="name,slug,description,image,status,parent,sort_order"/>
@endsection
