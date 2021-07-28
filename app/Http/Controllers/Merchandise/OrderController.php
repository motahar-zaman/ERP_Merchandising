<?php


namespace App\Http\Controllers\Merchandise;


use App\Http\Controllers\Controller;
use App\Models\Order\Order;
use App\Models\Order\OrderSizeQuantity;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        return view('merchandising/order/create-order');
    }

    public function createOrder(Request $request){
        $data = $request->all();
        $orderQuantity = 0;
        foreach ($data["quantity"] as $quantity){
            $orderQuantity += $quantity;
        }

        $order = new Order();

        $order->order_no = $data["order_no"];
        $order->order_name = $data["description"];
        $order->style_name = $data["style_name"];
        $order->buyer_id = $data["buyer"];
        $order->delivery_date = $data["delivery_date"];
        $order->quantity = $orderQuantity;
        $order->status = 1;
        $order->created_at = date("Y-m-d H:i:s");
        $order->updated_at = date("Y-m-d H:i:s");

        $order->save();

        foreach ($data["size"] as $index => $sizeName){
            $size = new OrderSizeQuantity();

            $size->order_id = $order->id;
            $size->size_name = $sizeName;
            $size->quantity = $data["quantity"][$index] + 0;
            $size->status = 1;
            $size->created_at = date("Y-m-d H:i:s");
            $size->updated_at = date("Y-m-d H:i:s");

            $size->save();
        }

        return redirect()->route('order-element-ui', ['orderId' => $order->id]);
    }

    public function elements($orderId){
        return view('merchandising/order/create-order-elements')-> with('orderId', $orderId);
    }
}
