@extends('Customer.layouts.app')
@push('content-css')
    <link rel="stylesheet" href="{{ asset('frontend/css/content-home.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css
">
@endpush
{{-- @include('Customer.layouts.sliders') --}}
@section('content')
    <div class="container">
        <div class="grid wide cart-container">
            <div class="cart col-7">
                <div class="cart__heading">
                    <h2 class="cart__heading-para">Giỏ hàng</h2>
                </div>
                <table class="table table-bordered">
                    <thead class="table-success">
                        <tr class="cart-head">
                            <th class="cart-head__heading">Name</th>
                            <th class="cart-head__heading">Image</th>
                            <th class="cart-head__heading">Price</th>
                            <th class="cart-head__heading">Quantity</th>
                            <th class="cart-head__heading">Total</th>
                            <th class="cart-head__heading">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @dd($carts) --}}
                        @if (count($carts) == 0)
                            <tr class="cart-item">
                                <td class="cart-item__name" colspan="6">Không có sản phẩm nào trong giỏ hàng</td>
                            </tr>
                        @else
                            @foreach ($carts ?? [] as $item)
                                <tr class="cart-item">
                                    <td class="cart-item__name">{{ $item->name }}</td>
                                    <td class="cart-item__image">
                                        <div class="cart-item__image-box">
                                            <img class="cart-item__image-link" src="{{ asset($item->image_url) }}"
                                                alt="">
                                        </div>
                                    </td>
                                    <td class="cart-item__price">{{ $item->price_new }}</td>
                                    <td class="cart-item__quantity">{{ $item->quantity }}</td>
                                    <td class="cart-item__total">{{ number_format($item->price_new * $item->quantity, 2) }}
                                    </td>
                                    <td class="cart-item__action">
                                        <div class="action-group">
                                            <button class="action-btn action-btn--edit" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="action-btn action-btn--delete header-nav__cart-item-delete"
                                                    type="submit" title="Delete" data-id="{{ $item->id }}">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>
                <?php
                $total = 0;
                foreach ($carts as $item) {
                    $total += $item->price_new * $item->quantity;
                }
                ?>
                {{-- <div class="product__summary"> --}}
                <span class="product__summary-value">
                    Thành tiền : {{ number_format($total, 2) }}
                    VND
                </span>
                {{-- </div> --}}
            </div>
            <div class="info-address col-5">
                <div class="cart__heading">
                    <h2 class="cart__heading-para">Thông tin người nhận</h2>
                    <form action="{{ route('checkout.checkout') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="info-address__name">Số điện thoại</label>
                            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" required>
                            {{-- <div class="group-location" style="display: flex;"> --}}
                            <div class="location-ward" style="margin-right: 4px">
                                <label for="name" class="info-address__name">Tỉnh</label>
                                <input type="text" class="form-control" name="city" required>
                            </div>
                            <div class="location-ward" style="margin-right: 4px">
                                <label for="name" class="info-address__name">Huyện</label>
                                <input type="text" class="form-control" name="district" required>
                            </div>
                            <div class="location-ward">
                                <label for="name" class="info-address__name">Xã</label>
                                <input type="text" class="form-control" name="ward" required>
                            </div>
                            {{-- </div> --}}
                            <label for="name" class="info-address__name">Địa chỉ cụ thể</label>
                            <input type="text" class="form-control" name="address" required>
                            <label for="name" class="info-address__name">Ghi chú</label>
                            <textarea name="note" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <div class="product__summary">
                            <button type="submit" class="btn btn-info">Thanh toán khi nhận hàng</button>
                        </div>
                    </form>
                    <form action="{{ url('/vnpay_payment') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-info" name="redirect"> Thanh toán VNPay</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- @include('Customer.layouts.news') --}}
@endsection
