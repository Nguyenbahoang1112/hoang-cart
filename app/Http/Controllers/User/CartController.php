<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repositories\ShopProduct\ShopProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $shopProductRepository;
    public function __construct(ShopProductRepository $shopProductRepository)
    {
        return $this->shopProductRepository = $shopProductRepository;
    }

    public function addToCart(Request $request) {
        $productId = $request->product_id;
        $quantity = 1;
        $productInfo = $this->shopProductRepository->getByCart($productId);
        // dd($productInfo);
        // Lấy giỏ hàng từ session, nếu chưa có giỏ hàng thì khởi tạo mảng rỗng
        $cart = session()->get('cart', []);

        // Kiểm tra sản phẩm đã có trong giỏ hàng chưa
        if (isset($cart[$productId])) {
            // Nếu có, tăng số lượng sản phẩm
            $cart[$productId]['quantity'] += $quantity;
        } else {
            // Nếu chưa có, thêm sản phẩm mới vào giỏ hàng
            $cart[$productId] = [
                'product_id' => $productId,
                'product_name' => $productInfo->product_name,
                'product_price' => $productInfo->price_promotion,
                'quantity' => $quantity,
            ];
        }
      //  dd($cart[$productId]);
        // Lưu giỏ hàng lại vào session
        session()->put('cart', $cart);
        session()->save();

        return response()->json([
            'cart' => $cart
        ]);
    }

    // Phương thức để xóa sản phẩm khỏi giỏ hàng
    public function removeFromCart(Request $request)
    {
        $cart = session()->get('cart', []);

        $productId = $request->product_id;
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
            session()->save();
        }
        return response()->json([
            'cart' => session()->get('cart', [])
        ]);
    }
}
