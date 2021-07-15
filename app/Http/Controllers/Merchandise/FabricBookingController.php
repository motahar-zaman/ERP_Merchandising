<?php

namespace App\Http\Controllers\Merchandise;
use App\Merchandise\BudgetSheet;
use App\CostBreakdown;
use App\Fabric;
use App\Merchandise\FabricBookingDetails;
use App\Merchandise\FabricBooking;
use App\Merchandise\ZipperColor;
use App\Repositories\MerchandiseRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FabricBookingController extends Controller
{

    private $repository;

    public function __construct(MerchandiseRepository $repository){
        $this->middleware('auth');
        $this->repository = $repository;
    }

    public function index()
    {
        $repository = $this->repository;
        $budget_sheet_style=BudgetSheet::all()->pluck('style','id');
        $color =ZipperColor::all()->pluck('name','id');
        return view('merchandising.booking.fabric.add-fabric',compact('budget_sheet_style','color','repository'));
    }

    public function view()
    {
        $fabric_bookings = FabricBooking::all();
        $fabric_booking_details = FabricBookingDetails::all();
        $budget_sheet_styles=BudgetSheet::all()->pluck('style','id');
        return view('merchandising.booking.fabric.view-all-fabrics-bookings',compact('fabric_bookings','budget_sheet_styles','fabric_booking_details'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'budget_sheet_id' => 'required'
        ]);
        $fabric_booking = new FabricBooking();
        $fabric_booking->unit_id = $request->unit_id;
        $fabric_booking->to = $request->to;
        $fabric_booking->attn = $request->attn;
        $fabric_booking->sub = $request->sub;
        $fabric_booking->date = $request->date;
        $fabric_booking->budget_sheet_id = $request->budget_sheet_id;
        $fabric_booking->supplier_name = $request->supplier_name;
        $fabric_booking->save() ;

        $this->fabric_booking_details($request->all(),$fabric_booking->id);

        return redirect('report/view-fabrics-booking')->with('success','Added successfully');

    }

    public function fabric_booking_details($request,$query){
        $keys = preg_grep('/^gmnts_qty[0-9]/',array_keys($request));
        foreach($keys as $key){
            preg_match('!\d+!',$key,$number);
            foreach($number as $num){
                $data = [
                    'fabric_bookings_id' => $query,
                    'fabric_name' => $request['fabric_name'.$num],
                    'color' => $request['color'.$num],
                    'gmnts_qty' => $request['gmnts_qty'.$num],
                    'consumption' => $request['consumption'.$num],
                    'req_qty' => $request['req_qty'.$num],
                    'percentage' => $request['percentage'.$num],
                    'book_qty' => $request['book_qty'.$num],
                    'remarks' => $request['remarks'.$num],
                ];
                FabricBookingDetails::query()->create($data);
            }
        }
    }

    public function edit($id)
    {
        $budget_sheet_styles=BudgetSheet::all()->pluck('style','id');
        $fabrics = FabricBooking::find($id);
        return view('merchandising.booking.fabric.edit-fabric',compact('fabrics','budget_sheet_styles'));
    }

    public function update(Request $request, $id)
    {

        $list = FabricBooking::findOrFail($id);
        $input= $request->all();
        $list->fill($input)->save();
        $fabric_details =  FabricBookingDetails::where('fabric_bookings_id',$id)->get();
        foreach ($fabric_details as $fabric_detail){
            $fabric_detail->delete();
        }
        $this->fabric_booking_details($request->all(),$id);
        return redirect('report/view-fabrics-booking')->with('success','Fabric Booking Has Been Updated Successfully');

    }

    public function destroy($id)
    {
        $fabric_bookings = FabricBooking::query()->findOrFail($id);
        $fabric_bookings->delete();
        return redirect()->back()->with('success','Deleted Successfully');
    }

    public function details($id)
    {
        $fabric_bookings = FabricBooking::query()->find($id);
        $fabric_bookings_details = FabricBookingDetails::query()->where('fabric_bookings_id',$id)->get();
        return view('merchandising.report.fabric-report',compact('fabric_bookings_details','fabric_bookings'));
    }

}
