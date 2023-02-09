@extends('layouts.admin.main')

@section('title', __('categories.category_edit'))

@section('content')
    <h1>{{__('categories.category_edit')}}</h1>
    <form action="{{route('categories.update', $category)}}" method="post">
        @method('PUT')
        <x-forms.inputs :model="$category ?? (new \App\Models\Category())" fields="name,slug,description,image,status_id,parent_id,sort_order"/>
        <input type="submit" class="waves-effect waves-light btn" value="SEND">
        @csrf
    </form>
@endsection

