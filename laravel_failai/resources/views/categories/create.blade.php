@extends('layouts.admin.main')

@section('title', __('categories.category_new'))

@section('content')
    <h1>{{__('categories.category_new')}}</h1>
    <form action="{{route('categories.store')}}" method="post">
        <x-forms.inputs :model="$category ?? (new \App\Models\Category())" fields="name,slug,description,image,status_id,parent_id,sort_order"/>
        <hr>
        <input type="submit" class="waves-effect waves-light btn" value="SEND">
        @csrf
    </form>
@endsection
