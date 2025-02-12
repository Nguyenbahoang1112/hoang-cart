<header class="header">
    <div class="grid wide">
        <div class="header-nav">
            <div class="header-nav__logo">
                <div class="header-nav__nav-menu unhide-on-low-pc">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <img class="header-nav__logo-img" src="{{ asset('uploads/images/logo.png') }}" alt="">
            </div>
            <div class="header-nav__nav hide-on-low-pc">
                <ul class="header-nav__nav-list">
                    <li class="header-nav__nav-item">
                        <a href="/" class="header-nav__nav-item-link">TRANG CHỦ</a>
                    </li>
                    <li class="header-nav__nav-item">
                        <a href="" class="header-nav__nav-item-link">CỬA HÀNG</a>
                    </li>
                    <li class="header-nav__nav-item">
                        <a href="" class="header-nav__nav-item-link">TIN TỨC</a>
                    </li>
                    <li class="header-nav__nav-item">
                        <a href="" class="header-nav__nav-item-link">LIÊN HỆ</a>
                    </li>
                    <li class="header-nav__nav-item">
                        <a href="" class="header-nav__nav-item-link">GIỚI THIỆU</a>
                    </li>
                    <li class="header-nav__nav-item item-contact">
                        <i class="fa fa-lock"></i>
                        <a href="" class="header-nav__nav-item-link">S-CART</a>
                        <div class="header-nav__contact">
                            <ul class="header-nav__contact-list">
                                <li class="header-nav__contact-item">
                                    <a href="" class="header-nav__contact-item-link">ABOUT US</a>
                                </li>
                                <li class="header-nav__contact-item">
                                    <a href="" class="header-nav__contact-item-link">GITHUB</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="header-nav__nav-item item-account">
                        <i class="fa fa-lock"></i>
                        <a href="" class="header-nav__nav-item-link">TÀI KHOẢN</a>
                        <div class="header-nav__account">
                            <ul class="header-nav__account-list">
                                @if (Auth::check() === true)
                                    <li class="header-nav__account-item">
                                        <i class="fa-solid fa-user"></i>
                                        <a href="" class="header-nav__account-item-link">TÀI KHOẢN</a>
                                    </li>
                                    <li class="header-nav__account-item">
                                        <i class="fa-solid fa-user"></i>
                                        <a href="{{ route('logout') }}" class="header-nav__account-item-link">ĐĂNG
                                            XUẤT</a>
                                    </li>
                                @else
                                    <li class="header-nav__account-item">
                                        <i class="fa-solid fa-user"></i>
                                        <a href="{{ route('login') }}" class="header-nav__account-item-link">ĐĂNG
                                            NHẬP</a>
                                    </li>
                                @endif
                                <li class="header-nav__account-item favourite-item">
                                    <i class="fa-solid fa-heart"></i>
                                    <a href="" class="header-nav__account-item-link">YÊU THÍCH</a>
                                    <div class="notify-count">
                                        <span class="count-value">1</span>
                                    </div>
                                </li>
                                <li class="header-nav__account-item compare-item">
                                    <i class="fa-solid fa-repeat"></i>
                                    <a href="" class="header-nav__account-item-link">SO SÁNH</a>
                                    <div class="notify-count">
                                        <span class="count-value">1</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="header-nav__nav-item item-lang">
                        <div class="header-nav__lang-choose">
                            <img class="header-nav__lang-img header-nav__lang-img-choose"
                                src="{{ asset('uploads/images/flag_vn.png') }}" alt="">
                        </div>
                        <i class="fa-solid fa-caret-down"></i>
                        <div class="header-nav__lang">
                            <ul class="header-nav__lang-list">
                                <li class="header-nav__lang-item">
                                    <img class="header-nav__lang-img" src="{{ asset('uploads/images/flag_uk.png') }}"
                                        alt="">
                                    <a href="" class="header-nav__lang-item-link">ENGLISH</a>
                                </li>
                                <li class="header-nav__lang-item">
                                    <img class="header-nav__lang-img" src="{{ asset('uploads/images/flag_vn.png') }}"
                                        alt="">
                                    <a href="" class="header-nav__lang-item-link">TIẾNG VIỆT</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="header-nav__nav-item item-currency">
                        <div class="header-nav__currency-item--choose">
                            <a href=""
                                class="header-nav__nav-item-link header-nav__currency-item-link--choose">VIETNAM
                                DONG</a>
                        </div>
                        <i class="fa-solid fa-caret-down"></i>
                        <div class="header-nav__currency">
                            <ul class="header-nav__currency-list">
                                <li class="header-nav__currency-item">
                                    <a href="" class="header-nav__currency-item-link">USD DOLA</a>
                                </li>
                                <li class="header-nav__currency-item">
                                    <a href="" class="header-nav__currency-item-link">VIETNAM DONG</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="header-nav__icon">
                <div class="header-nav__search">
                    <div class="header-nav__search-icon">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                </div>
                <div class="header-nav__cart">
                    <div class="header-nav__cart-icon">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </div>
                    <div class="notify-count">
                        <span class="count-value">1</span>
                    </div>
                    <div class="header-nav__cart-cart">
                        <div class="header-nav__cart-list">
                            @if (session('cart'))
                                @foreach (session('cart') as $cart)
                                    <div class="header-nav__cart-item" data-id="{{ $cart['product_id'] }}">
                                        <div class="header-nav__cart-item-name">{{ $cart['product_name'] }}</div>
                                        <div class="header-nav__cart-item-price">{{ $cart['product_price'] }}</div>
                                        <div class="header-nav__cart-item-quantity">{{ $cart['quantity'] }}</div>
                                        <div class="header-nav__cart-item-delete" data-id={{ $cart['product_id'] }}>
                                            <button class="btn-delete">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="header-nav__cart-item">
                                    EMPTY
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="header-search">
            <input class="header-search__input" type="text" placeholder="Nhập từ khóa">
        </div>
    </div>
</header>
{{-- <script>
    $('document').ready(function() {
        $('.product__btn').click(function() {
            showToast('Thêm vào giỏ hàng thành công');
            console.log($carts);
        });
    })
</script> --}}
