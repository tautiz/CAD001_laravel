@extends('layouts.admin.main')

@section('title', __('statuses.status_edit'))

@section('content')
    <h1>{{__('statuses.status_edit')}}</h1>
    <form action="{{route('statuses.update', $status)}}" method="post">
        @method('PUT')
        <x-forms.inputs :model="$status" fields="name,type"/>
        <hr>
        <input type="submit" class="waves-effect waves-light btn" value="SEND">
        @csrf
    </form>
@endsection

