@extends('layouts.admin.main')

@section('title', __('statuses.statuses_new'))

@section('content')
    <x-basic-page :title="__('statuses.statuses_new')">
        <form action="{{route('statuses.store')}}" method="post">
            <x-forms.inputs :model="(new \App\Models\Status())" fields="name,type"/>
            <div class="divider">NOW SAVE IT</div>
            <x-primary-button>{{ __('Save') }}</x-primary-button>
            @csrf
        </form>
    </x-basic-page>
@endsection
