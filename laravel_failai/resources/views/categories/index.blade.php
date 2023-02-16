@extends('layouts.admin.main')

@section('title', __('categories.category_list'))

@section('content')
    <h1>{{__('categories.category_list')}}</h1>
    <a href="{{route('categories.create')}}" class="waves-effect waves-light btn">{{__('categories.add_new')}}</a>
    <div class="overflow-x-auto">
        <table class="table table-compact table-zebra w-full">
            <thead>
            <tr>
                <th>ID</th>
                <th>{{__('categories.image')}}</th>
                <th>{{__('categories.name')}}</th>
                <th>{{__('categories.slug')}}</th>
                <th>{{__('categories.parent')}}</th>
                <th>{{__('categories.description')}}</th>
                <th>{{__('categories.status')}}</th>
                <th>{{__('general.created_at')}}</th>
                <th>{{__('general.updated_at')}}</th>
                <th>{{__('general.actions')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td><img src="{{$category->image}}" alt="{{$category->name}}" width="100"></td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->slug}}</td>
                    <td>{{$category->parent_id}}</td>
                    <td>{{$category->description}}</td>
                    <td>{{$category->status_id}}</td>
                    <td>{{$category->created_at}}</td>
                    <td>{{$category->updated_at}}</td>
                    <td>
                        <x-forms.buttons.action :model="$category" :display-show-link="true"/>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
