<?php
    namespace App\Repositories\Order;
    use App\Models\Order;
    use App\Models\OrderDetail;
    use App\Models\Product;
    class OrderRepository
    {
        protected $order;
        protected $orderDetail;
        protected $product;
        function __construct(Order $order, OrderDetail $orderDetail, Product $product)
        {
            $this->order = $order;
            $this->orderDetail = $orderDetail;
            $this->product = $product;
        }
        public function getOrder()
        {
            $user_id = auth()->id();
            // Lấy giỏ hàng của người dùng
            $order = $this->order
                ->select('*')
                // ->join('order_details', 'orders.id', '=', 'order_details.order_id')
                ->where('user_id', $user_id)
                ->where('status', 'pending')
                ->first();
                // dd($order->id);
            return $order;
        }
        public function addToOrder($product_id)
        {
            // dd($product_id);
            $user_id = auth()->id();
            $order = $this->getOrder();

            if (!$order) {
                // Nếu chưa có giỏ hàng thì tạo mới giỏ hàng
                $order = $this->order->create([
                    'user_id' => $user_id,
                    'status' => 'pending',
                    'total' => 0
                ]);
            }

            // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
            $orderDetail = OrderDetail::where('order_id', $order->id)
                                        ->where('product_id', $product_id)
                                        ->first();

            if ($orderDetail) {
                // Nếu sản phẩm đã tồn tại, tăng số lượng lên 1
                $orderDetail->update([
                    'quantity' => $orderDetail->quantity + 1
                ]);
            } else {
                // Nếu chưa có, thêm sản phẩm mới vào giỏ hàng
                $this->orderDetail->create([
                    'order_id' => $order->id,
                    'product_id' => $product_id,
                    'quantity' => 1
                ]);
            }
            $order = $this->getOrder();
            // Cập nhật tổng giá trị đơn hàng
            $this->updateTotalPrice($order);
        }
        public function deleteProduct ($product_id)
        {
            $order_id = $this->getOrder()->id;
            // Xóa sản phẩm trong giỏ hàng
            $orderDetail = $this->orderDetail
                ->where('order_id', $order_id)
                ->where('product_id', $product_id)
                ->delete();
            // $orderDetail->delete();
            $this->updateTotalPrice();
        }
        public function updateTotalPrice()
        {
            $orderDetails = $this->getProductInCart();
            // dd($orderDetails);
            $totalPrice = 0;
            if(!$orderDetails) {
                return 0;
            }
            foreach ($orderDetails as $orderDetail) {
                $totalPrice += $orderDetail->price_new * $orderDetail->quantity;
            }
            // dd($totalPrice);

            $order = $this->getOrder(); // Lấy object Order
            if ($order) {
                $this->order
                    ->where('id', $order->id) // Thêm điều kiện để chỉ cập nhật đúng bản ghi
                    ->update([
                        'total' => $totalPrice
                ]);
            }
            return $totalPrice;
        }
        public function getProductInCart()
        {
            $order = $this->getOrder();
            if ($order) {
                $orderDetails = $this->orderDetail
                ->select('*')
                ->join('products', 'order_details.product_id', '=', 'products.id')
                ->where('order_id', $order->id)
                ->get();
            return $orderDetails;
            }
            else {
                return collect();
            }

        }
    }
?>
