<?php
namespace App\Repositories\ShopNews;
use App\Models\ShopNews;

class ShopNewsRepository {
    protected $shopNews;

    public function __construct(ShopNews $shopNews)
    {
        $this->shopNews = $shopNews;
    }

    public function getAll() {
        return $this->shopNews
                    ->join('sc_shop_news_description', 'sc_shop_news_description.news_id', '=', 'sc_shop_news.id')
                    ->select('image', 'created_at', 'title', 'description')
                    ->where([
                        ['status', 1],
                        ['lang', 'vi']
                    ])
                    ->get();
    }
}
