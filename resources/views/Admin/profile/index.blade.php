@extends('Admin.layouts.app')
@section('content-admin')

    <head>
        <link rel="stylesheet" href="{{ asset('admin/css/profile.css') }}">
    </head>
    <div class="profile">
        <div class="profile__title">
            Admin info
        </div>
        <a href="{{ route('adminProfile.create') }}" class="btn-create">
            <button class="submit__btn">Create</button>
        </a>
        <table class="admin-table">

            <head class="admin-table__header">
                <td class="admin-table__header-item admin-table__header-item--name">Name</td>
                <td class="admin-table__header-item admin-table__header-item--email">Email</td>
            </head>
            <div class="admin-table__body">
                @foreach ($admins as $admin)
                    <tr class="admin-table__row">
                        <td class="admin-table__row-item admin-table__row-item--avatar">
                            <div class="admin-table__avatar">
                                <img class="admin-table__avatar-link" src="{{ asset($admin->avatar_img) }}" alt="">
                            </div>
                        </td>
                        <td class="admin-table__row-item admin-table__row-item--name">{{ $admin->name }}</td>
                        <td class="admin-table__row-item admin-table__row-item--email">{{ $admin->email }}</td>
                        <td class="admin-table__row-item admin-table__row-item--actions">
                            {{-- <a href="{{ route('adminProfile.create', ['adminProfile' => $admin->id]) }}"
                                class="action--create-link">
                                <button class="action-btn action-btn--create" title="Create">
                                    <i class="fas fa-plus"></i>
                                </button></a> --}}
                            <div class="action-group">
                                <a href="{{ route('adminProfile.edit', ['adminProfile' => $admin->id]) }}"
                                    class="action--create-link">
                                    <button class="action-btn action-btn--edit" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </a>
                                <form action="{{ route('adminProfile.destroy', ['adminProfile' => $admin->id]) }}"
                                    method="POST">
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
