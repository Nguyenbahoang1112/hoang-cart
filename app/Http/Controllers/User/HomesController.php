<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repositories\ShopProduct\ShopProductRepository;
use App\Repositories\ShopBanner\ShopBannerRepository;
use App\Repositories\ShopNews\ShopNewsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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
    // protected $shopProductRepository = new ProductRepository();

    public function index() {
        $banners = $this->shopBannerRepository->getAll();
        $newses = $this->shopNewsRepository->getAll();
        $products = $this->shopProductRepository->getAll();
        return view('Customer.home.index', compact('products', 'banners', 'newses'));
    }
}
