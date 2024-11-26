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
                    ->select('*')
                    ->where('status',1)
                    ->get();
    }
}
