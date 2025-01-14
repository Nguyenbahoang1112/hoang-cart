<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Thư viện Swipt --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    {{-- Font family --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- My CSS --}}
    <link rel="stylesheet" href="{{ asset('frontend/css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/sliders.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
    {{-- CSS Content --}}
    @stack('content-css')
    <title>Document</title>
</head>

<body>
    <div class="app">
        {{-- Header --}}
        @include('Customer.layouts.header')
        {{-- Slider --}}

        {{-- Container --}}

        @yield('content')
        {{-- News --}}

        {{-- Footer --}}
        @include('Customer.layouts.footer')
    </div>
</body>

{{-- Libraries --}}
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
{{-- navbar menu and search click --}}
<script>
    $(document).ready(function() {
        $headerHide = true;
        $('.header-nav__search').click(function() {
            if ($headerHide == true) {
                $('.header-search').removeClass('hide-on-low-pc');
                $('.header-search').addClass('unhide-on-low-pc');
                $headerHide = false;
            } else {
                $('.header-search').removeClass('unhide-on-low-pc');
                $('.header-search').addClass('hide-on-low-pc');
                $headerHide = true;
            }
        });
        $navbarHide = true;
        $('.header-nav__nav-menu').click(function() {
            if ($navbarHide == true) {
                $('.header-nav__nav').removeClass('hide-on-low-pc');
                $('.header-nav__nav').addClass('unhide-on-low-pc');
                $navbarHide = false;
            } else {
                $('.header-nav__nav').removeClass('unhide-on-low-pc');
                $('.header-nav__nav').addClass('hide-on-low-pc');
                $navbarHide = true;
            }
        });
    });
</script>
{{-- Home Slider --}}
<script>
    var swiper = new Swiper(".mySwiperTheme", {
        pagination: {
            el: ".swiper-pagination",
            type: "progressbar",
        },
        navigation: {
            nextEl: ".sn",
            prevEl: ".sp",
        },
    });
</script>
{{-- News slider --}}
<script src="jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
    integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            992: {
                items: 2
            },
            1200: {
                items: 3
            }
        }
    });
</script>
<script>
    $(document).on('click', '.product__btn', function(e) {
        e.preventDefault();
        let productId = $(this).data('id');
        $.ajax({
            url: "{{ route('cart.add') }}", // Route xử lý yêu cầu
            type: 'POST',
            dataType: 'json',
            data: {
                _token: "{{ csrf_token() }}", // Bắt buộc truyền CSRF token
                product_id: productId // Truyền product_id để thêm vào giỏ
            },
            success: function(response) {
                if ($.isEmptyObject(response.cart)) {
                    $('.header-nav__cart-list').append(
                        '<div class="header-nav__cart-item">EMPTY</div>');
                } else {
                    $('.header-nav__cart-list').empty();
                    $.each(response.cart, function(key, item) {
                        $('.header-nav__cart-list').append(
                            '<div class="header-nav__cart-item" data-id="' +
                            productId + '">' +
                            '<div class="header-nav__cart-item-name">' +
                            item.product_name +
                            '</div>' +
                            '<div class="header-nav__cart-item-price">' +
                            item.product_price +
                            '</div>' +
                            '<div class="header-nav__cart-item-quantity">x' +
                            item.quantity +
                            '</div>' +
                            '<div class="header-nav__cart-item-delete" data-id="' +
                            item.product_id + '">' +
                            '<button class="btn-delete">' +
                            '<i class = "fa-solid fa-trash"></i>' +
                            '</button>' +
                            '</div>' +
                            '</div>'
                        );
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); // Xử lý lỗi nếu có
            }

        });
    });
    $(document).on('click', '.header-nav__cart-item-delete', function(e) {
        e.preventDefault();
        let $this = $(this);
        let parentElement = $this.parent();
        let productId = $(this).data('id');
        console.log(productId);
        $.ajax({
            url: "{{ route('cart.remove') }}", // Route xử lý yêu cầu
            type: 'DELETE',
            dataType: 'json',
            data: {
                _token: "{{ csrf_token() }}", // Bắt buộc truyền CSRF token
                product_id: productId // Truyền product_id để thêm vào giỏ
            },
            success: function(response) {
                $(parentElement).remove()
                if ($.isEmptyObject(response.cart)) {
                    $('.header-nav__cart-list').append(
                        '<div class="header-nav__cart-item">EMPTY</div>');
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); // Xử lý lỗi nếu có
            }
        });
    });
</script>

</html>
