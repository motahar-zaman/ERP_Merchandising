<?php
// Zipper Booking Controller By Nishat

namespace App\Http\Controllers\Merchandise;

use App\Merchandise\BudgetSheet;
use App\Merchandise\ZipperBookingDetails;
use App\Merchandise\ZipperColor;
use App\Merchandise\ZipperBooking;
use App\Repositories\MerchandiseRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ZipperBookingController extends Controller
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
        $zipper_colors = ZipperColor::pluck('name','id');
        return view('merchandising.booking.zipper.add-zipper',compact('zipper_colors','budget_sheet_style','repository'));
    }

    public function store(Request $request)
    {
//        dd($request->all());
        $zipper_booking = new ZipperBooking();
        $zipper_booking->unit_id = $request->unit_id;
        $zipper_booking->to = $request->to;
        $zipper_booking->attn = $request->attn;
        $zipper_booking->sub = $request->sub;
        $zipper_booking->date = $request->date;
        $zipper_booking->budget_sheet_id = $request->budget_sheet_id;
        $zipper_booking->style_no = $request->style_no;
        $zipper_booking->zipp_desc = $request->zipp_desc;
        $zipper_booking->save();
        $this->zipper_booking_details($request->all(),$zipper_booking->id);
        return redirect()->back()->with('success','Added successfully');
    }

    public function zipper_booking_details($request,$query){

        $keys = preg_grep('/^gmnts_qty[0-9]/',array_keys($request));
        foreach($keys as $key){
            preg_match('!\d+!',$key,$number);
            foreach($number as $num){
                $data = [
                    'zipper_booking_id' => $query,
                    'size' => $request['size'.$num],
                    'tape_color' => $request['tape_color'.$num],
                    'color_code' => $request['color_code'.$num],
                    'length' => $request['length'.$num],
                    'zipper_color' => $request['zipper_color'.$num],
                    'zipper_details' => $request['zipper_details'.$num],
                    'gmnts_qty' => $request['gmnts_qty'.$num],
                    'percentage' => $request['percentage'.$num],
                    'book_qty' => $request['book_qty'.$num],
                    'remarks' => $request['remarks'.$num],
                ];
//                dd($data);
                ZipperBookingDetails::query()->create($data);
            }
        }
    }

    public function view()
    {
        $zipper_bookings = ZipperBooking::all();
        $budget_sheet_styles=BudgetSheet::all()->pluck('style','id');
        return view('merchandising.booking.zipper.view-all-zipper-bookings',compact('zipper_bookings','budget_sheet_styles'));
    }

    public function edit($id)
    {
        $budget_sheet_style=BudgetSheet::pluck('style','id');
        $zipper = ZipperBooking::find($id);
        return view('merchandising.booking.zipper.edit-zipper',compact('zipper','budget_sheet_style'));
    }

    public function update(Request $request, $id)
    {
        $list = ZipperBooking::findOrFail($id);
        $input= $request->all();
        $list->fill($input)->save();
        $zipper_details =  ZipperBookingDetails::where('zipper_booking_id',$id)->get();
        foreach ($zipper_details as $zipper_detail){
            $zipper_detail->delete();
        }
        $this->zipper_booking_details($request->all(),$id);
        return redirect('report/view-zipper-booking')->with('success','Zipper Booking Has Been Updated Successfully');
    }

    public function destroy($id)
    {
        $zipper_bookings = ZipperBooking::query()->findOrFail($id);
        $zipper_bookings->delete();
        return redirect()->back()->with('success','Zipper Booking Has Been Updated Successfully');
    }

    public function details($id)
    {
        $zipper_bookings = ZipperBooking::query()->find($id);
        $zipper_booking_details = ZipperBookingDetails::query()->where('zipper_booking_id',$id)->get();
        return view('merchandising.report.zipper-report',compact('zipper_booking_details','zipper_bookings'));
    }
}
