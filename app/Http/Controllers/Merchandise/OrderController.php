<?php


namespace App\Http\Controllers\Merchandise;


use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(){
        return view('merchandising/order/create-order');
    }

    public function createOrder(){}
}
