@extends('layouts.admin.main')

@section('title', __('address.category_list'))

@section('content')
    <h1>{{__('address.category_list')}}</h1>
    <a href="{{route('addresses.create')}}" class="waves-effect waves-light btn">{{__('address.add_new')}}</a>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>{{__('address.name')}}</th>
            <th>{{__('address.country')}}</th>
            <th>{{__('address.city')}}</th>
            <th>{{__('address.zip')}}</th>
            <th>{{__('address.street')}}</th>
            <th>{{__('address.house_number')}}</th>
            <th>{{__('address.apartment_number')}}</th>
            <th>{{__('address.state')}}</th>
            <th>{{__('address.type')}}</th>
            <th>{{__('address.additional_info')}}</th>
            <th>{{__('address.user_id')}}</th>
            <th>{{__('messages.created_at')}}</th>
            <th>{{__('messages.updated_at')}}</th>
            <th>{{__('messages.actions')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($addresses as $address)
            <tr>
                <td>{{$address->id}}</td>
                <td>{{$address->name}}</td>
                <td>{{$address->country}}</td>
                <td>{{$address->city}}</td>
                <td>{{$address->zip}}</td>
                <td>{{$address->street}}</td>
                <td>{{$address->house_number}}</td>
                <td>{{$address->apartment_number}}</td>
                <td>{{$address->state}}</td>
                <td>{{$address->type}}</td>
                <td>{{$address->additional_info}}</td>
                <td>{{$address->user_id}}</td>
                <td>{{$address->created_at}}</td>
                <td>{{$address->updated_at}}</td>
                <td>
                    <a href="{{route('addresses.edit', $address)}}"
                       class="waves-effect waves-light btn">{{__('messages.edit')}}</a>
                    <form action="{{route('addresses.destroy', $address)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="waves-effect waves-light btn" value="{{__('messages.delete')}}">
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
