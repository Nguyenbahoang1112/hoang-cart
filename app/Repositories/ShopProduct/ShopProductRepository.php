<?php
namespace App\Repositories\ShopProduct;
use App\Models\ShopProduct;

class ShopProductRepository {
    protected $shopProduct;

    public function __construct(ShopProduct $shopProduct)
    {
        $this->shopProduct = $shopProduct;
    }
    public function getAll() {
        return $this->shopProduct
                      ->join('sc_shop_product_description', 'sc_shop_product_description.product_id', '=', 'sc_shop_product.id')
                      ->join('sc_shop_product_promotion', 'sc_shop_product_promotion.product_id', '=', 'sc_shop_product.id')
                      ->where('sc_shop_product_description.lang','vi')
                      ->select('sc_shop_product.*','sc_shop_product.id as product_id', 'sc_shop_product_description.name as product_name','sc_shop_product_promotion.price_promotion')
                      ->get();
    }
    public function getByCart($productId) {
        return $this->shopProduct
                    ->join('sc_shop_product_description', 'sc_shop_product_description.product_id', '=', 'sc_shop_product.id')
                    ->join('sc_shop_product_promotion', 'sc_shop_product_promotion.product_id', '=', 'sc_shop_product.id')
                    ->where('sc_shop_product.id',$productId)
                    ->select('sc_shop_product_description.name as product_name','sc_shop_product_promotion.price_promotion')
                    ->first();
    }

    public function getProducts($productIds)
    {
        return $this->shopProduct
                    ->join('sc_shop_product_description', 'sc_shop_product_description.product_id', '=', 'sc_shop_product.id')
                    ->join('sc_shop_product_promotion', 'sc_shop_product_promotion.product_id', '=', 'sc_shop_product.id')
                    ->whereIn('sc_shop_product.id', $productIds)
                    ->select('sc_shop_product_description.name as product_name','sc_shop_product_promotion.price_promotion')
                    ->get();
    }
}
