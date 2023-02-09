@extends('layouts.admin.main')

@section('title', __('statuses.statuses_new'))

@section('content')
    <h1>{{__('statuses.statuses_new')}}</h1>
    <form action="{{route('statuses.store')}}" method="post">
        <x-forms.inputs :model="(new \App\Models\Status())" fields="name,type"/>
        <hr>
        <input type="submit" class="waves-effect waves-light btn" value="SEND">
        @csrf
    </form>
@endsection
