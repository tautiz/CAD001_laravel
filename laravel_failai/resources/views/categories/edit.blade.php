@extends('layouts.admin.main')

@section('title', __('categories.category_edit'))

@section('content')
    <h1>{{__('categories.category_edit')}}</h1>
    <form action="{{route('categories.update', $category)}}" method="post">
        <input type="text" name="name" placeholder="{{__('categories.name')}}"
               value="{{old('name') ?? $category->name}}"><br>
        <input type="text" name="slug" placeholder="{{__('categories.slug')}}"
               value="{{old('slug') ?? $category->slug}}"><br>
        <input type="text" name="description" placeholder="{{__('categories.description')}}"
               value="{{old('description') ?? $category->description}}"><br>
        <input type="text" name="image" placeholder="{{__('categories.image')}}"
               value="{{old('image') ?? $category->image}}"><br>
        <input type="text" name="parent_id" placeholder="{{__('categories.parent_id')}}"
               value="{{old('parent_id') ?? $category->parent_id}}"><br>
        <input type="text" name="status_id" placeholder="{{__('categories.status_id')}}"
               value="{{old('status_id') ?? $category->status_id}}"><br>
        <hr>
        <input type="submit" class="waves-effect waves-light btn" value="SEND">
        @csrf
    </form>
@endsection

