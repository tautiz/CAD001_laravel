@extends('layouts.admin.main')

@section('title', __('statuses.status_edit'))

@section('content')
    <x-basic-page :title="__('statuses.status_edit')">
        <form action="{{route('statuses.update', $status)}}" method="post">
            @method('PUT')
            <x-forms.inputs :model="$status" fields="name,type"/>
            <div class="divider">NOW UPDATE IT</div>
            <input type="submit" class="waves-effect waves-light btn" value="SEND">
            @csrf
        </form>
    </x-basic-page>
@endsection

