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
                ->join('order_details', 'orders.id', '=', 'order_details.order_id')
                ->where('user_id', $user_id)
                ->where('status', 'pending')
                ->first();
            return $order;
        }
        public function addToOrder($user_id, $product_id)
        {
            $order = $this->getOrder();
            if (!$order) {
                //Nếu chưa có giỏ hàng thì tạo mới giỏ hàng và chi tiết giỏ hàng
                $order = $this->order->create([
                    'user_id' => $user_id
                ]);
                $this->orderDetail->create([
                    'order_id' => $order->id,
                    'product_id' => $product_id,
                    'quantity' => 1
                ]);
            }
            else {
                //Nếu đã có giỏ hàng thì kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
                $orderDetail = $this->orderDetail
                    ->where('order_id', $order->id)
                    ->where('product_id', $product_id)
                    ->first();
                if ($orderDetail) {
                    //Nếu sản phẩm đã có trong giỏ hàng thì tăng số lượng sản phẩm lên 1
                    $orderDetail->update([
                        'quantity' => $orderDetail->quantity + 1
                    ]);
                }
                else {
                    //Nếu sản phẩm chưa có trong giỏ hàng thì thêm mới sản phẩm vào giỏ hàng
                    $this->orderDetail->create([
                        'order_id' => $order->id,
                        'product_id' => $product_id,
                        'quantity' => 1
                    ]);
                }
            }
            $this->updateTotalPrice();
        }
        public function deleteProduct ($order_id, $product_id)
        {
            // Xóa sản phẩm trong giỏ hàng
            $orderDetail = $this->orderDetail
                ->where('order_id', $order_id)
                ->where('product_id', $product_id)
                ->first();
            $orderDetail->delete();
        }
        public function updateTotalPrice()
        {
            $orderDetails = $this->getProductInCart();
            // dd($orderDetails);
            $totalPrice = 0;
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
            // dd($order->id);
            // Cập nhật tổng giá trị đơn hàng
            $orderDetails = $this->orderDetail
                ->select('*')
                ->join('products', 'order_details.product_id', '=', 'products.id')
                ->where('order_id', $order->id)
                ->get();
            // dd($orderDetails);
            return $orderDetails;
        }
    }
?>
