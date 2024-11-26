@extends('Customer.layouts.app')
@push('content-css')
    <link rel="stylesheet" href="{{ asset('frontend/css/content-home.css') }}">
@endpush
@include('Customer.layouts.sliders')
@section('content')
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
                                    <img class="cart__image-img" src="{{ $product->image_url }}" alt="">
                                </div>
                                <div class="product__cart-info">
                                    <div class="product__name">
                                        <p class="product__name-paras">{{ $product->name }}</p>
                                    </div>
                                    <div class="product__btn" data-id="{{ $product->product_id }}">
                                        <button class="product__select-buy" type="submit">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                            Chọn mua
                                        </button>
                                    </div>
                                    <div class="product__price">
                                        <p class="product__price-old">{{ $product->price_old }}</p>
                                        <p class="product__price-new">
                                            {{ number_format($product->price_old - $product->price_new, 2) }}</p>
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
