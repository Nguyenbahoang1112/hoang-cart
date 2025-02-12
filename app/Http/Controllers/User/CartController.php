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
        $carts = $this->orderRepository->getProductInCart();
        return view('Customer.home.cartDetail', compact('carts'));
    }
    public function addToCart(Request $request) {
        $user_id = auth()->id(); // hoặc Auth::id();
        // dd($request->product_id);
        $this->orderRepository->addToOrder( $request->product_id);
        $carts = $this->orderRepository->getProductInCart();
        return response()->json([
            'carts' => $carts,
            'success' => true,
            'message' => 'Add to cart successfully'
        ]);
    }

    // Phương thức để xóa sản phẩm khỏi giỏ hàng
    public function removeFromCart($id)
    {
        $this->orderRepository->deleteProduct($id);
        return response()->json(['message' => 'Sản phẩm đã bị xóa!']);
    }
}
