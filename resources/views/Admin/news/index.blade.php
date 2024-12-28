@extends('Admin.layouts.app')
@section('content-admin')

    <head>
        <link rel="stylesheet" href="{{ asset('admin/css/profile.css') }}">
    </head>
    <div class="profile">
        <div class="profile__title">
            Shop News
        </div>
        <div class="profile__group-btn">

        </div>
        <a href="{{ route('adminNews.create') }}" class="btn-back">
            <button class="submit__btn">Create</button>
        </a>
        <table class="admin-table">

            <head class="admin-table__header">
                <td class="admin-table__header-item admin-table__header-item--name">Title</td>
                <td class="admin-table__header-item admin-table__header-item--email">Image</td>
                <td class="admin-table__header-item admin-table__header-item--price">Description</td>
            </head>
            <div class="admin-table__body">
                @foreach ($shopNews as $shopNew)
                    <tr class="admin-table__row">
                        <td class="admin-table__row-item admin-table__row-item--name">{{ $shopNew->title }}</td>
                        <td class="admin-table__row-item admin-table__row-item--avatar">
                            <div class="admin-table__avatar">
                                <img class="admin-table__avatar-link" src="{{ asset($shopNew->image_url) }}" alt="">
                            </div>
                        </td>
                        <td class="admin-table__row-item admin-table__row-item--price">{{ $shopNew->description }}</td>
                        <td class="admin-table__row-item admin-table__row-item--actions">
                            <div class="action-group">
                                <a href="{{ route('adminNews.edit', $shopNew->id) }}" class="action--create-link">
                                    <button class="action-btn action-btn--edit" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </a>
                                <form action="{{ route('adminNews.destroy', $shopNew->id) }}" method="POST">
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
