<?php
//Label Booking Controller By Nishat
namespace App\Http\Controllers\Merchandise;

use App\Merchandise\BudgetSheet;
use App\Merchandise\LabelBooking;
use App\Merchandise\LabelBookingDetails;
use App\Repositories\MerchandiseRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// git
class LabelBookingController extends Controller
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
        return view('merchandising.booking.label.add-label',compact('budget_sheet_style','repository'));
    }

    public function store(Request $request)
    {
        $label_booking = new LabelBooking();
        $label_booking->unit_id = $request->unit_id;
        $label_booking->to = $request->to;
        $label_booking->attn = $request->attn;
        $label_booking->sub = $request->sub;
        $label_booking->date = $request->date;
        $label_booking->budget_sheet_id = $request->budget_sheet_id;
        $label_booking->label_style = $request->label_style;
        $label_booking->save() ;
        $this->label_booking_details($request->all(),$label_booking->id);
        return redirect()->back()->with('success','Added successfully');
    }

    public function label_booking_details($request,$query){
        $keys = preg_grep('/^gmnts_qty[0-9]/',array_keys($request));
        foreach($keys as $key){
            preg_match('!\d+!',$key,$number);
            foreach($number as $num){
                $data = [
                    'label_booking_id' => $query,
                    'desc' => $request['desc'.$num],
                    'care_instruction' => $request['care_instruction'.$num],
                    'color' => $request['color'.$num],
                    'upc' => $request['upc'.$num],
                    'retail_price' => $request['retail_price'.$num],
                    'size' => $request['size'.$num],
                    'gmnts_qty' => $request['gmnts_qty'.$num],
                    'percentage' => $request['percentage'.$num],
                    'book_qty' => $request['book_qty'.$num],
                    'remarks' => $request['remarks'.$num],
                ];
                LabelBookingDetails::query()->create($data);
            }
        }
    }

    public function view()
    {
        $label_bookings = LabelBooking::all();
        $budget_sheet_styles=BudgetSheet::pluck('style','id');
        return view('merchandising.booking.label.view-all-label-bookings',compact('label_bookings','budget_sheet_styles'));
    }

    public function edit($id)
    {
        $budget_sheet_style=BudgetSheet::pluck('style','id');
        $label = LabelBooking::find($id);
        return view('merchandising.booking.label.edit-label',compact('label','budget_sheet_style'));
    }

    public function update(Request $request, $id)
    {
        $list = LabelBooking::findOrFail($id);
        $input= $request->all();
        $list->fill($input)->save();
        $label_details =  LabelBookingDetails::where('label_booking_id',$id)->get();
        foreach ($label_details as $label_detail){
            $label_detail->delete();
        }
        $this->label_booking_details($request->all(),$id);
        return redirect('report/view-label-booking')->with('success','Label Booking Has Been Updated Successfully');
    }

    public function destroy($id)
    {
        $label_bookings = LabelBooking::query()->findOrFail($id);
        $label_bookings->delete();
        return redirect()->back()->with('success','Deleted Successfully');
    }

    public function details($id)
    {
        $label_bookings = LabelBooking::find($id);
        $label_booking_details = LabelBookingDetails::query()->where('label_booking_id',$id)->get();
        return view('merchandising.report.label-report',compact('label_bookings','label_booking_details'));
    }


}
