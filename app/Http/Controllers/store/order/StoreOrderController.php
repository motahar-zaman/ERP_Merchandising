<?php

namespace App\Http\Controllers\store\order;

use App\Buyer;
use App\store\merchandiser\StoreMerchandiser;
use App\store\order\StoreOrder;
use App\StoreBuyer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreOrderController extends Controller
{
    public function index()
    {
        $orders=StoreOrder::orderBy('order_no', 'asc')->get();
        return view('store.order.manage-order',compact('orders'));
    }
    public function add_order()
    {
        $buyer_list=Buyer::pluck('name','id');
        $merchandiser_list=StoreMerchandiser::pluck('merchandiser_name','id');
        return view('store.order.add-order',compact('buyer_list','merchandiser_list'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'style_no' => 'required|unique:store_orders'
        ]);
        StoreOrder::query()->create($request->all());
        return redirect('store/manage-order');
    }

    public function edit($id)
    {
        $buyer_list=Buyer::pluck('name','id');
        $merchandiser_list=StoreMerchandiser::pluck('merchandiser_name','id');
        $orders=StoreOrder::query()->findOrFail($id);
        return view('store.order.edit-order',compact('orders','buyer_list','merchandiser_list'));
    }


    public function update(Request $request, $id)
    {
        $data=StoreOrder::query()->find($id);
        $data->update($request->all());
        return redirect('store/manage-order');
    }

    public function destroy($id)
    {
        $order = StoreOrder::query()->findOrFail($id);
        $order->delete();
        return redirect('store/manage-order');
    }
}
