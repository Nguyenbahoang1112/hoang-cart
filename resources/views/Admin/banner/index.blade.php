@extends('Admin.layouts.app')
@section('content-admin')

    <head>
        <link rel="stylesheet" href="{{ asset('admin/css/profile.css') }}">
    </head>
    <div class="profile">
        <div class="profile__title">
            Shop Banner
        </div>
        <div class="profile__group-btn">

        </div>
        <a href="{{ route('adminBanner.create') }}" class="btn-back">
            <button class="submit__btn">Create</button>
        </a>
        <table class="admin-table">

            <head class="admin-table__header">
                <td class="admin-table__header-item admin-table__header-item--name">Name</td>
                <td class="admin-table__header-item admin-table__header-item--email">Image</td>
            </head>
            <div class="admin-table__body">
                @foreach ($banners as $banner)
                    <tr class="admin-table__row">
                        <td class="admin-table__row-item admin-table__row-item--name">{{ $banner->name }}</td>
                        <td class="admin-table__row-item admin-table__row-item--avatar">
                            <div class="admin-table__avatar">
                                <img class="admin-table__avatar-link" src="{{ asset($banner->image_url) }}" alt="">
                            </div>
                        </td>
                        <td class="admin-table__row-item admin-table__row-item--actions">
                            <div class="action-group">
                                <a href="{{ route('adminBanner.edit', $banner->id) }}" class="action--create-link">
                                    <button class="action-btn action-btn--edit" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </a>
                                <form action="{{ route('adminBanner.destroy', $banner->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="action-btn action-btn--delete" type="submit" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </div>
        </table>

    </div>
@endsection
