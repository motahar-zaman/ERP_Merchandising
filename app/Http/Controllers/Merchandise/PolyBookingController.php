<?php
//Poly Booking Controller By Nishat Chowdhury

namespace App\Http\Controllers\Merchandise;

use App\Merchandise\BudgetSheet;
use App\Merchandise\PolyBooking;
use App\PolyBookingDetails;
use App\Repositories\MerchandiseRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class PolyBookingController extends Controller
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
        return view('merchandising.booking.poly.add-poly',compact('budget_sheet_style','repository'));
    }

    public function store(Request $request)
    {
//        dd($request->all());
        $poly_booking = new PolyBooking();
        $poly_booking->unit_id = $request->unit_id;
        $poly_booking->to = $request->to;
        $poly_booking->attn = $request->attn;
        $poly_booking->sub = $request->sub;
        $poly_booking->date = $request->date;
        $poly_booking->req_del_date = $request->req_del_date;
        $poly_booking->budget_sheet_id = $request->budget_sheet_id;
        $poly_booking->save() ;

        $this->poly_booking_details($request->all(),$poly_booking->id);

        return redirect('report/view-poly-booking')->with('success','Added successfully');

    }

    public function poly_booking_details($request,$query){



        $keys = preg_grep('/^gmnts_qty[0-9]/',array_keys($request));
        foreach($keys as $key){
            preg_match('!\d+!',$key,$number);
            foreach($number as $num){
                $data = [
                    'poly_bookings_id' => $query,
                    'style' => $request['style'.$num],
                    'gmts_size' => $request['gmts_size'.$num],
                    'ord_type' => $request['ord_type'.$num],
                    'length' => $request['length'.$num],
                    'width' => $request['width'.$num],
                    'adhesive' => $request['adhesive'.$num],
                    'hang_cut' => $request['hang_cut'.$num],
                    'air_hole' => $request['air_hole'.$num],
                    'type_of_poly' => $request['type_of_poly'.$num],
                    'gmnts_qty' => $request['gmnts_qty'.$num],
                    'pcs_per_poly' => $request['pcs_per_poly'.$num],
                    'req_qty' => $request['req_qty'.$num],
                    'percentage' => $request['percentage'.$num],
                    'book_qty' => $request['book_qty'.$num],
                    'remarks' => $request['remarks'.$num],
                ];
                PolyBookingDetails::query()->create($data);
            }
        }
    }

    public function view()
    {
        $poly_bookings = PolyBooking::all();
        $budget_sheet_styles=BudgetSheet::pluck('style','id');
        return view('merchandising.booking.poly.view-all-poly-bookings',compact('poly_bookings','budget_sheet_styles'));
    }

    public function edit($id)
    {
        $budget_sheet_style=BudgetSheet::pluck('style','id');
        $poly = PolyBooking::find($id);
//        dd($poly->poly_booking_details);
        return view('merchandising.booking.poly.edit-poly',compact('poly','budget_sheet_style'));
    }

    public function update(Request $request, $id)
    {
        $list = PolyBooking::findOrFail($id);
        $input= $request->all();
        $list->fill($input)->save();
        $poly_details =  PolyBookingDetails::where('poly_bookings_id',$id)->get();
        foreach ($poly_details as $poly_detail){
            $poly_detail->delete();
        }
        $this->poly_booking_details($request->all(),$id);
        return redirect('report/view-poly-booking')->with('success','Poly Booking Has Been Updated Successfully');
    }
    public function details($id)
    {
        $poly_bookings = PolyBooking::query()->findOrFail($id);
        $poly_booking_details = PolyBookingDetails::query()->where('poly_bookings_id',$id)->get();
        return view('merchandising.report.poly-report',compact('poly_bookings','poly_booking_details'));
    }

    public function destroy($id)
    {
        $poly_bookings = PolyBooking::query()->findOrFail($id);
        $poly_bookings->delete();
        return redirect()->back()->with('success','Deleted Successfully');
    }
}
