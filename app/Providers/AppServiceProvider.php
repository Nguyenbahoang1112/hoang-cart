<?php

namespace App\Providers;

use App\Repositories\ShopProduct\ShopProductRepository;
use App\Models\ShopProduct;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // $shopProductRepository = new ShopProductRepository(new ShopProduct());

        // $carts = session('cart');
        // $list_product_id = array_keys($carts);
        // $productList = $shopProductRepository->getProducts($list_product_id);
        // foreach ($productList as $product) {
        //     if (isset($carts[$product->id])) {
        //         $carts[$product->id]['product_name'] = $product->product_name;
        //         $carts[$product->id]['product_price'] = $product->product_price;
        //     }
        // }
        // foreach ($carts as &$cart) {
        //     if (!isset($carts[$product->id]['product_name'])) {
        //         unset($cart);
        //     }
        // }
        // View::share('carts', $carts);
    }
}
