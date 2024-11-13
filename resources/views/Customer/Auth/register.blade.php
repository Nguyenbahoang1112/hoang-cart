@extends('Customer.layouts.app')
@push('content-css')
    <link rel="stylesheet" href="{{ asset('frontend/css/login.css') }}">
@endpush
@section('content')
    <div class="container__login">
        <p class="heading">REGISTER</p>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="input">
                Email:
                <input type="text" class="input-email" name="email">
            </div>
            @if ($errors->has('email'))
                <div class="validate" style="color:red; display:block; font-size: 10px">
                    {{ $errors->first('email') }}
                </div>
            @endif
            <div class="input">
                Password:
                <input type="password" class="input-password" name="password">
            </div>
            @if ($errors->has('password'))
                <div class="validate" style="color:red; display:block; font-size: 10px">
                    {{ $errors->first('password') }}
                </div>
            @endif
            <div class="input">
                <div>
                    Confirm password:
                </div>
                <input type="password" class="input-password confirm-password" name="password_confirmation">
            </div>
            @if ($errors->has('password_confirmation'))
                <div class="validate" style="color:red; display:block; font-size: 10px">
                    {{ $errors->first('password_confirmation') }}
                </div>
            @endif
            <div class="route">
                <div class="route__item">
                    <a href="" class="route__item-link">Điều khoản</a>
                    <a href="/login" class="route__item-link">Tôi đã có tài khoản</a>
                </div>
            </div>
            {{-- <button class="btn btn__login" type="">
                <a href="/login">LOGIN</a>
            </button> --}}
            <button class="btn btn__login btn__register" type="submit">REGISTER</button>
        </form>
    </div>
@endsection
