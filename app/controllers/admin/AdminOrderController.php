<?php

class AdminOrderController extends Controller
{
    public static $db;

    public function __construct()
    {
        self::$db = Connection::connect();

        if (!Auth::isAdmin()) {
            return Redirect::to('Product/index');
        }
    }

    public function index()
    {
        $orders = Order::all()->fetch();

        $data = [];
        foreach ($orders as $order) {
            $orderItems = OrderItem::all()
                ->join(['order_items', 'products'], ['product_id', 'product_id'])
                ->where('order_id', $order->order_id)
                ->fetch();

            if (count($orderItems) > 0) {
                $order->orderItems = $orderItems;
                $data[] = $order;
            }
        }

        return self::adminView('orders', $data);
    }

    public function realize($params)
    {
        if (
            !empty($params['order_id'])
            && filter_var($params['order_id'], FILTER_VALIDATE_INT)
            && $params['order_id'] > 0
        ) {
            $order_id = $params['order_id'];
            $order = Order::get($order_id);
            $order->status = 1;
            $order->update($order_id);

            return Redirect::to('AdminOrder/index');
        } else {
            return Redirect::to('AdminProduct/index');
        }
    }
}
