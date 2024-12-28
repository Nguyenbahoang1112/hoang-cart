<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('admin/css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/app.css') }}">
</head>

<body>
    <div class="app">
        {{-- Header --}}
        @include('Admin.layouts.header')
        {{-- Slider --}}

        {{-- Container --}}
        <div class="content">
            @yield('content-admin')
        </div>
        {{-- News --}}
    </div>
</body>

</html>
