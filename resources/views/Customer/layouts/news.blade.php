<div class="news-section">
    <div class="news-content">
        <p class="news-heading-para">TIN TỨC</p>
        <div class="news-sliders">
            <div class="test">
                <div class="owl-carousel owl-theme">
                    @foreach ($newses as $news)
                        <div class="item">
                            <div class="news-cart">
                                <img class="news-cart-img" src="{{ $news->image }}" alt="">
                                <div class="news-cart__content">
                                    <p class="news-datetime">{{ $news->created_at }}</p>
                                    <p class="news-name">{{ $news->title }}</p>
                                    <p class="news-description">{{ $news->description }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
