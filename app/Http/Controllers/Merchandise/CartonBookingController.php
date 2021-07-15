<?php

namespace App\Http\Controllers\Merchandise;

use App\Merchandise\BudgetSheet;
use App\CartonBooking;
use App\CartonBookingDetails;
use App\Repositories\MerchandiseRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartonBookingController extends Controller
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
        return view('merchandising.booking.carton.add-carton',compact('budget_sheet_style','repository'));
    }

    public function store(Request $request)
    {
        $carton_booking = new CartonBooking();
        $carton_booking->unit_id = $request->unit_id;
        $carton_booking->to = $request->to;
        $carton_booking->attn = $request->attn;
        $carton_booking->sub = $request->sub;
        $carton_booking->date = $request->date;
        $carton_booking->req_del_date = $request->req_del_date;
        $carton_booking->budget_sheet_id = $request->budget_sheet_id;
        $carton_booking->buyer_name = $request->buyer_name;
        $carton_booking->save() ;

        $this->carton_booking_details($request->all(),$carton_booking->id);

        return redirect('report/view-carton-booking')->with('success','Carton Booking Added successfully');
    }

    public function carton_booking_details($request,$query){



        $keys = preg_grep('/^gmnts_qty[0-9]/',array_keys($request));
        foreach($keys as $key){
            preg_match('!\d+!',$key,$number);
            foreach($number as $num){
                $data = [
                    'carton_bookings_id' => $query,
                    'style' => $request['style'.$num],
                    'gmts_size' => $request['gmts_size'.$num],
                    'ord_type' => $request['ord_type'.$num],
                    'length' => $request['length'.$num],
                    'width' => $request['width'.$num],
                    'height' => $request['height'.$num],
                    'type_of_carton' => $request['type_of_carton'.$num],
                    'gmnts_qty' => $request['gmnts_qty'.$num],
                    'pcs_per_carton' => $request['pcs_per_carton'.$num],
                    'req_qty' => $request['req_qty'.$num],
                    'percentage' => $request['percentage'.$num],
                    'book_qty' => $request['book_qty'.$num],
                    'remarks' => $request['remarks'.$num],
                ];
                CartonBookingDetails::query()->create($data);
            }
        }
    }

    public function view()
    {
        $carton_bookings = CartonBooking::all();
        $budget_sheet_styles=BudgetSheet::pluck('style','id');
        return view('merchandising.booking.carton.view-all-carton-bookings',compact('carton_bookings','budget_sheet_styles'));
    }

    public function edit($id)
    {
        $budget_sheet_style=BudgetSheet::pluck('style','id');
        $carton = CartonBooking::find($id);
//        dd($poly->poly_booking_details);
        return view('merchandising.booking.carton.edit-carton',compact('carton','budget_sheet_style'));
    }

    public function update(Request $request, $id)
    {
        $list = CartonBooking::findOrFail($id);
        $input= $request->all();
        $list->fill($input)->save();
        $carton_details =  CartonBookingDetails::where('carton_bookings_id',$id)->get();
        foreach ($carton_details as $carton_detail){
            $carton_detail->delete();
        }
        $this->carton_booking_details($request->all(),$id);
        return redirect('report/view-carton-booking')->with('success','Carton Booking Has Been Updated Successfully');
    }

    public function details($id)
    {
        $carton_bookings = CartonBooking::query()->findOrFail($id);
        $carton_booking_details = CartonBookingDetails::query()->where('carton_bookings_id',$id)->get();
        return view('merchandising.report.carton-report',compact('carton_bookings','carton_booking_details'));
    }

    public function destroy($id)
    {
        $carton_bookings = CartonBooking::query()->findOrFail($id);
        $carton_bookings->delete();
        return redirect()->back()->with('success','Deleted Successfully');
    }
}
