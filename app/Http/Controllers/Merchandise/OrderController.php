<?php


namespace App\Http\Controllers\Merchandise;


use App\Buyer;
use App\Http\Controllers\Controller;
use App\Models\Order\Order;
use App\Models\Order\OrderElement;
use App\Models\Order\OrderSizeQuantity;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $buyers = Buyer::get();
        return view('merchandising/order/create-order', ["buyers" => $buyers]);
    }

    public function createOrder(Request $request){
        $data = $request->all();
        $orderQuantity = 0;
        foreach ($data["quantity"] as $quantity){
            $orderQuantity += $quantity;
        }

        $order = new Order();

        $order->order_no = $data["order_no"] ?? null;
        $order->order_name = $data["description"] ?? null;
        $order->style_name = $data["style_name"] ?? null;
        $order->buyer_id = $data["buyer"] ?? null;
        $order->delivery_date = $data["delivery_date"] ?? null;
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
        $sizeQuantity = OrderSizeQuantity::where('order_id', $orderId)->get();

        return view('merchandising/order/create-order-elements')-> with(['orderId'=> $orderId, 'sizeQuantity' => $sizeQuantity]);
    }

    public function addElements(Request $request){
        $data = $request->all();

        for($i = 0; $i < count($data["element_name"]); $i++){
            $element = new OrderElement();

            $element->order_id = $data["order_id"] ?? null;
            $element->size_quantity_id = $data["size"][$i] ?? null;
            $element->element_name = $data["element_name"][$i] ?? null;
            $element->quantity_per_unit = $data["quantity"][$i] ?? null;
            $element->waste_percentage = $data["wastage"][$i] ?? null;
            $element->color = $data["color"][$i] ?? null;
            $element->type = $data["type"][$i] ?? null;
            $element->created_at = date("Y-m-d H:i:s");
            $element->updated_at = date("Y-m-d H:i:s");

            $element->save();
        }
        return redirect()->route("order-details", ['orderId' => $data["order_id"]]);
    }

    public function orderDetails($orderId){
        $order = Order::find($orderId);
        return view('merchandising/order/order-details')-> with(['order'=> $order]);
    }

    public function orderList(){
        $order = Order::where("status", 1)->get();
        return view('merchandising/order/order-list')-> with(['orders'=> $order]);
    }
}
