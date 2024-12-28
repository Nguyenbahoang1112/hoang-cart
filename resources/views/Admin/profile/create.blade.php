@extends('Admin.layouts.app')
@section('content-admin')

    <head>
        <link rel="stylesheet" href="{{ asset('admin/css/profile.css') }}">
    </head>
    <div class="profile">
        <div class="profile__title">
            My profile
        </div>
        <form class="profile__form" action="{{ route('adminProfile.store') }}" method="POST">
            @csrf
            {{-- <p class="profile__avatar-para">Avatar</p>
            <input type="file" name="avatar_img" class="profile__avatar-input"> --}}
            <div class="profile__form-name">
                <p class="profile__form-name-para">Name</p>
                <input type="text" name="name" class="profile__form-name-input" placeholder="Enter admin name">
            </div>
            <div class="profile__form-email">
                <p class="profile__form-email-para">Email</p>
                <input type="email" name="email" class="profile__form-email__input" placeholder="Enter admin email">
            </div>
            <div class="profile__form-password">
                <p class="profile__form-password-para">Password</p>
                <input type="password" name="password" class="password-input" placeholder="Enter password">
                <p class="profile__form-password-para">Confirm password</p>
                <input type="password" name="password_confirmation" class="password-input" class="password_confirmation"
                    placeholder="Enter confirm password">
            </div>
            <div class="btn-group">
                <button class="submit__btn">
                    <a href="{{ route('adminProfile.index') }}" class="btn-back">
                        Back
                    </a>
                </button>
                <button class="submit__btn" type="submit">Create</button>
            </div>

        </form>
    </div>
@endsection
