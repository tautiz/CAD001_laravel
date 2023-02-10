@extends('layouts.admin.main')

@section('title', __('address.address_show'))

@section('content')
    <h1>{{__('address.category_edit')}}</h1>
    <x-forms.inputs :model="$address"
                    fields="name,country,city,zip,street,house_number,apartment_number,state,type,additional_info,user"/>
    <x-forms.buttons.action :model="$address" />
@endsection
