<?php

//Thread Booking Controller By Nishat

namespace App\Http\Controllers\Merchandise;

use App\Merchandise\BudgetSheet;
use App\Merchandise\ThreadBooking;
use App\Merchandise\ThreadBookingDetails;
use App\Repositories\MerchandiseRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ThreadBookingController extends Controller
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
        return view('merchandising.booking.thread.add-thread',compact('budget_sheet_style','repository'));
    }

    public function store(Request $request)
    {
//        dd($request->all());
        $thread_booking = new ThreadBooking();
        $thread_booking->unit_id = $request->unit_id;
        $thread_booking->to = $request->to;
        $thread_booking->attn = $request->attn;
        $thread_booking->sub = $request->sub;
        $thread_booking->style_no = $request->style_no;
        $thread_booking->book_date = $request->book_date;
        $thread_booking->budget_sheet_id = $request->budget_sheet_id;
        $thread_booking->save() ;

        $this->thread_booking_details($request->all(),$thread_booking->id);
        return redirect()->back()->with('success','Added successfully');
    }

    public function thread_booking_details($request,$query){
        $keys = preg_grep('/^gmnts_qty[0-9]/',array_keys($request));
        foreach($keys as $key){
            preg_match('!\d+!',$key,$number);
            foreach($number as $num){
                $data = [
                    'thread_booking_id' => $query,
                    'color' => $request['color'.$num],
                    'thread_code' => $request['thread_code'.$num],
                    'shade_no' => $request['shade_no'.$num],
                    'count' => $request['count'.$num],
                    'process' => $request['process'.$num],
                    'gmnts_qty' => $request['gmnts_qty'.$num],
                    'consumption' => $request['consumption'.$num],
                    'total_meter' => $request['total_meter'.$num],
                    'cons_meter' => $request['cons_meter'.$num],
                    'total_cons' => $request['total_cons'.$num],
                    'percentage' => $request['percentage'.$num],
                    'booking' => $request['booking'.$num],
                ];
                ThreadBookingDetails::query()->create($data);
            }
        }
    }

    public function view()
    {
        $thread_bookings = ThreadBooking::all();
        $budget_sheet_styles=BudgetSheet::pluck('style','id');
        return view('merchandising.booking.thread.view-all-thread-bookings',compact('thread_bookings','budget_sheet_styles'));
    }

    public function edit($id)
    {
        $budget_sheet_style=BudgetSheet::pluck('style','id');
        $thread = ThreadBooking::find($id);
        return view('merchandising.booking.thread.edit-thread',compact('thread','budget_sheet_style'));
    }

    public function update(Request $request, $id)
    {
        $list = ThreadBooking::findOrFail($id);
        $input= $request->all();
        $list->fill($input)->save();
        $thread_details =  ThreadBookingDetails::where('thread_booking_id',$id)->get();
        foreach ($thread_details as $thread_detail){
            $thread_detail->delete();
        }
        $this->thread_booking_details($request->all(),$id);
        return redirect('report/view-thread-booking')->with('success','Thread Booking Has Been Updated Successfully');
    }

    public function destroy($id)
    {
        $thread_bookings = ThreadBooking::query()->findOrFail($id);
        $thread_bookings->delete();
        return redirect()->back()->with('success','Deleted Successfully');
    }

    public function details($id)
    {
        $thread_bookings = ThreadBooking::find($id);
        $thread_booking_details = ThreadBookingDetails::query()->where('thread_booking_id',$id)->get();
        return view('merchandising.report.thread-report',compact('thread_booking_details','thread_bookings'));
    }
}
