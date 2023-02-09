@extends('layouts.admin.main')

@section('title', __('statuses.list'))

@section('content')
    <h1>{{__('statuses.list')}}</h1>
    <a href="{{route('statuses.create')}}" class="waves-effect waves-light btn">{{__('statuses.add_new')}}</a>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>{{__('statuses.name')}}</th>
            <th>{{__('statuses.type')}}</th>

            <th>{{__('messages.created_at')}}</th>
            <th>{{__('messages.updated_at')}}</th>
            <th>{{__('messages.actions')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($statuses as $status)
            <tr>
                <td>{{$status?->id}}</td>
                <td>{{$status?->name}}</td>
                <td>{{$status?->type}}</td>

                <td>{{$status?->created_at}}</td>
                <td>{{$status?->updated_at}}</td>
                <td>
                    @include('layouts.admin.list_actions_buttons', ['modelObject' => $status, 'mainRoute' => 'statuses'])
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
