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
                    ->where('products.status', 1)
                    ->join('categories', 'products.category_id', '=', 'categories.id')
                    ->select('products.*', 'categories.category_name as category_name')
                    ->get();
    }
    public function getProducts($productIds)
    {
        return $this->shopProduct
                    ->select('*')
                    ->join('categories', 'products.category_id', '=', 'categories.id')
                    ->where('products.id', $productIds)
                    ->first();
    }
    public function createProduct($request, $file_url) {
        return $this->shopProduct
                    ->create([
                        'name' => $request->name,
                        'image_url' => $file_url,
                        'price_old' => $request->price_old,
                        'price_new' => $request->price_new,
                        'category_id' => $request->category_id,
                    ]);
    }
    public function updateProduct($request, $file_url, $id) {
        if($file_url == null) {
            return $this->shopProduct
                    ->where('id', $id)
                    ->update([
                        'name' => $request->name,
                        'price_old' => $request->price_old,
                        'price_new' => $request->price_new,
                        'category_id' => $request->category_id,
                    ]);
        }
        else
            return $this->shopProduct
                    ->where('id', $id)
                    ->update([
                        'name' => $request->name,
                        'image_url' => $file_url,
                        'price_old' => $request->price_old,
                        'price_new' => $request->price_new,
                        'category_id' => $request->category_id,
                    ]);
    }
    public function deleteById($id)
    {
        return $this->shopProduct
                    ->where('id', $id)
                    ->delete();
    }

}
