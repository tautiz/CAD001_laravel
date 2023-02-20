@extends('layouts.main')

@section('title', $product->name)

@section('content')

    <x-basic-page>
        <div class="md:flex items-start justify-center py-12 2xl:px-20 md:px-6 px-4">
            <div class="xl:w-2/6 lg:w-2/5 w-80 md:block hidden">
                @foreach($product->images as $file)
                    <img alt="{{$file->name}}" class="md:w-48 md:h-48 w-full"
                         src="{{url($file)}}"/>

                @endforeach
            </div>
            <div class="md:hidden">
                <img class="w-full" alt="image of a girl posing"
                     src="{{$product->image}}"/>
                <div class="flex items-center justify-between mt-3 space-x-4 md:space-x-0">
                    @foreach($product->images as $file)
                        <img alt="{{$file->name}}" class="md:w-48 md:h-48 w-full"
                             src="{{url($file)}}"/>

                    @endforeach
                </div>
            </div>
            <div class="xl:w-2/5 md:w-1/2 lg:ml-8 md:ml-6 md:mt-0 mt-6">
                <div class="border-b border-gray-200 pb-6">
                    <p class="text-sm leading-none text-gray-600 dark:text-gray-300 ">{{ $product->category }}</p>
                    <h1 class="lg:text-2xl text-xl font-semibold lg:leading-6 leading-7 dark:text-gray-800 dark:text-white mt-2">
                        {{ $product->name }}</h1>
                </div>
                <div class="py-4 border-b border-gray-200 flex items-center justify-between">
                    <p class="text-base leading-4 dark:text-gray-800 dark:text-gray-300">Colours</p>
                    <div class="flex items-center justify-center">
                        <p class="text-sm leading-none dark:text-gray-600 dark:text-gray-300">Smoke Blue with red
                            accents</p>
                        <div
                            class="w-6 h-6 bg-gradient-to-b from-gray-900 to-indigo-500 ml-3 mr-4 cursor-pointer"></div>
                        <img class="dark:hidden"
                             src="https://tuk-cdn.s3.amazonaws.com/can-uploader/productDetail3-svg2.svg"
                             alt="next">
                        <img class="hidden dark:block"
                             src="https://tuk-cdn.s3.amazonaws.com/can-uploader/productDetail3-svg2dark.svg" alt="next">
                    </div>
                </div>
                <div class="py-4 border-b border-gray-200 flex items-center justify-between">
                    <p class="text-base leading-4 dark:text-gray-800 dark:text-gray-300">Size</p>
                    <div class="flex items-center justify-center">
                        <p class="text-sm leading-none dark:text-gray-600 dark:text-gray-300 mr-3">38.2</p>

                        <img class="dark:hidden"
                             src="https://tuk-cdn.s3.amazonaws.com/can-uploader/productDetail3-svg2.svg"
                             alt="next">
                        <img class="hidden dark:block"
                             src="https://tuk-cdn.s3.amazonaws.com/can-uploader/productDetail3-svg2dark.svg" alt="next">
                    </div>
                </div>

                <form action="{{route('product.add_to_cart')}}" method="POST">
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Enter amount</span>
                        </label>
                        <label class="input-group">
                            <input type="text" placeholder="1" name="quantity" value="1" min="1" max="10"
                                   class="input input-bordered"/>
                            <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                                <span class="input border rounded-r-box border-base-content/30 ">
                                    {{ $product->price }}$
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                          <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"/>
                                    </svg>
                                </span>
                            </a>
                        </label>
                    </div>

                    @csrf
                </form>
                <div>
                    <p class="xl:pr-48 text-base lg:leading-tight leading-normal dark:text-gray-600 dark:text-gray-300 mt-7">
                        {{ $product->description }}</p>
                    <p class="text-base leading-4 mt-7 dark:text-gray-600 dark:text-gray-300">
                        Color: {{ $product->color }}</p>
                    <p class="text-base leading-4 mt-4 dark:text-gray-600 dark:text-gray-300">
                        Size: {{ $product->size }}</p>
                </div>
                <div>
                    <div class="border-t border-b py-4 mt-7 border-gray-200">
                        <div data-menu class="flex justify-between items-center cursor-pointer">
                            <p class="text-base leading-4 dark:text-gray-800 dark:text-gray-300">Shipping and
                                returns</p>
                            <button
                                class="cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 rounded"
                                role="button" aria-label="show or hide">
                                <img class="transform dark:hidden"
                                     src="https://tuk-cdn.s3.amazonaws.com/can-uploader/productDetail3-svg4.svg"
                                     alt="dropdown">
                                <img class="transform hidden dark:block"
                                     src="https://tuk-cdn.s3.amazonaws.com/can-uploader/productDetail3-svg4dark.svg"
                                     alt="dropdown">
                            </button>
                        </div>
                        <div
                            class="hidden pt-4 text-base leading-normal pr-12 mt-4 dark:text-gray-600 dark:text-gray-300"
                            id="sect">You will be responsible for paying for your own shipping costs for returning your
                            item. Shipping costs are nonrefundable
                        </div>
                    </div>
                </div>
                <div>
                    <div class="border-b py-4 border-gray-200">
                        <div data-menu class="flex justify-between items-center cursor-pointer">
                            <p class="text-base leading-4 dark:text-gray-800 dark:text-gray-300">Contact us</p>
                            <button
                                class="cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 rounded"
                                role="button" aria-label="show or hide">
                                <img class="transform dark:hidden"
                                     src="https://tuk-cdn.s3.amazonaws.com/can-uploader/productDetail3-svg4.svg"
                                     alt="dropdown">
                                <img class="transform hidden dark:block"
                                     src="https://tuk-cdn.s3.amazonaws.com/can-uploader/productDetail3-svg4dark.svg"
                                     alt="dropdown">
                            </button>
                        </div>
                        <div
                            class="hidden pt-4 text-base leading-normal pr-12 mt-4 dark:text-gray-600 dark:text-gray-300"
                            id="sect">If you have any questions on how to return your item to us, contact us.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-basic-page>
@endsection


