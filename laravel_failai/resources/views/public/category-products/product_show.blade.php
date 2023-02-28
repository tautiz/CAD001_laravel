@extends('public.layouts.main')

@section('title', $product->name)

@section('content')

    <x-basic-page>
        <div class="md:flex items-start justify-center py-12 2xl:px-20 md:px-6 px-4">
            <div class="xl:w-3/6 lg:w-2/5 w-80 md:block hidden">
                <img alt="{{$product->name}}" class="w-full"
                     src="{{url($product->image)}}"/>
                @foreach($product->images as $file)
                    <img alt="{{$file->name}}" class="md:w-24 md:h-24 w-full float-left"
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

                {{ $product->price }}$
                <span class="text-base leading-4 dark:text-gray-600 dark:text-gray-300">/ item</span>
                <br>
                <input type="number" min="1" max="999" name="quantity" value="10">
                <a href="#" class="btn btn-primary buy-btn" data-product-id="{{$product->id}}">PIRKTI</a>

                <div id="zinute">

                    <div class="success hidden">
                        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md"
                             role="alert">
                            <div class="flex">
                                <div class="py-1">
                                    <svg class="fill-current h-6 w-6 text-teal-500 mr-4"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path
                                            d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-bold">Product added successfully</p>
                                    <p class="text-sm">Product: {{$product->name}} [qty. <span class="qty">0</span>].
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="error hidden">
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                             role="alert">
                            <strong class="font-bold">Holy smokes!</strong>
                            <span class="block sm:inline" id="errorMessage">Something seriously bad happened.</span>
                        </div>
                    </div>

                </div>
                <script>
                    $(document).ready(function () {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                                'Authorization': 'Bearer {{auth()?->user()?->tokens?->first()?->token}}'
                            },
                            contentType: 'application/json',
                            dataType: 'json',
                        });

                        $('.buy-btn').click(function (e) {
                            e.preventDefault();
                            $.ajax({
                                type: "POST",
                                url: "{{ route('api.add-to-cart') }}",
                                data: JSON.stringify({
                                    product_id: $('.buy-btn').data('product-id'),
                                    quantity: $('input[name="quantity"]').val()
                                })
                            }).done(function (data) {
                                $('#zinute > .success').show(function () {
                                    $('.qty').html($('input[name="quantity"]').val());
                                    setTimeout(function () {
                                        $('#zinute > .success').fadeOut();
                                    }, 5000);
                                });
                            }).fail(function (data) {
                                let errorMessage = data.responseJSON.message || ' -- Missing Failure message --';
                                console.log('ERROR', data.responseJSON);
                                $('#zinute > .error').show(function () {
                                    $('#errorMessage').html(errorMessage);
                                    setTimeout(function () {
                                        $('#zinute > .error').fadeOut();
                                    }, 5000);
                                });
                            });
                        });
                    });
                </script>

                <div>
                    <p class="xl:pr-10 text-base lg:leading-tight leading-normal dark:text-gray-600 dark:text-gray-300 mt-7">
                        {{ $product->description }}</p>
                    <p class="text-base leading-4 mt-7 dark:text-gray-600 dark:text-gray-300">
                        Color: {{ $product->color }}</p>
                    <p class="text-base leading-4 mt-4 dark:text-gray-600 dark:text-gray-300">
                        Size: {{ $product->size }}</p>
                </div>
            </div>
        </div>
    </x-basic-page>
@endsection


