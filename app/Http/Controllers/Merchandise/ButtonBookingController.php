<?php
// Button Booking Controller By Nishat

namespace App\Http\Controllers\Merchandise;

use App\Merchandise\BudgetSheet;
use App\Merchandise\ButtonBookingDetails;
// use App\Merchandise\ButtonColor;
use App\Merchandise\ButtonBooking;
use App\Repositories\MerchandiseRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ButtonBookingController extends Controller
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
        // $button_colors = ButtonColor::pluck('name','id');
        return view('merchandising.booking.button.add-button',compact('budget_sheet_style','repository'));
    }

    public function store(Request $request)
    {
//        dd($request->all());
        $button_booking = new ButtonBooking();
        $button_booking->unit_id = $request->unit_id;
        $button_booking->to = $request->to;
        $button_booking->attn = $request->attn;
        $button_booking->sub = $request->sub;
        $button_booking->date = $request->date;
        $button_booking->budget_sheet_id = $request->budget_sheet_id;
        $button_booking->button_size = $request->button_size;
        $button_booking->button_desc = $request->button_desc;
        $button_booking->save();
        $this->button_booking_details($request->all(),$button_booking->id);
        return redirect()->back()->with('success','Added successfully');
    }

    public function button_booking_details($request,$query){

        $keys = preg_grep('/^gmnts_qty[0-9]/',array_keys($request));
        foreach($keys as $key){
            preg_match('!\d+!',$key,$number);
            foreach($number as $num){
                $data = [
                    'button_booking_id' => $query,
                    'size' => $request['size'.$num],
                    'color' => $request['color_button'.$num],
                    'color_code' => $request['color_code'.$num],
                    'length' => $request['length'.$num],
                    'button_color' => $request['button_color'.$num],
                    // 'button_details' => $request['button_details'.$num],
                    'gmnts_qty' => $request['gmnts_qty'.$num],
                    'percentage' => $request['percentage'.$num],
                    'book_qty' => $request['book_qty'.$num],
                    'remarks' => $request['remarks'.$num],
                ];
//                dd($data);
                ButtonBookingDetails::query()->create($data);
            }
        }
    }

    public function view()
    {
        $button_bookings = ButtonBooking::all();
        $budget_sheet_styles=BudgetSheet::all()->pluck('style','id');
        return view('merchandising.booking.button.view-all-button-bookings',compact('button_bookings','budget_sheet_styles'));
    }

    public function edit($id)
    {
        $budget_sheet_style=BudgetSheet::pluck('style','id');
        $button = ButtonBooking::find($id);
        return view('merchandising.booking.button.edit-button',compact('button','budget_sheet_style'));
    }

    public function update(Request $request, $id)
    {
        // return $request->all();
        $list = ButtonBooking::findOrFail($id);
        $input= $request->all();
        $list->fill($input)->save();
        $button_details =  ButtonBookingDetails::where('button_booking_id',$id)->get();

        foreach ($button_details as $button_detail){
            $button_detail->delete();
        }
        $this->button_booking_details($request->all(),$id);
        return redirect('report/view-button-booking')->with('success','Button Booking Has Been Updated Successfully');
    }

    public function destroy($id)
    {
        $button_bookings = ButtonBooking::query()->findOrFail($id);
        $button_bookings->delete();
        return redirect()->back()->with('success','Button Booking Has Been Updated Successfully');
    }

    public function details($id)
    {
        $button_bookings = ButtonBooking::query()->find($id);
        $button_booking_details = ButtonBookingDetails::query()->where('button_booking_id',$id)->get();
        return view('merchandising.report.button-report',compact('button_booking_details','button_bookings'));
    }
}
