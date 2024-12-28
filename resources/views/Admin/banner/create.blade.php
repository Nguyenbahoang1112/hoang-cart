@extends('Admin.layouts.app')
@section('content-admin')

    <head>
        <link rel="stylesheet" href="{{ asset('admin/css/profile.css') }}">
    </head>
    <div class="profile">
        <div class="profile__title">
            Shop Banner
        </div>
        <form class="profile__form" action="{{ route('adminBanner.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="profile__form-name">
                <p class="profile__form-name-para">Name</p>
                <input type="text" name="name" class="profile__form-name-input" placeholder="Name banner">
            </div>
            <p class="profile__avatar-para">News image</p>
            <input type="file" name="image_url" class="profile__avatar-input">
            <div class="btn-group">
                <button class="submit__btn">
                    <a href="{{ route('adminBanner.index') }}" class="btn-back">
                        Back
                    </a>
                </button>
                <button class="submit__btn" type="submit">Create</button>
            </div>
        </form>
    </div>
@endsection
