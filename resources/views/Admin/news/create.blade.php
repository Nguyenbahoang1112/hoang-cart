@extends('Admin.layouts.app')
@section('content-admin')

    <head>
        <link rel="stylesheet" href="{{ asset('admin/css/profile.css') }}">
    </head>
    <div class="profile">
        <div class="profile__title">
            Shop News
        </div>
        <form class="profile__form" action="{{ route('adminNews.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="profile__form-name">
                <p class="profile__form-name-para">Title</p>
                <input type="text" name="title" class="profile__form-name-input" placeholder="Title news">
            </div>
            <p class="profile__avatar-para">News image</p>
            <input type="file" name="image_url" class="profile__avatar-input">
            <div class="profile__form-email">
                <p class="profile__form-email-para">Description</p>
                <input type="text" name="description" class="profile__form-email__input" placeholder="Description">
            </div>
            <div class="btn-group">
                <button class="submit__btn">
                    <a href="{{ route('adminNews.index') }}" class="btn-back">
                        Back
                    </a>
                </button>
                <button class="submit__btn" type="submit">Create</button>
            </div>
        </form>
    </div>
@endsection
