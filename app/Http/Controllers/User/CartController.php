<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repositories\ShopProduct\ShopProductRepository;
use App\Repositories\Order\OrderRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $orderRepository;
    protected $shopProductRepository;
    public function __construct(ShopProductRepository $shopProductRepository, OrderRepository $orderRepository)
    {
        $this->shopProductRepository = $shopProductRepository;
        $this->orderRepository = $orderRepository;
    }
    public function index()
    {
        return view('Customer.home.cartDetail');
    }
    public function addToCart(Request $request) {
        // Lấy user_id từ người dùng đang đăng nhập
        $user_id = auth()->id(); // hoặc Auth::id();
        $this->orderRepository->addToOrder($user_id, $request->product_id);
        return response()->json([
            'message' => 'Add to cart successfully'
        ]);
    }

    // Phương thức để xóa sản phẩm khỏi giỏ hàng
    public function removeFromCart(Request $request)
    {
        // $cart = session()->get('cart', []);

        // $productId = $request->product_id;
        // if (isset($cart[$productId])) {
        //     unset($cart[$productId]);
        //     session()->put('cart', $cart);
        //     session()->save();
        // }
        // return response()->json([
        //     'cart' => session()->get('cart', [])
        // ]);
    }
}
