<?php


namespace App\Http\Controllers\Merchandise;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        return view('merchandising/order/create-order');
    }

    public function createOrder(Request $request){
        $data = $request->all();
        $id = 7;
        return redirect()->route('order-element-ui', ['orderId' => $id]);
    }

    public function elements($orderId){
        return view('merchandising/order/create-elements')-> with('orderId', $orderId);
    }
}
