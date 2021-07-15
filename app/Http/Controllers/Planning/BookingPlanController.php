<?php

namespace App\Http\Controllers\Planning;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\MerchandiseRepository;

use App\Models\Planning\Booking\BookingPlan;

use App\Merchandise\CompanyUnit;
use App\CostBreakdown;
use App\Buyer;

class BookingPlanController extends Controller
{
    private $repository;

    public function __construct(MerchandiseRepository $repository){
        $this->middleware('auth');
        $this->repository = $repository;
    }

    public function index()
    {
        $booking_plan = BookingPlan::orderBy('id','desc')->get();
        return view('planning.booking.report',compact('booking_plan'));
    }

    public function viewReport($id)
    {
        $booking_plan = BookingPlan::find($id);
        return view('planning.booking.view_report',compact('booking_plan'));
    }

    public function selectBooking($id)
    {
        $booking_plan = BookingPlan::find($id);
        return response()->json([
            'booking_plan' => $booking_plan,
            'success' => true,
        ]);
    }

    public function create()
    {
        $booking_plan = BookingPlan::orderBy('id','desc')->get(['id']);
        $buyers = Buyer::pluck('name','id');
        $styles = CostBreakdown::pluck('style','id');
        return view('planning.booking.create',compact('styles','buyers','booking_plan'));
    }

    public function edit($data)
    {
        $buyers = Buyer::get(['name','id']);
        $styles = CostBreakdown::get(['style','id']);
        return view('planning.booking.edit',compact('data','buyers','styles'));
    }

    public function store(Request $request)
    {
         if(!empty($request->lc_factory)){
            for($i = 0; $i < count($request->lc_factory) ; $i++){
                $booking_plan = new BookingPlan();
                $booking_plan->lc_factory = $request->lc_factory[$i];
                $booking_plan->buyer_id = $request->buyer_id[$i];
                $booking_plan->style_id = $request->style_id[$i];
                $booking_plan->item = $request->item[$i];
                $booking_plan->merchandiser = $request->merchandiser[$i];
                $booking_plan->merchandiser_head = $request->merchandiser_head[$i];
                $booking_plan->sketch_or_sample = $request->sketch_or_sample[$i];
                $booking_plan->smv = $request->smv[$i];
                $booking_plan->quantity = $request->quantity[$i];
                $booking_plan->order_season = $request->order_season[$i];
                $booking_plan->input_date = $request->input_date[$i];
                $booking_plan->ex_factory = $request->ex_factory[$i];
                $booking_plan->wash = $request->wash[$i];
                $booking_plan->emblishment = $request->emblishment[$i];
                $booking_plan->remarks = $request->remarks[$i];
                $booking_plan->save();

            }
            session()->flash('success','Booking Plan Successfullty Saved !');
        }

        return redirect('bookingPlan/report');
    }

    public function editStore($id)
    {
        $buyers = Buyer::get(['name','id']);
        $styles = CostBreakdown::get(['style','id']);
        $booking_plan = BookingPlan::find($id);
        return view('planning.booking.edit_store',compact('booking_plan','styles','buyers'));
    }

    public function update(Request $request)
    {
        $booking_plan = BookingPlan::find($request->order_no)->update($request->all());
        return redirect('bookingPlan/report');
    }

    public function delete($id)
    {
        $booking_plan = BookingPlan::find($id)->delete();
        if($booking_plan){
            return response()->json(['success'=>true]);
        }
    }

   

}
