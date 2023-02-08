@extends('layouts.admin.main')

@section('title', __('categories.category'))

@section('content')
    <h1>{{__('categories.category')}}</h1>
        <input type="text" name="name" placeholder="{{__('categories.name')}}" value="{{$category->name}}"><br>
        <input type="text" name="slug" placeholder="{{__('categories.slug')}}" value="{{$category->slug}}"><br>
        <input type="text" name="description" placeholder="{{__('categories.description')}}" value="{{$category->description}}"><br>
        <input type="text" name="image" placeholder="{{__('categories.image')}}" value="{{$category->image}}"><br>
        <input type="text" name="parent_id" placeholder="{{__('categories.parent')}}" value="{{$category->parent?->name}}"><br>
        <input type="text" name="status_id" placeholder="{{__('categories.status')}}" value="{{$category->status?->name}}"><br>
@endsection
