<?php

namespace App\Http\Controllers\store\inventory;

use App\Buyer;
use App\CostBreakdown;
use App\store\booking\StoreBooking;
use App\store\booking\StoreBookingDetails;
use App\store\inventory\StoreInventory;
use App\store\inventory\StoreInventoryDetails;
use App\store\order\StoreOrder;
use App\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

class StoreInventoryController extends Controller
{
    public function index()
    {
        return view('store.inventory.manage-inventory');
    }
    public function getInventory()
    {
        $store_inventory = StoreInventory::orderBy('rcv_date','asc')->get();
        return Datatables::of($store_inventory)
                        ->addIndexColumn()
                        ->addColumn('style_no', function (StoreInventory $inventory) {
                                return $inventory->store_order !=null ? $inventory->store_order->style_no : '';
                            })
                        ->addColumn('order_no', function (StoreInventory $inventory) {
                                return $inventory->store_order !=null ? $inventory->store_order->order_no : '';
                            })
                        ->addColumn('supplier_name', function (StoreInventory $inventory) {
                                return $inventory->supplier_name !=null ? $inventory->supplier_name->name : '';
                            })
                        ->addColumn('action', function ($store_inventory) {
                            return view('store.inventory.action-column', compact('store_inventory'));
                        })
                        ->make(true);
    }
    public function add_inventory()
    {
        $styles=CostBreakdown::Where('style', '!=', null)->pluck('style','id')->toArray();
        $styles_order=StoreOrder::where('style_no', '!=', null)->pluck('style_no','id')->toArray();
        $all_styles = array_merge($styles, $styles_order);
        $booking_styles = StoreOrder::pluck('style_no','id');
        $buyers_list=Buyer::pluck('name','id');
        $styles=CostBreakdown::Where('style', '!=', null)->pluck('style','id');
        $suppliers_list=Supplier::pluck('name','id');
        return view('store.inventory.add-inventory',compact('buyers_list','styles','suppliers_list','all_styles','booking_styles'));
    }

    public function store(Request $request)
    {
        // $prev_inventory = StoreInventory::where([
        //     'inv_cha' => $request->inv_cha,
        //     'style_no' => $request->style_no,
        //     'order_no' => $request->order_no,
        //     'order_qty' => $request->order_qty,
        //     'buyer' => $request->buyer,
        //     'supplier' => $request->supplier,
        //     'exp_lc' => $request->exp_lc,
        //     'bb_lc' => $request->bb_lc,
        //     'po_no' => $request->po_no,
        //     'accounts' => $request->accounts,
        //     'bond_no' => $request->bond_no,
        //     'floor' => $request->floor,
        //     'packages'  => $request->packages,
        // ])->first();

        // if(isset($prev_inventory->id)){
        //     return redirect()->back()->with('error',"Same information with same style can't be taken twice");
        // }

        $store_inventory = new StoreInventory();
        $store_inventory->store_booking_id = $request->style_no;
        $store_inventory->style_no = $request->style_no;
        $store_inventory->rcv_date = $request->rcv_date;
        $store_inventory->inv_cha = $request->inv_cha;
        $store_inventory->style_no = $request->style_no;
        $store_inventory->order_no = $request->order_no;
        $store_inventory->order_qty = $request->order_qty;
        $store_inventory->buyer = $request->buyer;
        $store_inventory->supplier = $request->supplier;
        $store_inventory->exp_lc = $request->exp_lc;
        $store_inventory->bb_lc = $request->bb_lc;
        $store_inventory->po_no = $request->po_no;
        $store_inventory->accounts = $request->accounts;
        $store_inventory->bond_no = $request->bond_no;
        $store_inventory->floor = $request->floor;
        $store_inventory->packages = $request->packages;
        $store_inventory->save() ;
        $this->store_inventory_details($request->all(),$store_inventory->id, $request->rcv_date);

        return redirect('store/manage-inventory');
    }

