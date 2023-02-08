@extends('layouts.admin.main')

@section('title', __('categories.category_new'))

@section('content')
    <h1>{{__('categories.category_new')}}</h1>
    <form action="{{route('categories.store')}}" method="post">
        <input type="text" name="name" placeholder="{{__('categories.name')}}" value="{{old('name')}}"><br>
        <input type="text" name="slug" placeholder="{{__('categories.slug')}}" value="{{old('slug')}}"><br>
        <input type="text" name="description" placeholder="{{__('categories.description')}}" value="{{old('description')}}"><br>
        <input type="text" name="image" placeholder="{{__('categories.image')}}" value="{{old('image')}}"><br>
        <input type="text" name="parent_id" placeholder="{{__('categories.parent_id')}}" value="{{old('parent_id')}}"><br>
        <input type="text" name="status_id" placeholder="{{__('categories.status_id')}}" value="{{old('status_id')}}"><br>
        <hr>
        <input type="submit" class="waves-effect waves-light btn" value="SEND">
        @csrf
    </form>
@endsection
