@extends('public.layouts.main')

@section('content')
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-image">
                    <img src="{{$product->image}}" alt="">
                    <span class="card-title">{{ $product->name }}</span>
                </div>
                <div class="card-content">
                    <div>ID: {{$product->id}}</div>
                    <p>Price: {{ $product->price }}</p>
                    <p>Description: {{ $product->description }}</p>
                    <p>Categories: {{ $product->category }}</p>
                    <p>Creation date: {{ $product->created_at }}</p>
                    <p>Last updated: {{ $product->updated_at }}</p>
                    <p>
                        @foreach($product->images as $file)
                            <img src="{{url($file)}}" width="50" alt="{{$file->name}}">
                        @endforeach
                    </p>

                    <input type="number" min="1" max="999" name="quantity" value="1">
                    <a href="#" class="btn btn-primary buy-btn" data-product-id="{{$product->id}}">PIRKTI</a>
                    <div id="zinute"></div>
                    <script>
                        $(document).ready(function () {
                            $('.buy-btn').click(function (e) {
                                e.preventDefault();
                                addToCart();
                            });

                            function addToCart() {
                                $.ajax({
                                    url: "{{ route('api.add-to-cart') }}",
                                    header: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    data: {
                                        product_id: $('.buy-btn').data('product-id'),
                                        quantity: $('input[name="quantity"]').val()
                                    },
                                    type: "POST"
                                }).always(function (data) {
                                    $('#zinute').html(data.responseJSON.message || '');
                                });
                            }
                        });
                    </script>


                </div>
            </div>
        </div>
    </div>
@endsection
