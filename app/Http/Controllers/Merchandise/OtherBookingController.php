<?php
// Other Booking Controller By Nishat

namespace App\Http\Controllers\Merchandise;

use App\Merchandise\BudgetSheet;
use App\Merchandise\OtherBookingDetails;
use App\Merchandise\OtherBooking;
use App\Repositories\MerchandiseRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OtherBookingController extends Controller
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
        return view('merchandising.booking.other.add-other',compact('budget_sheet_style','repository'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $other_booking = new OtherBooking();
        $other_booking->unit_id = $request->unit_id;
        $other_booking->to = $request->to;
        $other_booking->attn = $request->attn;
        $other_booking->sub = $request->sub;
        $other_booking->date = $request->date;
        $other_booking->budget_sheet_id = $request->budget_sheet_id;
        $other_booking->item = $request->item;
        $other_booking->other_desc = $request->other_desc;
        $other_booking->save();
        $this->other_booking_details($request->all(),$other_booking->id);
        return redirect()->back()->with('success','Added successfully');
    }

    public function other_booking_details($request,$query){

        $keys = preg_grep('/^gmnts_qty[0-9]/',array_keys($request));
        foreach($keys as $key){
            preg_match('!\d+!',$key,$number);
            foreach($number as $num){
                $data = [
                    'other_booking_id' => $query,
                    'item' => $request['item'.$num],
                    'item_desc' => $request['description'.$num],
                    // 'size' => $request['size'.$num],
                    // 'color' => $request['color_other'.$num],
                    // 'color_code' => $request['color_code'.$num],
                    // 'length' => $request['length'.$num],
                    // 'other_color' => $request['other_color'.$num],
                    // 'other_details' => $request['other_details'.$num],
                    'gmnts_qty' => $request['gmnts_qty'.$num],
                    'percentage' => $request['percentage'.$num],
                    'book_qty' => $request['book_qty'.$num],
                    'remarks' => $request['remarks'.$num],
                ];
//                dd($data);
                OtherBookingDetails::query()->create($data);
            }
        }
    }

    public function view()
    {
        $other_bookings = OtherBooking::all();
        $budget_sheet_styles=BudgetSheet::all()->pluck('style','id');
        return view('merchandising.booking.other.view-all-other-bookings',compact('other_bookings','budget_sheet_styles'));
    }

    public function edit($id)
    {
        $budget_sheet_style=BudgetSheet::pluck('style','id');
        $other = OtherBooking::find($id);
        return view('merchandising.booking.other.edit-other',compact('other','budget_sheet_style'));
    }

    public function update(Request $request, $id)
    {
        // return $request->all();
        $list = OtherBooking::findOrFail($id);
        $input= $request->all();
        $list->fill($input)->save();
        $other_details =  OtherBookingDetails::where('other_booking_id',$id)->get();

        foreach ($other_details as $other_detail){
            $other_detail->delete();
        }
        $this->other_booking_details($request->all(),$id);
        return redirect('report/view-other-booking')->with('success','Other Booking Has Been Updated Successfully');
    }

    public function destroy($id)
    {
        $other_bookings = OtherBooking::query()->findOrFail($id);
        $other_bookings->delete();
        return redirect()->back()->with('success','Other Booking Has Been Updated Successfully');
    }

    public function details($id)
    {
        $other_bookings = OtherBooking::query()->find($id);
        $other_booking_details = OtherBookingDetails::query()->where('other_booking_id',$id)->get();
        return view('merchandising.report.other-report',compact('other_booking_details','other_bookings'));
    }
}
