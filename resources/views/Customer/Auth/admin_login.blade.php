@extends('Customer.layouts.app')
@push('content-css')
    <link rel="stylesheet" href="{{ asset('frontend/css/login.css') }}">
@endpush
@section('content')
    <div class="container__login">
        <p class="heading">LOGIN</p>
        <form action="/admin/login" method="POST">
            @csrf
            <div class="input">
                Email:
                <input type="text" class="input-email" name="email">
            </div>
            <div class="input">
                Password:
                <input type="password" class="input-password" name="password">
            </div>
            <div class="route">
                <div class="route__item">
                    <a href="" class="route__item-link">Quên mật khẩu?</a>
                    <a href="/admin/register" class="route__item-link">Đăng kí tài khoản</a>
                </div>
            </div>
            <button class="btn btn__login" type="submit">LOGIN</button>
        </form>
    </div>
@endsection