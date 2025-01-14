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
                    <h2 class="product__heading-para">Giỏ hàng</h2>
                </div>
                <div class="cart">
                    123
                </div>
            </div>
        </div>
    </div>
    @include('Customer.layouts.news')
@endsection
