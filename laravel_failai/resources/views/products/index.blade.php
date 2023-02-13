@extends('layouts.admin.main')

@section('title', 'Products')

@section('content')
    <div class="row">
        <div class="col s12">
            <h1>{{__('products.product_list')}}</h1>
            <a href="{{route('products.create')}}" class="btn btn-primary">{{__('general.create')}}</a>
            <table class="table">
                <thead>
                <tr>
                    <th>{{__('products.id')}}</th>
                    <th>{{__('products.name')}}</th>
                    <th>{{__('products.price')}}</th>
                    <th>{{__('messages.actions')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}}</td>
                        <td>
                            <x-forms.buttons.action :model="$product" displayShowLink="true"/>
                            <sl-tooltip content="{{__('messages.show')}}">
                                <sl-button
                                    size="small"
                                    pill
                                    variant="primary"
                                    outline
                                    href="{{ route('product.show', $product) }}"
                                >
                                    <sl-icon name="eye" label="{{__('messages.show')}}"></sl-icon>
                                </sl-button>
                            </sl-tooltip>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
