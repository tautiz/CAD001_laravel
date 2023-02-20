@extends('layouts.main')
@section('title', 'Home')
@section('content')


    <div class="dark:bg-gray-900">
        <div class="container mx-auto py-9 md:py-12 lg:py-24">
            <div class="relative mx-4">
                <img
                    src="https://i.ibb.co/q5k5j57/bench-accounting-nvzv-OPQW0gc-unsplash-1-1.png"
                    alt="A work table with house plants"
                    role="img"
                    class="w-full h-full hidden lg:block"
                />
                <img
                    src="https://i.ibb.co/94jQFsV/bench-accounting-nvzv-OPQW0gc-unsplash-1-1.png"
                    alt="A work table with house plants"
                    role="img"
                    class="hidden sm:block lg:hidden w-full h-full"
                />
                <img
                    src="https://i.ibb.co/cJz8LZ2/bench-accounting-nvzv-OPQW0gc-unsplash-1-1.png"
                    alt="A work table with house plants"
                    role="img"
                    class="sm:hidden w-full h-full"
                />

                <div
                    class="absolute z-10 top-0 left-0 mx-4 sm:mx-0 mt-36 sm:mt-0 sm:py-20 md:py-28 lg:py-20 xl:py-28 sm:pl-14 flex flex-col sm:justify-start items-start"
                >
                    <h1
                        class="text-4xl sm:text-5xl lg:text-6xl font-semibold text-gray-800 sm:w-8/12"
                    >
shop.lt
                    </h1>
                    <p
                        class="text-base leading-normal text-gray-800 mt-4 sm:mt-5 sm:w-5/12"
                    >
                        {{trans_choice('messages.welcome', 1, ['duomenys' => Auth::user()?->name ?? 'Guest'])}}
                    </p>
                    <button
                        class="hidden sm:flex bg-gray-800 py-4 px-8 text-base font-medium text-white mt-8 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 hover:bg-gray-700"
                    >
                        Explore
                    </button>
                </div>
                <button
                    class="absolute bottom-0 sm:hidden dark:bg-white dark:text-gray-800 bg-gray-800 py-4 text-base font-medium text-white mt-8 flex justify-center items-center w-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 hover:bg-gray-700"
                >
                    Explore
                </button>
            </div>
        </div>
    </div>


    <div class="2xl:container 2xl:mx-auto">
        <div class="bg-gray-50 dark:bg-gray-900 text-center lg:py-10 md:py-8 py-6">
            <p class="w-10/12 mx-auto md:w-full font-semibold lg:text-4xl text-3xl lg:leading-9 md:leading-7 dark:text-white leading-9 text-center text-gray-800">Populiariausios prekės</p>
        </div>
        <div class="py-6 lg:px-20 md:px-6 px-4">
            <p class="font-normal text-sm leading-3 text-gray-600 dark:text-gray-300">Home / TOP</p>
            <hr class="w-full bg-gray-200 my-6" />

            <div class="flex justify-between items-center">
                <div class="flex space-x-3 justify-center items-center text-gray-800 dark:text-white">
                    <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/product-grid-5-svg1.svg" alt="toggler">
                    <img class="hidden dark:block" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/product-grid-5-svg1dark.svg

" alt="toggler">
                    <p class="font-normal text-base leading-4 text-gray-800 dark:text-white">Filter</p>
                </div>
                <p class="cursor-pointer hover:underline duration-100 font-normal text-base leading-4 text-gray-600 dark:text-gray-300">Showing 18 products</p>
            </div>

            <x-products :data="$products"/>

            <div class="flex justify-center items-center">
                <button class="hover:bg-gray-700 dark:text-gray-300 focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 bg-gray-800 py-5 md:px-16 md:w-auto w-full lg:mt-28 md:mt-12 mt-10 text-white font-medium text-base leading-4">Load More</button>
            </div>
        </div>
    </div>

@endsection
