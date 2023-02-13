@extends('layouts.admin.main')

@section('title', __('paymentTypes.paymentType_list'))

@section('content')
    <h1>{{__('paymentTypes.paymentType_list')}}</h1>
    <a href="{{route('paymentTypes.create')}}" class="waves-effect waves-light btn">{{__('paymentTypes.add_new')}}</a>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>{{__('paymentTypes.name')}}</th>

            <th>{{__('general.created_at')}}</th>
            <th>{{__('general.updated_at')}}</th>
            <th>{{__('general.actions')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($paymentTypes as $paymentsType)
            <tr>
                <td>{{$paymentsType?->id}}</td>
                <td>{{$paymentsType?->name}}</td>

                <td>{{$paymentsType?->created_at}}</td>
                <td>{{$paymentsType?->updated_at}}</td>
                <td>
                    @include('layouts.admin.list_actions_buttons', ['modelObject' => $paymentsType, 'mainRoute' => 'paymentTypes'])
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
