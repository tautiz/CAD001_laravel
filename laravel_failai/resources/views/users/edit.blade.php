@extends('layouts.admin.main')

@section('title', 'Editing user')

@section('content')
    <x-basic-page :title="__('users.editing').' '.$user->name">
        <form action="{{route('users.update', $user)}}" method="post">
            @method('PUT')
            <div class="grid grid-cols-2 gap-4">
                <x-forms.input field="name" :model="$user"/>
                <x-forms.input field="email" :model="$user"/>
                <x-forms.input field="password" :model="new \App\Models\User()"/>
                <x-forms.input field="password_confirmation" :model="$user"/>
                <x-forms.select field="role" :model="$user" :options="\App\Models\User::ROLES"/>
            </div>
            @csrf
            <div class="divider">AND NOW</div>
            <input type="submit" class="waves-effect waves-light btn" value="Update">
        </form>
    </x-basic-page>
@endsection
