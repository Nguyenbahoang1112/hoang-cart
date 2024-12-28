<div class="wrapper">
    <div class="menu">
        <div class="menu-logo">
            <img src="{{ asset('uploads/images/logo.png') }}" alt="" class="nav-logo__img">
        </div>
        <div class="menu-space"></div>
        <ul class="menu-list">
            <li class="menu-list__item">
                <div class="menu-list__item-icon">
                    <img src="" alt="" class="menu-list__item-icon-link">
                </div>
                <div class="menu-list__item-header">
                    <a href="" class="item-link">Dashboard</a>
                </div>
            </li>
            <li class="menu-list__item">
                <div class="menu-list__item-icon">
                    <img src="" alt="" class="menu-list__item-icon-link">
                </div>
                <div class="menu-list__item-header">
                    <a href="{{ route('adminProfile.index') }}" class="item-link">My profile</a>
                </div>
            </li>
            <li class="menu-list__item">
                <div class="menu-list__item-icon">
                    <img src="" alt="" class="menu-list__item-icon-link">
                </div>
                <div class="menu-list__item-header">
                    <a href="{{ route('adminProduct.index') }}" class="item-link">Product</a>
                </div>
            </li>
            <li class="menu-list__item">
                <div class="menu-list__item-icon">
                    <img src="" alt="" class="menu-list__item-icon-link">
                </div>
                <div class="menu-list__item-header">
                    <a href="{{ route('adminNews.index') }}" class="item-link">News</a>
                </div>
            </li>
            <li class="menu-list__item">
                <div class="menu-list__item-icon">
                    <img src="" alt="" class="menu-list__item-icon-link">
                </div>
                <div class="menu-list__item-header">
                    <a href="{{ route('adminBanner.index') }}" class="item-link">Banners</a>
                </div>
            </li>
        </ul>
    </div>
    <div class="header">
        <div class="header-nav">
            {{-- <div class="header-nav__title">
                Dashboard
            </div> --}}
            <ul class="header-nav__nav">
                <li class="header-nav__item">
                    <div class="header-nav__notify">
                        <i class="fa-regular fa-bell"></i>
                    </div>
                </li>
                <li class="header-nav__item">
                    <div class="header-nav__search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                </li>
            </ul>
        </div>
        <div class="header-info">
            <div class="header-info__profile">
                {{-- <img src="" alt="" class="header-info__profile-avatar"> --}}
                <i class="fa-regular fa-user"></i>
                <div class="header-info__profile-name">
                    Admin
                </div>
            </div>
            <div class="header-info__setting">
                <i class="fa-solid fa-gear"></i>
            </div>
        </div>
    </div>
</div>
