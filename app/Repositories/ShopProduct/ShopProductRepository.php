<?php
namespace App\Repositories\ShopProduct;

use App\Models\Product;

class ShopProductRepository {
    protected $shopProduct;

    public function __construct(Product $shopProduct)
    {
        $this->shopProduct = $shopProduct;
    }
    public function getAll() {
        return $this->shopProduct
                    ->where('status',1)
                    ->select('*')
                    ->get();
    }
    // public function getByCart($productId) {
    //     return 0;
    // }

    // public function getProducts($productIds)
    // {
    //     return $this->shopProduct
    //                 ->join('sc_shop_product_description', 'sc_shop_product_description.product_id', '=', 'sc_shop_product.id')
    //                 ->join('sc_shop_product_promotion', 'sc_shop_product_promotion.product_id', '=', 'sc_shop_product.id')
    //                 ->whereIn('sc_shop_product.id', $productIds)
    //                 ->select('sc_shop_product_description.name as product_name','sc_shop_product_promotion.price_promotion')
    //                 ->get();
    // }
}
