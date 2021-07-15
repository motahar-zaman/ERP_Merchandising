<?php

namespace App\Http\Controllers\store\booking;

use App\Buyer;
use App\CostBreakdown;
use App\ProductUnit;
use App\store\booking\StoreBooking;
use App\store\booking\StoreBookingDetails;
use App\store\inventory\StoreInventoryDetails;
use App\store\merchandiser\StoreMerchandiser;
use App\store\order\StoreOrder;
use App\store\StoreGroup;
use App\StoreBuyer;
use App\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class StoreBookingController extends Controller
{
     public function index()
    {
        $suppliers_list=Supplier::pluck('name','id');
        $store_bookings = StoreBooking::orderBy('order_no','asc')->get();
        $store_booking_details = StoreBookingDetails::orderBy('id','asc')->get();
        return view('store.booking.manage-booking',compact('suppliers_list','store_bookings','store_booking_details'));
    }

    public function inhouseReport($style_no, $date_range)
    {   
        $from_date = explode('&', $date_range)[0];
        $to_date = explode('&', $date_range)[1];
        $store_bookings = StoreBooking::query()->find($style_no);
        $store_booking_details = StoreBookingDetails::orderBy('id','asc')->with('unit_name')->where('store_booking_id',$style_no)->get();
        return view('store.booking.report.inhouse', compact('from_date','to_date','store_bookings','store_booking_details','style_no'));
    }

    public function issueReport($style_no, $date_range)
    {   
        $from_date = explode('&', $date_range)[0];
        $to_date = explode('&', $date_range)[1];
        $store_bookings = StoreBooking::query()->find($style_no);
        $store_booking_details = StoreBookingDetails::orderBy('id','asc')->with('unit_name')->where('store_booking_id',$style_no)->get();
        return view('store.booking.report.issue', compact('from_date','to_date','store_bookings','store_booking_details','style_no'));
    }

    public function supplierWiseProducts($data)
    {   

        $style_no = explode('&', $data)[0];
        $supplier_id = explode('&', $data)[1];
        
        $supplier = Supplier::find($supplier_id);
        $store_bookings = StoreBooking::query()->find($style_no);
        $store_detail_array = array();
        if(isset($supplier->id)){
            $store_booking_details = StoreBookingDetails::orderBy('id','asc')->where('store_booking_id',$style_no)->where('supplier_name',$supplier_id)->get(['id']);
        }else{
            $store_booking_details = StoreBookingDetails::orderBy('id','asc')->where('store_booking_id',$style_no)->get(['id']);
        }
        $store_inventory_details = null;
        if(isset($store_booking_details[0]->id)){
            foreach ($store_booking_details as $key => $value) {
                array_push($store_detail_array, $value->id);
            }
            $store_inventory_details = StoreInventoryDetails::whereIn('store_booking_details_id', $store_detail_array)->orderBy('rcv_date')->get();
        }
        
        return view('store.booking.report.supplier_wise_products',compact('supplier','store_bookings','store_inventory_details'));
    }
    public function add_booking()
    {
        // $store_booking = StoreBooking::get();
        // foreach ($store_booking as $key => $sb) {
        //     $store_booking_details = StoreBookingDetails::where('store_booking_id',$sb->id)->get();
        //     foreach ($store_booking_details as $key => $value) {
        //         StoreBookingDetails::find($value->id)->update(['style_no'=> StoreOrder::where('style_no', $sb->style_no)->first()->id]);
        //     }
        // }

        $buyers_list=Buyer::pluck('name','id');
        $merchandisers_list=StoreMerchandiser::pluck('merchandiser_name','id');
//        $styles=CostBreakdown::Where('style', '!=', null)->pluck('style','id')->toArray();
        $all_styles=StoreOrder::where('style_no', '!=', null)->pluck('style_no','id');
//        $all_styles = array_merge($styles, $styles_order);
        $units=ProductUnit::pluck('name','id');
        $suppliers_list=Supplier::pluck('name','id');
        $group_list=StoreGroup::pluck('group_name','id');
        $order_list=StoreOrder::pluck('order_no','id');
        return view('store.booking.add-booking',compact('group_list','buyers_list','merchandisers_list','units','suppliers_list','all_styles','order_list'));
    }

    public function store(Request $request)
    {
        //return $request->all();
        $store_booking = new StoreBooking();
        $store_booking->store_order_id = $request->store_order_id;
        $store_booking->booking_date = $request->booking_date;
        $store_booking->style_no = StoreOrder::find($request->store_order_id)->style_no;
        $store_booking->order_no = $request->order_no;
        $store_booking->order_qty = $request->order_qty;
        $store_booking->buyer_name = $request->buyer_name;
        $store_booking->merchandiser_name = $request->merchandiser_name;
        $store_booking->save() ;
        $this->store_booking_details($request->all(),$store_booking->id);
        return redirect('store/manage-booking');
    }

    public function store_booking_details($request,$query){
       // dd($request);
        $keys = preg_grep('/^order_qty[0-9]/',array_keys($request));
        foreach($keys as $key){
            preg_match('!\d+!',$key,$number);
            foreach($number as $num){
                $prev_item = StoreBookingDetails::where('item',$request['item'.$num])->where('style_no',$request['store_order_id'])->first();
                if(isset($prev_item->id)){
                    StoreBooking::find($query)->delete();
                    session()->flash('error','Same item can not be taken twice for same style!');
                    return redirect()->back();
                }
                $data = [
                    'store_booking_id' => $query,
                    'style_no' => $request['store_order_id'],
                    'group' => $request['group'.$num],
                    'item' => $request['item'.$num],
                    'order_qty' => $request['order_qty'.$num],
                    'unit' => $request['unit'.$num],
                    'supplier_name' => $request['supplier_name'.$num],
                    'rcv_qty' => $request['rcv_qty'.$num],
                    'balance_qty' => $request['balance_qty'.$num],
                    'qoh' => $request['qoh'.$num],
                    'fabric_roll' => $request['fabric_roll'.$num],
                    'remarks' => $request['remarks'.$num],
                ];
                StoreBookingDetails::create($data);
            }
        }
        session()->flash('success','Booking Has Been Stored Successfully');
    }

    public function details($id)
    {
        $store_bookings = StoreBooking::query()->find($id);
        $store_booking_details = StoreBookingDetails::orderBy('id','asc')->with('unit_name')->where('store_booking_id',$id)->get();
        return view('store.booking.booking-report',compact('store_bookings','store_booking_details'));
    }

    public function print($id)
    {
        $store_bookings = StoreBooking::query()->find($id);
        $store_booking_details = StoreBookingDetails::orderBy('id','asc')->with('unit_name')->where('store_booking_id',$id)->get();
        return view('store.booking.booking-report-print',compact('store_bookings','store_booking_details'));
    }

    public function edit($id)
    {

        $all_styles=StoreOrder::where('style_no', '!=', null)->pluck('style_no','id');
        $buyers_list=Buyer::pluck('name');
        $merchandisers_list=StoreMerchandiser::pluck('merchandiser_name');
        $bookings=StoreBooking::query()->findOrFail($id);
        $units=ProductUnit::pluck('name','id');
        $suppliers_list=Supplier::pluck('name','id');
        $group_list=StoreGroup::pluck('group_name','id');
        $order_list=StoreOrder::pluck('order_no','id');
        return view('store.booking.edit-booking',compact('bookings','buyers_list','merchandisers_list','all_styles','units','suppliers_list','group_list','order_list'));
    }

    //changed by sakib
    public function update(Request $request, $id)
    {
        //return $request->all();
        //return count($request->group);
        $list = StoreBooking::findOrFail($id);
        $input= $request->all();
        $list->fill($input)->update();
        $i = 0;

        $count_group = count($request->group);
        $count_store_detail_id = count($request->store_detail_id);

        if($count_group > 0){
            for($i = 0; $i < $count_group; $i++){
                if($i < $count_store_detail_id){
                    StoreBookingDetails::find($request->store_detail_id[$i])->update([
                        'group'=> $request->group[$i],
                        'item'=>$request->item[$i],
                        'order_qty'=>$request->detail_order_qty[$i],
                        'unit'=>$request->unit[$i],
                        'supplier_name'=>$request->supplier_name[$i],
                        'rcv_qty'=>$request->rcv_qty[$i],
                        'balance_qty'=>$request->balance_qty[$i],
                        'qoh'=>$request->qoh[$i],
                        'fabric_roll'=>$request->fabric_roll[$i],
                        'remarks'=>$request->remarks[$i],
                    ]);
                }else{
                    $style_no = StoreOrder::where('style_no',$list->style_no)->first()->id;
                    $store_booking_details = StoreBookingDetails::where('item',$request->item[$i])->where('style_no', $style_no)->first();

                    if(isset($store_booking_details->id)){
                        session()->flash('error','Same item can not be taken twice for same style!');
                        return redirect()->back();
                    }else{
                        StoreBookingDetails::insert([
                            'store_booking_id'=> $list->id,
                            'group'=> $request->group[$i],
                            'item'=>$request->item[$i],
                            'order_qty'=>$request->detail_order_qty[$i],
                            'unit'=>$request->unit[$i],
                            'supplier_name'=>$request->supplier_name[$i],
                            'rcv_qty'=>$request->rcv_qty[$i],
                            'balance_qty'=>$request->balance_qty[$i],
                            'qoh'=>$request->qoh[$i],
                            'fabric_roll'=>$request->fabric_roll[$i],
                            'remarks'=>$request->remarks[$i],
                        ]);
                    }

                    
                }
            }
            if($count_group < $count_store_detail_id){
                for($i = $count_group; $i< $count_store_detail_id; $i ++){
                    StoreBookingDetails::find($request->store_detail_id[$i])->delete();
                } 
            }
        }
        return redirect()->back();
        //return redirect('store/manage-booking')->with('success','Booking Has Been Updated Successfully');
    }

    public function destroy($id)
    {
        $bookings = StoreBooking::query()->findOrFail($id);
        $booking_details = StoreBookingDetails::where('store_booking_id',$id);
        $bookings->delete();
        $booking_details->delete();
        return response()->json(['success'=>true]);
    }


    public function getOrderList(Request $request){
        $style=StoreOrder::with('buyers','merchandisers')->where('id',$request->style_id)->first();
        return $style;
    }
}
