@extends('layouts.admin.main')

@section('title', __('address.address_show'))

@section('content')
    <h1>{{__('address.category_edit')}}</h1>
        <input type="text" name="name" placeholder="{{__('address.name')}}"
               value="{{old('name') ?? $address->name}}"><br>
        <input type="text" name="country" placeholder="{{__('address.country')}}"
               value="{{$address->country}}"><br>
        <input type="text" name="city" placeholder="{{__('address.city')}}"
               value="{{$address->city}}"><br>
        <input type="text" name="zip" placeholder="{{__('address.zip')}}"
               value="{{$address->zip}}"><br>
        <input type="text" name="street" placeholder="{{__('address.street')}}"
               value="{{$address->street}}"><br>
        <input type="text" name="house_number" placeholder="{{__('address.house_number')}}"
               value="{{$address->house_number}}"><br>
        <input type="text" name="apartment_number" placeholder="{{__('address.apartment_number')}}"
               value="{{$address->apartment_number}}"><br>
        <input type="text" name="state" placeholder="{{__('address.state')}}"
               value="{{$address->state}}"><br>
        <input type="text" name="type" placeholder="{{__('address.type')}}"
               value="{{$address->type}}"><br>
        <input type="text" name="additional_info" placeholder="{{__('address.additional_info')}}"
               value="{{$address->additional_info}}"><br>
        <input type="text" name="user_id" placeholder="{{__('address.user_id')}}"
               value="{{$address->user_id}}"><br>
@endsection
