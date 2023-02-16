@extends('layouts.admin.main')

@section('title', 'Editing user')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{__('users.new')}}
        </h2>
        <span>Editing {{$user->name}}</span>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form action="{{route('users.update', $user)}}" method="post">
                        @method('PUT')
                        <x-forms.input field="name" :model="$user"/>
                        <x-forms.input field="email" :model="$user"/>
                        <x-forms.input field="password" :model="new \App\Models\User()"/>
                        <x-forms.input field="password_confirmation" :model="$user"/>
                        <x-forms.select field="role" :model="$user" :options="\App\Models\User::ROLES"/>
                        @csrf
                        <hr>
                        <input type="submit" class="waves-effect waves-light btn" value="Update">
                    </form>
                </div>
            </div>
        </div>
@endsection
