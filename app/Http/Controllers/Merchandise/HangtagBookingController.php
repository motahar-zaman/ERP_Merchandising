<?php
//Hangtag Booking Controller By Nishat

namespace App\Http\Controllers\Merchandise;

use App\Merchandise\BudgetSheet;
use App\Merchandise\HangerBooking;
use App\Merchandise\HangerBookingDetails;
use App\Merchandise\HangtagBooking;
use App\Merchandise\HangtagBookingDetails;
use App\Repositories\MerchandiseRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//git
class HangtagBookingController extends Controller
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
        return view('merchandising.booking.hangtag.add-hangtag',compact('budget_sheet_style','repository'));
    }

    public function store(Request $request)
    {
        $hangtag_booking = new HangtagBooking();
        $hangtag_booking->unit_id = $request->unit_id;
        $hangtag_booking->to = $request->to;
        $hangtag_booking->attn = $request->attn;
        $hangtag_booking->sub = $request->sub;
        $hangtag_booking->date = $request->date;
        $hangtag_booking->budget_sheet_id = $request->budget_sheet_id;
        $hangtag_booking->style = $request->style;
        $hangtag_booking->save() ;

        $this->hangtag_booking_details($request->all(),$hangtag_booking->id);
        return redirect('report/view-hangtag-booking')->with('success','Added successfully');
    }

    public function hangtag_booking_details($request,$query){
        $keys = preg_grep('/^gmnts_qty[0-9]/',array_keys($request));
        foreach($keys as $key){
            preg_match('!\d+!',$key,$number);
            foreach($number as $num){
                $data = [
                    'hangtag_booking_id' => $query,
                    'desc' => $request['desc'.$num],
                    'color' => $request['color'.$num],
                    'upc' => $request['upc'.$num],
                    'retail_price' => $request['retail_price'.$num],
                    'size' => $request['size'.$num],
                    'gmnts_qty' => $request['gmnts_qty'.$num],
                    'percentage' => $request['percentage'.$num],
                    'book_qty' => $request['book_qty'.$num],
                    'remarks' => $request['remarks'.$num],
                ];
                HangtagBookingDetails::query()->create($data);
            }
        }
    }

    public function view()
    {
        $hangtag_bookings = HangtagBooking::all();
        $budget_sheet_styles=BudgetSheet::pluck('style','id');
        return view('merchandising.booking.hangtag.view-all-hangtag-bookings',compact('hangtag_bookings','budget_sheet_styles'));
    }

    public function edit($id)
    {
        $budget_sheet_style=BudgetSheet::pluck('style','id');
        $hangtag = HangtagBooking::find($id);
        return view('merchandising.booking.hangtag.edit-hangtag',compact('hangtag','budget_sheet_style'));
    }

    public function update(Request $request, $id)
    {
        $list = HangtagBooking::findOrFail($id);
        $input= $request->all();
        $list->fill($input)->save();
        $hangtag_details =  HangtagBookingDetails::where('hangtag_booking_id',$id)->get();
        foreach ($hangtag_details as $hangtag_detail){
            $hangtag_detail->delete();
        }
        $this->hangtag_booking_details($request->all(),$id);
        return redirect('report/view-hangtag-booking')->with('success','Hangtag Booking Has Been Updated Successfully');
    }

    public function destroy($id)
    {
        $hangtag_bookings = HangtagBooking::query()->findOrFail($id);
        $hangtag_bookings->delete();
        return redirect()->back()->with('success','Deleted Successfully');
    }

    public function details($id)
    {
        $hangtag_bookings = HangtagBooking::find($id);
        $hangtag_booking_details = HangtagBookingDetails::query()->where('hangtag_booking_id',$id)->get();
        return view('merchandising.report.hangtag-report',compact('hangtag_bookings','hangtag_booking_details'));
    }
}
