@extends('layouts.admin.main')

@section('title', __('persons.persons_list'))

@section('content')
    <h1>{{__('persons.category_list')}}</h1>
    <a href="{{route('persons.create')}}" class="waves-effect waves-light btn">{{__('persons.add_new')}}</a>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>{{__('persons.name')}}</th>
            <th>{{__('persons.surname')}}</th>
            <th>{{__('persons.personal_code')}}</th>
            <th>{{__('persons.email')}}</th>
            <th>{{__('persons.phone')}}</th>
            <th>{{__('persons.user')}}</th>

            <th>{{__('general.created_at')}}</th>
            <th>{{__('general.updated_at')}}</th>
            <th>{{__('general.actions')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($persons as $person)
            <tr>
                <td>{{$person->id}}</td>
                <td>{{$person->name}}</td>
                <td>{{$person->surname}}</td>
                <td>{{$person->personal_code}}</td>
                <td>{{$person->email}}</td>
                <td>{{$person->phone}}</td>
                <td>{{$person->user->name}}</td>

                <td>{{$person->created_at}}</td>
                <td>{{$person->updated_at}}</td>
                <td>
                    @include('layouts.admin.list_actions_buttons', ['modelObject' => $person, 'mainRoute' => 'persons'])
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
