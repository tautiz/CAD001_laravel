<div class="grid lg:grid-cols-4 sm:grid-cols-2 grid-cols-1 lg:gap-y-12 lg:gap-x-8 sm:gap-y-10 sm:gap-x-6 gap-y-6 lg:mt-12 mt-10">
{{--    <div class="relative">--}}
{{--        <div class="absolute top-0 left-0 py-2 px-4 bg-white bg-opacity-50"><p class="text-xs leading-3 text-gray-800">New</p></div>--}}
{{--        <div class="relative group">--}}
{{--            <div class="flex justify-center items-center opacity-0 bg-gradient-to-t from-gray-800 via-gray-800 to-opacity-30 group-hover:opacity-50 absolute top-0 left-0 h-full w-full"></div>--}}
{{--            <img class="w-full" src="https://i.ibb.co/HqmJYgW/gs-Kd-Pc-Iye-Gg.png" alt="A girl Posing Image" />--}}
{{--            <div class="absolute bottom-0 p-8 w-full opacity-0 group-hover:opacity-100">--}}
{{--                <button class="dark:bg-gray-800 dark:text-gray-300 font-medium text-base leading-4 text-gray-800 bg-white py-3 w-full">Add to bag</button>--}}
{{--                <button class="bg-transparent font-medium text-base leading-4 border-2 border-white py-3 w-full mt-2 text-white">Quick View</button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <p class="font-normal dark:text-white text-xl leading-5 text-gray-800 md:mt-6 mt-4">Wilfred Alana Dress</p>--}}
{{--        <p class="font-semibold dark:text-gray-300 text-xl leading-5 text-gray-800 mt-4">$1550</p>--}}
{{--        <p class="font-normal dark:text-gray-300 text-base leading-4 text-gray-600 mt-4">2 colours</p>--}}
{{--    </div>--}}
    @foreach($data as $product)
    <div>
        <div class="relative group">
            <div class="flex justify-center items-center opacity-0 bg-gradient-to-t from-gray-800 via-gray-800 to-opacity-30 group-hover:opacity-50 absolute top-0 left-0 h-full w-full"></div>
            <img class="w-full" src="{{$product->image}}" alt="{{$product->name}}" />
            <div class="absolute bottom-0 p-8 w-full opacity-0 group-hover:opacity-100">
                <form action="{{route('product.add_to_cart')}}" method="POST">
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="quantity" value="1">
                    <button type="submit" class="dark:bg-gray-800 dark:text-gray-300 font-medium text-base leading-4 text-gray-800 bg-white py-3 w-full">Add to cart</button>
                    @csrf
                </form>
                <button onclick="window.location.href = '{{route('product.show', $product)}}'" class="bg-transparent font-medium text-base leading-4 border-2 border-white py-3 w-full mt-2 text-white">Quick View</button>
            </div>
        </div>

        <p class="font-normal text-xl dark:text-white leading-5 text-gray-800 md:mt-6 mt-4">{{$product->name}}</p>
        <p class="font-semibold dark:text-gray-300 text-xl leading-5 text-gray-800 mt-4">${{$product->price}}</p>
    </div>
    @endforeach
</div>
