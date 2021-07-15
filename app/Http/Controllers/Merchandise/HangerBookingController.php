<?php
//Hanger Booking Controller By Nishat

namespace App\Http\Controllers\Merchandise;
use App\Merchandise\BudgetSheet;
use App\Merchandise\HangerBooking;
use App\Merchandise\HangerBookingDetails;
use App\Repositories\MerchandiseRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//git
class HangerBookingController extends Controller
{
    private $repository;

    public function __construct(MerchandiseRepository $repository){
        $this->middleware('auth');
        $this->repository = $repository;
    }

    public function index()
    {
        $repository = $this->repository;
        $budget_sheet_style = BudgetSheet::pluck('style','id');
        return view('merchandising.booking.hanger.add-hanger',compact('budget_sheet_style','repository'));
    }


    public function store(Request $request)
    {
//        dd($request->all());
        $hanger_booking = new HangerBooking();
        $hanger_booking->unit_id = $request->unit_id;
        $hanger_booking->to = $request->to;
        $hanger_booking->attn = $request->attn;
        $hanger_booking->sub = $request->sub;
        $hanger_booking->date = $request->date;
        $hanger_booking->budget_sheet_id = $request->budget_sheet_id;
        $hanger_booking->save() ;
        $this->hanger_booking_details($request->all(),$hanger_booking->id);
        return redirect('report/view-hanger-booking')->with('success','Added successfully');
    }

    public function hanger_booking_details($request,$query){
        $keys = preg_grep('/^gmnts_qty[0-9]/',array_keys($request));
        foreach($keys as $key){
            preg_match('!\d+!',$key,$number);
            foreach($number as $num){
                $data = [
                    'hanger_booking_id' => $query,
                    'buyer' => $request['buyer'.$num],
                    'style' => $request['style'.$num],
                    'gmnts_size' => $request['gmnts_size'.$num],
                    'hanger_item' => $request['hanger_item'.$num],
                    'item_code' => $request['item_code'.$num],
                    'quality' => $request['quality'.$num],
                    'gmnts_qty' => $request['gmnts_qty'.$num],
                    'percentage' => $request['percentage'.$num],
                    'book_qty' => $request['book_qty'.$num],
                    'remarks' => $request['remarks'.$num],
                ];
                HangerBookingDetails::query()->create($data);
            }
        }
    }

    public function view()
    {
        $hanger_bookings = HangerBooking::all();
        $budget_sheet_styles=BudgetSheet::pluck('style','id');
        return view('merchandising.booking.hanger.view-all-hanger-bookings',compact('hanger_bookings','budget_sheet_styles'));
    }

    public function edit($id)
    {
        $budget_sheet_style=BudgetSheet::pluck('style','id');
        $hanger = HangerBooking::find($id);
        return view('merchandising.booking.hanger.edit-hanger',compact('hanger','budget_sheet_style'));
    }

    public function update(Request $request, $id)
    {
        $list = HangerBooking::findOrFail($id);
        $input= $request->all();
        $list->fill($input)->save();
        $hanger_details =  HangerBookingDetails::where('hanger_booking_id',$id)->get();
        foreach ($hanger_details as $hanger_detail){
            $hanger_detail->delete();
        }
        $this->hanger_booking_details($request->all(),$id);
        return redirect('report/view-hanger-booking')->with('success','Hanger Booking Has Been Updated Successfully');
    }

    public function destroy($id)
    {
        $hanger_bookings = HangerBooking::query()->findOrFail($id);
        $hanger_bookings->delete();
        return redirect()->back()->with('success','Deleted Successfully');
    }

    public function details($id)
    {
        $hanger_bookings = HangerBooking::find($id);
        $hanger_booking_details = HangerBookingDetails::query()->where('hanger_booking_id',$id)->get();
        return view('merchandising.report.hanger-report',compact('hanger_booking_details','hanger_bookings'));
    }
}
