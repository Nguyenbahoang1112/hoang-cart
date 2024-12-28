@extends('Admin.layouts.app')
@section('content-admin')

    <head>
        <link rel="stylesheet" href="{{ asset('admin/css/profile.css') }}">
    </head>
    <div class="profile">
        <div class="profile__title">
            My profile
        </div>
        <form class="profile__form" action="{{ route('adminProfile.update', $adminById->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <p class="profile__avatar-para">Avatar</p>
            <input type="file" class="profile__avatar-input" name="avatar_img">
            <div class="profile__form-name">
                <p class="profile__form-name-para">Name</p>
                <input type="text" class="profile__form-name-input" name="name" value="{{ $adminById->name }}">
            </div>
            <div class="profile__form-email">
                <p class="profile__form-email-para">Email</p>
                <input type="email" class="profile__form-email__input" name="email" value="{{ $adminById->email }}">
            </div>
            <button class="submit__btn" type="submit">Edit</button>
        </form>
        <div class="password-update">
            <div class="password__title">
                Update password
            </div>
            <form action="{{ route('adminProfile.updatePassword') }}" method="POST" class="password__form">
                @csrf
                @method('PUT')
                <div class="profile__form-password">
                    <p class="profile__form-password-para">Password current</p>
                    <input type="password" class="password-input" name="password_current">
                    <p class="profile__form-password-para">New password</p>
                    <input type="password" class="password-input" name="password">
                    <p class="profile__form-password-para">Confirm password</p>
                    <input type="password" class="password-input" name="password_confirmation">
                </div>
                <button class="submit__btn" type="submit">Save</button>
                <button class="submit__btn">
                    <a href="{{ route('adminProfile.index') }}" class="btn-back">
                        Back
                    </a>
                </button>
            </form>
        </div>
    </div>
@endsection
