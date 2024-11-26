<div class="theme">
    <div class="swiper mySwiperTheme">
        <div class="swiper-wrapper swiper-wrapper-theme">
            @foreach ($banners as $banner)
                <div class="swiper-slide swiper-slide-theme">
                    <img class="slide-img" src="{{ $banner->image_url }}" alt="">
                </div>
            @endforeach
        </div>
        <div class="swiper-button-next sn"></div>
        <div class="swiper-button-prev sp"></div>
        <div class="swiper-pagination"></div>
    </div>
</div>
