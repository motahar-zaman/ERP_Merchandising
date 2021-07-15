<?php

namespace App\Http\Controllers\store\requisition;

use App\Buyer;
use App\CostBreakdown;
use App\Merchandise\CompanyUnit;
use App\store\booking\StoreBooking;
use App\store\inventory\StoreInventory;
use App\store\order\StoreOrder;
use App\store\requisition\StoreRequisition;
use App\store\requisition\StoreRequisitionDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreRequisitionController extends Controller
{
    public function index()
    {
        $store_requisition = StoreRequisition::with('buyer_name')->orderBy('date','asc')->get();
        return view('store.requisition.manage-requisition',compact('store_requisition'));
    }
    public function add_requisition()
    {
        $buyers_list=Buyer::pluck('name','id');
        $styles=CostBreakdown::Where('style', '!=', null)->pluck('style','id');
        $booking_styles =StoreOrder::pluck('style_no','id');
        $company_units=CompanyUnit::pluck('name','id');
        return view('store.requisition.add-requisition',compact('buyers_list','styles','company_units','booking_styles'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $checkData= StoreRequisition::query()->where('store_inventory_id', '!=', 0)->where('store_inventory_id',$request->store_inventory_id)->first();
        if($checkData == null){
            $store_requisition = new StoreRequisition();
            $store_requisition->store_inventory_id = $request->store_inventory_id;
            $store_requisition->date = $request->date;
            $store_requisition->style = $request->style;
            $store_requisition->ord_no = $request->ord_no;
            $store_requisition->ord_qty = $request->ord_qty;
            $store_requisition->buyer = $request->buyer;
            $store_requisition->company_unit = $request->company_unit;
            $store_requisition->remarks = $request->remarks;
            //dd($store_requisition);
            $store_requisition->save() ;
            $this->store_requisition_details($request->all(),$store_requisition->id, $request->date);
        }else{
            $this->store_requisition_details($request->all(),$checkData->id, $checkData->date);

        }

        return redirect('store/manage-requisition')->with('success','Requisition Has Been Stored Successfully');
    }


    public function store_requisition_details($request,$query,$date){
        $items= $request['item_name'];
        foreach ($items as $tr=>$item){
            $data = [
                'store_requisition_id' => $query,
                'store_booking_details_id' => $request['store_booking_details_id'][$tr],
                'item_name' => $request['item_name'][$tr],
                'consumption' => $request['consumption'][$tr],
                'ord_qty_details' => $request['ord_qty_details'][$tr],
                'qoh' => $request['qoh'][$tr],
                'issued' => $request['issued'][$tr],
                'roll' => $request['roll'][$tr],
                'remarks_details' => $request['remarks_details'][$tr],
                'issue_date' => $date,
            ];
            StoreRequisitionDetails::query()->create($data);
        }
    }

    public function details($id)
    {
        $store_requisition = StoreRequisition::query()->find($id);
        $store_requisition_details = StoreRequisitionDetails::with('store_booking_details')->whereHas('store_booking_details',function($q){
            $q->orderBy('store_booking_details.item');
        })->where('store_requisition_id',$id)->get();
        return view('store.requisition.requisition-report',compact('store_requisition','store_requisition_details'));
    }

    public function print($id)
    {
        $store_requisition = StoreRequisition::query()->find($id);
        $store_requisition_details = StoreRequisitionDetails::with('store_booking_details')->whereHas('store_booking_details',function($q){
            $q->orderBy('store_booking_details.item');
        })->where('store_requisition_id',$id)->get();
        return view('store.requisition.requisition-report-print',compact('store_requisition','store_requisition_details'));
    }

    public function edit($id)
    {
        $buyers_list=Buyer::pluck('name','id');
        $styles=CostBreakdown::Where('style', '!=', null)->pluck('style','id');
        $company_units=CompanyUnit::pluck('name','id');
        $requisition=StoreRequisition::query()->findOrFail($id);
        return view('store.requisition.edit-requisition',compact('buyers_list','styles','company_units','requisition'));
    }

    public function update(Request $request, $id)
    {
        $list = StoreRequisition::findOrFail($id);
        $input= $request->all();
        $list->fill($input)->save();
        $requisition_details =  StoreRequisitionDetails::where('store_requisition_id',$id)->get();
        foreach ($requisition_details as $requisition_detail){
            $requisition_detail->delete();
        }
        $this->store_requisition_details($request->all(),$id);
        return redirect('store/manage-requisition')->with('success','Requisition Has Been Updated Successfully');
    }

    public function destroy($id)
    {
        $requisition = StoreRequisition::query()->findOrFail($id)->delete();
        $detailsDelete = StoreRequisitionDetails::where('store_requisition_id',$id)->delete();
        if($requisition && $detailsDelete){
            return response()->json(['success'=>true]);
        }else{
            return response()->json(['success'=>false]);
        }
    }

    public function getRequisition(Request $request){
        $returnData = '';
        $style = StoreBooking::with('store_booking_details','store_inventory')->where('store_order_id',$request->style_id)->first();
        $store_inventory_id = 0;
        if($style->store_inventory){
            $store_inventory_id = $style->store_inventory->id;
        }
//        dd($style);
        if($style && $style->store_booking_details) {
            foreach ($style->store_booking_details as $details) {
//                dd($details);

                $qoh =$details->store_inventory_details->sum('received_qty') -$details->store_requisition_details->sum('issued');
                $returnData .= "<tr>
                <td>
                <input type='text' name='item_name[]'  value='$details->item' class='form-control' >
                <input type='hidden' name='store_inventory_id'  value='$store_inventory_id' class='form-control' >
                <input type='hidden' name='store_booking_details_id[]'  value='$details->id' class='form-control' >
                </td>
                <td><input type='text' name='consumption[]' class='form-control'></td>
                <td><input type='text' name='ord_qty_details[]'  value='$details->order_qty' class='form-control' ></td>
                <td><input type='text' name='qoh[]'  value='$qoh' class='form-control'  readonly ></td>
                <td><input type='text' name='issued[]' class='form-control' ></td>
                <td><input type='text' name='roll[]' value='$details->fab_roll' class='form-control'></td>
                <td><input type='text' name='remarks_details[]' class='form-control'></td>
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
}
