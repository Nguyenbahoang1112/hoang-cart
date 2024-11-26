<?php
namespace App\Repositories\ShopBanner;
use App\Models\ShopBanner;

class ShopBannerRepository {
    protected $shopBanner;

    public function __construct(ShopBanner $shopBanner)
    {
        $this->shopBanner = $shopBanner;
    }

    public function getAll() {
        return $this->shopBanner
                    ->select('image_url')
                    ->where('status', 1)
                    ->get();
    }
}