    public function store_inventory_details($request,$query, $rcv_date){

        $items= $request['item_name'];
        $null_received_qty = 0;
        foreach ($items as $tr=>$item){
            if ($request['received_qty'][$tr] != null)
            {
                $data = [
                    'store_inventory_id' => $query,
                    'store_booking_details_id' => $request['store_booking_details_id'][$tr],
                    'item_name' => $request['item_name'][$tr],
                    'req_qty' => $request['req_qty'][$tr],
                    'invoice_qty' => $request['invoice_qty'][$tr],
                    'received_qty' => $request['received_qty'][$tr],
                    'short_qty' => $request['short_qty'][$tr],
                    'over_qty' => $request['over_qty'][$tr],
                    'fab_roll' => $request['fab_roll'][$tr],
                    'remarks' => $request['remarks'][$tr],
                    'rcv_date' => $rcv_date,
                ];
                StoreInventoryDetails::query()->create($data);
            }else{
                $null_received_qty++;
            }
        }

        if($null_received_qty == count($request['item_name'])){
            StoreInventory::find($query)->delete();
            session()->flash('error','Inventory can not be saved because all received qty field was 0 or null');
        }else{
            session()->flash('success','Inventory Has Been Stored Successfully');
        }
    }


    public function details($id){
        $store_inventory = StoreInventory::query()->find($id);
        $store_inventory_details= StoreInventoryDetails::orderBy('id','asc')->where('store_inventory_id',$id)->get();

        return view('store.inventory.inventory-report',compact('store_inventory','store_inventory_details'));
    }

    public function print($id){
        $store_inventory = StoreInventory::with('style')->find($id);
        $store_inventory_details= StoreInventoryDetails::orderBy('id','asc')->where('store_inventory_id',$id)->get();

        return view('store.inventory.inventory-report-print',compact('store_inventory','store_inventory_details'));
    }

    public function edit($id)
    {
        $buyers_list=Buyer::pluck('name','id');
        $styles=CostBreakdown::Where('style', '!=', null)->pluck('style','id');
        $suppliers_list=Supplier::pluck('name','id');
        $inventory=StoreInventory::query()->findOrFail($id);
        return view('store.inventory.edit-inventory',compact('inventory','buyers_list','suppliers_list','styles'));
    }

    public function update(Request $request, $id)
    {
        $list = StoreInventory::findOrFail($id);
        $input= $request->all();
        $list->fill($input)->save();
        $inventory_details =  StoreInventoryDetails::where('store_inventory_id',$id)->get();
        foreach ($inventory_details as $inventory_detail){
            $inventory_detail->delete();
        }
        $this->store_inventory_details($request->all(),$id);
        return redirect('store/manage-inventory')->with('success','Inventory Has Been Updated Successfully');
    }

    public function destroy($id)
    {
        $inventory = StoreInventory::query()->findOrFail($id);
        $inventory_details = StoreInventoryDetails::query()->where('store_inventory_id',$id)->delete();
        $inventory->delete();
        return response()->json(['success'=>true]);
    }

    public function getOrderListInventory(Request $request){

        //dd($request->all());
        $returnData = '';
        $style = StoreBooking::with('store_booking_details')->where('store_order_id',$request->style_id)->first();
//        dd($style);
        if($style && $style->store_booking_details) {
            foreach ($style->store_booking_details as $k=>$details) {
                $sl=$k+1;
                $returnData .= "<tr>
                <td>
                <input type='hidden' name='store_booking_details_id[]'  value='$details->id' class='form-control' >
                <input type='text' name='item_name[]'  value='$details->item' class='form-control' >
                </td>
                <td><input type='text' name='req_qty[]'  value='$details->order_qty' class='form-control' ></td>
                <td><input id='invoice_qty".$sl."' type='number' name='invoice_qty[]' onkeyup='cal(".$sl.")' class='form-control' ></td>
                <td><input id='received_qty".$sl."' type='number' name='received_qty[]' onkeyup='cal(".$sl.")' class='form-control' ></td>
                <td><input type='text' name='short_qty[]' id='short".$sl."' class='form-control' ></td>
                <td><input type='text' name='over_qty[]'  id='over".$sl."' class='form-control' ></td>
                <td><input type='text' name='fab_roll[]' class='form-control'></td>
                <td><input type='text' name='remarks[]' class='form-control'></td>
                </tr>";
            }
            $returnStyle['style'] = $style->toArray();
            $returnStyle['html'] = $returnData;
            return $returnStyle;
        }
        else
        {
            return `<tr><td>not found!</td></tr>`;
        }
    }


    public function getChalanList(Request $request){
            //dd($request->id);
            $all_chalan=StoreInventory::pluck('inv_cha','id');
            $invoice= StoreInventoryDetails::where('store_inventory_id',$request->inv_chalan)->get();

            return view('store.report.chalan_report',compact('all_chalan','invoice'));
    }
}
