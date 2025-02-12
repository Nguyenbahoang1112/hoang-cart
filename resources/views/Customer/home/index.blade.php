@extends('Customer.layouts.app')
@push('content-css')
    <link rel="stylesheet" href="{{ asset('frontend/css/content-home.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/toast.css') }}">
@endpush
@include('Customer.layouts.sliders')
@section('content')
    {{-- <div class="toast toast__success">
        <i class="fa-solid fa-check"></i>
        <p class="toast__success-para">Thêm vào giỏ hàng thành công</p>
    </div> --}}
    <div class="container">
        <div class="grid wide">
            <div class="product">
                <div class="product__heading">
                    <h2 class="product__heading-para">SẢN PHẨM MỚI</h2>
                </div>
                <div class="product__list">
                    @foreach ($products as $product)
                        <div class="product__cart l-3 ml-3 mm-4 m-6 sm-12">
                            <div class="product__cart-content">
                                <span class="product__sale">
                                    <img class="product__sale-img" src="{{ asset('uploads/images/sale.png') }}"
                                        alt="">
                                </span>
                                <div class="cart__image">
                                    <img class="cart__image-img" src="{{ $product['image_url'] }}" alt="">
                                </div>
                                <div class="product__cart-info">
                                    <div class="product__name">
                                        <p class="product__name-paras">{{ $product['name'] }}</p>
                                    </div>
                                    <div class="product__btn" data-id="{{ $product->id }}">
                                        <button class="product__select-buy" type="submit">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                            Chọn mua
                                        </button>
                                    </div>
                                    <div class="product__price">
                                        <p class="product__price-old">{{ $product['price_old'] }}</p>
                                        <p class="product__price-new">
                                            {{ number_format($product['price_new'], 2) }}</p>
                                    </div>
                                </div>
                                <div class="product__action">
                                    <button class="product__action-favourite">
                                        <i class="fa-solid fa-heart"></i>
                                    </button>
                                    <button class="product__action-compare">
                                        <i class="fa-solid fa-repeat"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include('Customer.layouts.news')
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $(".product__btn").click(function() {
                showToast("Thêm vào giỏ hàng thành công");
            });
        });

        function showToast(message) {
            let toast = $('<div class="toast toast__success"><p class="toast__success-para">' + message + '</p></div>');

            $("body").append(toast);

            // Hiển thị toast
            toast.fadeIn(300);

            // Ẩn toast sau 2 giây
            setTimeout(() => {
                toast.fadeOut(500, function() {
                    $(this).remove();
                });
            }, 2000);
        }
    </script>
@endpush
