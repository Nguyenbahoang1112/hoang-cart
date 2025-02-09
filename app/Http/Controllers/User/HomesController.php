<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repositories\ShopProduct\ShopProductRepository;
use App\Repositories\ShopBanner\ShopBannerRepository;
use App\Repositories\ShopNews\ShopNewsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class HomesController extends Controller
{
    protected $shopProductRepository;
    protected $shopBannerRepository;
    protected $shopNewsRepository;

    public function __construct(ShopProductRepository $shopProductRepository, ShopBannerRepository $shopBannerRepository, ShopNewsRepository $shopNewsRepository)
    {
        $this->shopProductRepository = $shopProductRepository;
        $this->shopBannerRepository = $shopBannerRepository;
        $this->shopNewsRepository = $shopNewsRepository;
    }

    public function index() {
            $banners = $this->shopBannerRepository->getAll();
            $newses = $this->shopNewsRepository->getAll();
            $products = $this->shopProductRepository->getAll();
            // $products = json_decode(file_get_contents('http://127.0.0.1:8000/api/product'));
            // $response = Http::get('http://127.0.0.1:8000/api/product');
            // if ($response->successful()) {
                // $products = $response->json()['data'];
            // } else {
            // // Xử lý lỗi
            // $products = [];
            // dd($products);
            return view('Customer.home.index', compact('products', 'banners', 'newses'));
    }
    public function showProduct($id) {
        // $product = $this->shopProductRepository->find($id);
        return view('Customer.home.productDetail');
    }
}
