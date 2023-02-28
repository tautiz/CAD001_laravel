@extends('public.layouts.main')

@section('title', 'Order summary')
@php($orderTotal = 0)

@section('content')
    <div class="py-14 px-4 md:px-6 2xl:px-20 2xl:container 2xl:mx-auto">
        <div class="flex justify-start item-start space-y-2 flex-col">
            <h1 class="text-3xl dark:text-white lg:text-4xl font-semibold leading-7 lg:leading-9 text-gray-800">Order
                #{{$cart?->id}}</h1>
            <p class="text-base dark:text-gray-300 font-medium leading-6 text-gray-600">{{$cart?->created_at}}</p>
        </div>
        <div
            class="mt-10 flex flex-col xl:flex-row jusitfy-center items-stretch w-full xl:space-x-8 space-y-4 md:space-y-6 xl:space-y-0">
            <div class="flex flex-col justify-start items-start w-full space-y-4 md:space-y-6 xl:space-y-8">
                <div
                    class="flex flex-col justify-start items-start dark:bg-gray-800 bg-gray-50 px-4 py-4 md:py-6 md:p-6 xl:p-8 w-full">
                    <p class="text-lg md:text-xl dark:text-white font-semibold leading-6 xl:leading-5 text-gray-800">
                        Customer’s Cart</p>
                    @foreach($cart?->details as $cartItem)
                        <div
                            class="mt-4 md:mt-6 flex flex-col md:flex-row justify-start items-start md:items-center md:space-x-6 xl:space-x-8 w-full">
                            <a href="{{route('category-products.show', [$cartItem->product->category, $cartItem->product])}}">
                                <div class="pb-4 md:pb-8 w-full md:w-40">
                                    <img class="w-full hidden md:block" src="{{$cartItem->product->image}}"
                                         alt="{{$cartItem->product_name}}"/>
                                    <img class="w-full md:hidden" src="{{$cartItem->product->image}}"
                                         alt="{{$cartItem->product_name}}"/>
                                </div>
                            </a>
                            <div
                                class="border-b border-gray-200 md:flex-row flex-col flex justify-between items-start w-full pb-8 space-y-4 md:space-y-0">
                                <div class="w-full flex flex-col justify-start items-start space-y-8">
                                    <h3 class="text-xl dark:text-white xl:text-2xl font-semibold leading-6 text-gray-800">{{$cartItem->product_name}}</h3>
                                    <div class="flex justify-start items-start flex-col space-y-2">
                                        <p class="text-sm dark:text-white leading-none text-gray-800"><span
                                                class="dark:text-gray-400 text-gray-300">Size: </span> {{$cartItem->product->size}}
                                        </p>
                                        <p class="text-sm dark:text-white leading-none text-gray-800"><span
                                                class="dark:text-gray-400 text-gray-300">Color: </span> {{$cartItem->product->color}}
                                        </p>
                                    </div>
                                </div>
                                <div class="flex justify-between space-x-8 items-start w-full">
                                    <p class="text-base dark:text-white xl:text-lg leading-6">${{$cartItem->price}}</p>
                                    <div class="text-base dark:text-white xl:text-lg leading-6 text-gray-800">
                                        <div class="flex justify-content-center items-center w-full gap-1">
                                            <form action="{{route('cart.product_update', $cartItem->product)}}"
                                                  method="post">
                                                <input type="text" placeholder="0"
                                                       value="{{$cartItem->quantity}}"
                                                       name="quantity"
                                                       class="input input-bordered rounded-md w-12"/>

                                                @csrf
                                                <button>
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24"
                                                         stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <p class="text-base dark:text-white xl:text-lg font-semibold leading-6 text-gray-800">
                                        @php($total = $cartItem->price * $cartItem->quantity)
                                        @php($orderTotal += $total)
                                        ${{$total}}
                                    </p>
                                    <form action="{{route('cart.product_remove', $cartItem->product)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                 stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                                            </svg>

                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div
                    class="flex justify-center flex-col md:flex-row flex-col items-stretch w-full space-y-4 md:space-y-0 md:space-x-6 xl:space-x-8">
                    <div class="flex flex-col px-4 py-6 md:p-6 xl:p-8 w-full bg-gray-50 dark:bg-gray-800 space-y-6">
                        <h3 class="text-xl dark:text-white font-semibold leading-5 text-gray-800">Summary</h3>
                        <div
                            class="flex justify-center items-center w-full space-y-4 flex-col border-gray-200 border-b pb-4">
                            <div class="flex justify-between items-center w-full">
                                <p class="text-base dark:text-white leading-4 text-gray-800">Shipping</p>
                                @php($shipping = 5.00)
                                @php($orderTotal += $shipping)
                                <p class="text-base dark:text-gray-300 leading-4 text-gray-600">${{$shipping}}</p>
                            </div>
                            <div class="flex justify-between items-center w-full">
                                <p class="text-base dark:text-white leading-4 text-gray-800">TAX <span
                                        class="bg-gray-200 p-1 text-xs font-medium dark:bg-white dark:text-gray-800 leading-3 text-gray-800">Required</span>
                                </p>
                                @php($tax = $orderTotal * 0.21)
                                @php($orderTotal += $tax)
                                <p class="text-base dark:text-gray-300 leading-4 text-gray-600">${{$tax}}</p>
                            </div>
                        </div>
                        <div class="flex justify-between items-center w-full">
                            <p class="text-base dark:text-white font-semibold leading-4 text-gray-800">Total</p>
                            <p class="text-base dark:text-gray-300 font-semibold leading-4 text-gray-600">{{$orderTotal}}</p>
                        </div>
                    </div>
                    <div
                        class="flex flex-col justify-center px-4 py-6 md:p-6 xl:p-8 w-full bg-gray-50 dark:bg-gray-800 space-y-6">
                        <h3 class="text-xl dark:text-white font-semibold leading-5 text-gray-800">Shipping</h3>
                        <div class="flex justify-between items-start w-full">
                            <div class="flex justify-center items-center space-x-4">
                                <div class="w-8 h-8">
                                    <img class="w-full h-full" alt="logo" src="https://i.ibb.co/L8KSdNQ/image-3.png"/>
                                </div>
                                <div class="flex flex-col justify-start items-center">
                                    <p class="text-lg leading-6 dark:text-white font-semibold text-gray-800">DPD
                                        Delivery<br/><span class="font-normal">Delivery with 24 Hours</span></p>
                                </div>
                            </div>
                            <p class="text-lg font-semibold leading-6 dark:text-white text-gray-800">${{$shipping}}</p>
                        </div>
                        <div class="w-full flex justify-center items-center">
                            <button
                                class="hover:bg-black dark:bg-white dark:text-gray-800 dark:hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 py-5 w-96 md:w-full bg-gray-800 text-base font-medium leading-4 text-white">
                                Change Carrier
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="bg-gray-50 dark:bg-gray-800 w-full xl:w-96 flex justify-between items-center md:items-start px-4 py-6 md:p-6 xl:p-8 flex-col">
                <h3 class="text-xl dark:text-white font-semibold leading-5 text-gray-800">Customer</h3>
                <div
                    class="flex flex-col md:flex-row xl:flex-col justify-start items-stretch h-full w-full md:space-x-6 lg:space-x-8 xl:space-x-0">
                    <div class="flex flex-col justify-start items-start flex-shrink-0">
                        <div
                            class="flex justify-center w-full md:justify-start items-center space-x-4 py-8 border-b border-gray-200">
                            <img src="https://i.ibb.co/5TSg7f6/Rectangle-18.png" alt="avatar"/>
                            <div class="flex justify-start items-start flex-col space-y-2">
                                <p class="text-base dark:text-white font-semibold leading-4 text-left text-gray-800">
                                    {{$cart?->user?->person}}
                                </p>
                            </div>
                        </div>

                        <div
                            class="flex justify-center text-gray-800 dark:text-white md:justify-start items-center space-x-4 py-4 border-b border-gray-200 w-full">
                            <img class="dark:hidden"
                                 src="https://tuk-cdn.s3.amazonaws.com/can-uploader/order-summary-3-svg1.svg"
                                 alt="email">
                            <img class="hidden dark:block"
                                 src="https://tuk-cdn.s3.amazonaws.com/can-uploader/order-summary-3-svg1dark.svg"
                                 alt="email">
                            <p class="cursor-pointer text-sm leading-5 ">{{$cart?->user?->email}}</p>
                        </div>
                    </div>
                    <div class="flex justify-between xl:h-full items-stretch w-full flex-col mt-6 md:mt-0">
                        <div
                            class="flex justify-center md:justify-start xl:flex-col flex-col md:space-x-6 lg:space-x-8 xl:space-x-0 space-y-4 xl:space-y-12 md:space-y-0 md:flex-row items-center md:items-start">
                            <div
                                class="flex justify-center md:justify-start items-center md:items-start flex-col space-y-4 xl:mt-8">
                                <p class="text-base dark:text-white font-semibold leading-4 text-center md:text-left text-gray-800">
                                    Shipping Address</p>
                                <p class="w-48 lg:w-full dark:text-gray-300 xl:w-48 text-center md:text-left text-sm leading-5 text-gray-600">
                                    {{$cart?->shippingAddress}}</p>
                            </div>
                            <div
                                class="flex justify-center md:justify-start items-center md:items-start flex-col space-y-4">
                                <p class="text-base dark:text-white font-semibold leading-4 text-center md:text-left text-gray-800">
                                    Billing Address</p>
                                <p class="w-48 lg:w-full dark:text-gray-300 xl:w-48 text-center md:text-left text-sm leading-5 text-gray-600">
                                    {{$cart?->billingAddress}}</p>
                            </div>
                        </div>
                        <div class="flex w-full justify-center items-center md:justify-start md:items-start">
                            <button
                                class="mt-6 md:mt-0 dark:border-white dark:hover:bg-gray-900 dark:bg-transparent dark:text-white py-5 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 border border-gray-800 font-medium w-96 2xl:w-full text-base font-medium leading-4 text-gray-800">
                                Edit Addresses
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
