@extends('Admin.layouts.app')
@section('content-admin')

    <head>
        <link rel="stylesheet" href="{{ asset('admin/css/profile.css') }}">
    </head>
    <div class="profile">
        <div class="profile__title">
            Shop Product
        </div>
        {{-- @dd($product->id); --}}
        <form class="profile__form" action="{{ route('adminProduct.update', ['adminProduct' => $product->id]) }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="profile__form-name">
                <p class="profile__form-name-para">Name</p>
                <input type="text" name="name" class="profile__form-name-input" value="{{ $product->id }}">
            </div>
            <p class="profile__avatar-para">Product image</p>
            <input type="file" name="image_url" class="profile__avatar-input">
            <div class="profile__form-email">
                <p class="profile__form-email-para">Old price</p>
                <input type="text" name="price_old" class="profile__form-email__input" value="{{ $product->price_old }}">
            </div>
            <div class="profile__form-email">
                <p class="profile__form-email-para">New price</p>
                <input type="text" name="price_new" class="profile__form-email__input"
                    value="{{ $product->price_new }}" />
            </div>
            <div class="profile__form-email">
                <p class="profile__form-email-para">Category</p>
                <select name="category_id">
                    @foreach ($categories as $category)
                        @if ($category->id == $product->category_id)
                            <option value="{{ $category->id }}" selected>{{ $category->category_name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="btn-group">
                <button class="submit__btn">
                    <a href="{{ route('adminProduct.index') }}" class="btn-back">Back
                    </a>
                </button>   
                <button class="submit__btn" type="submit">Save</button>
            </div>
        </form>
    </div>
@endsection
