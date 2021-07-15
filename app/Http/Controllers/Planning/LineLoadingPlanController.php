<?php

namespace App\Http\Controllers\Planning;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\MerchandiseRepository;

use App\Models\Planning\Booking\BookingPlan;

use App\Models\Planning\LineLoading\Efficiency;
use App\Models\Planning\LineLoading\Holiday;
use App\Models\Planning\LineLoading\Item;
use App\Models\Planning\LineLoading\LineLoading;

use App\Merchandise\CompanyUnit;
use App\CostBreakdown;
use App\Buyer;

class LineLoadingPlanController extends Controller
{
    private $repository;

    public function __construct(MerchandiseRepository $repository){
        $this->middleware('auth');
        $this->repository = $repository;
    }

    public function index()
    {
        $line_loading_plan = LineLoading::orderBy('id','asc')->get();
        return view('planning.line_loading.report',compact('line_loading_plan'));
    }

    public function viewReport($id)
    {
        $booking_plan = BookingPlan::find($id);
        return view('planning.line_loading.view_report',compact('booking_plan'));
    }

    public function selectBooking($id)
    {
        $booking_plan = BookingPlan::find($id);
        return response()->json([
            'booking_plan' => $booking_plan,
            'success' => true,
        ]);
    }

    public function editEfficiency()
    {
        $efficiency = Efficiency::get();
        return view('planning.line_loading.edit_efficiency', compact('efficiency'));
    }
    public function editEfficiencyStore(Request $request)
    {
        $line_loading = session()->get('line_loading_session');

        $item = Item::find($line_loading['item_id']);

        $holidays = Holiday::where('date','>', $line_loading['date'])->get();
        $holiday_array = array();
        if(isset($holidays[0]->id)){
            foreach ($holidays as $key => $value) {
                array_push($holiday_array, $value->date);
            }
        }

        $day = array();
        $individual_efficiency = array();
        $day = array();
        $count_day = 0;
        $total = 0;
        $total_efficiency = 0;
        $remain = $line_loading['with_percent'];
        $constant_remain = $remain;
        foreach ($request->efficiency_edit as $value) {
            if($value <= $item->peak_efficiency){
                $last_efficiency = $value;
                if($remain > 0){
                    $count_day++;
                    $day[$count_day] = round(3033 * ($value/100));
                    $individual_efficiency[$count_day] = $value;
                    $total_efficiency += $value;
                    $total += round(3033 * ($value/100));
                    $remain =  $constant_remain - $total;
                }
            }else{
                $last_efficiency = $item->peak_efficiency;
            }
            
            
        }

        if($remain > 0){
            //$i = 0;
            while ($remain > 0) {
                $count_day++;
                $day[$count_day] = round(3033 * ($last_efficiency/100));
                $individual_efficiency[$count_day] = $last_efficiency;
                $total_efficiency += $last_efficiency;
                $total += round(3033 * ($last_efficiency/100));
                $remain =  $constant_remain - $total;

                // if($total >  $constant_remain){
                //     $i++;
                // }
            }
        }

        $line_loading['allot_qty'] = $total;
        $line_loading['avg_prod'] = round($total/$count_day);
        $line_loading['days_total'] = $count_day;
        $line_loading['eff_avg'] = round($total_efficiency / $count_day);

        $repeat = $line_loading['date'] ;
        $dates_array = array($repeat);
        for($i = 1; $i < $count_day; $i++){
            $repeat = date('Y-m-d',strtotime($repeat . "+1 days"));
            if(!in_array($repeat, $holiday_array)){
                array_push($dates_array, $repeat);
            }else{
                $i--;
            }
        }
        $line_loading['dates'] = $dates_array;


        $date_with_efficiency = array();
        $date_with_output = array();
        foreach ($dates_array as $key => $value) {
            $date_with_efficiency[$value] = $individual_efficiency[$key+1];
            $date_with_output[$value] = $day[$key+1];
        }
        $line_loading['date_with_efficiency'] = $date_with_efficiency;

        session()->put('line_loading_session', $line_loading);
        return view('planning.line_loading.showTable', compact('line_loading','day','individual_efficiency','date_with_efficiency','date_with_output'));

    }

    public function create()
    {
        $date_today = date('Y-m-d');
        $factories = CompanyUnit::pluck('name','id');
        $buyers = Buyer::pluck('name','id');
        $styles = CostBreakdown::where('style', '!=', null)->pluck('style','id');
        $items = Item::pluck('name','id');
        return view('planning.line_loading.create',compact('date_today','factories','styles','items','buyers'));
    }

    public function calculate($data){

        $item = Item::find(explode('&', $data)[5]);

        $holidays = Holiday::where('date','>', explode('&', $data)[9])->get();
        $holiday_array = array();
        if(isset($holidays[0]->id)){
            foreach ($holidays as $key => $value) {
                array_push($holiday_array, $value->date);
            }
        }

        $efficiency = Efficiency::orderBy('day','asc')->get();
        $day = array();
        $individual_efficiency = array();
        $day = array();
        $count_day = 0;
        $total = 0;
        $total_efficiency = 0;
        $remain = round(explode('&', $data)[6] + explode('&', $data)[6] * (2/100));
        $constant_remain = $remain;
        foreach ($efficiency as $key => $value) {
            if($value->efficiency <= $item->peak_efficiency){
                $last_efficiency = $value->efficiency;
                if($remain > 0){
                    $count_day++;
                    $day[$count_day] = round(3033 * ($value->efficiency/100));
                    $individual_efficiency[$count_day] = $value->efficiency;
                    $total_efficiency += $value->efficiency;
                    $total += round(3033 * ($value->efficiency/100));
                    $remain =  $constant_remain - $total;
                }
            }else{
                $last_efficiency = $item->peak_efficiency;
            }
            
            
        }

        if($remain > 0){
            //$i = 0;
            while ($remain > 0) {
                $count_day++;
                $day[$count_day] = round(3033 * ($last_efficiency/100));
                $individual_efficiency[$count_day] = $last_efficiency;
                $total_efficiency += $last_efficiency;
                $total += round(3033 * ($last_efficiency/100));
                $remain =  $constant_remain - $total;

                // if($total >  $constant_remain){
                //     $i++;
                // }
            }
        }


        $line_loading = Array();
        $line_loading['factory_id'] = explode('&', $data)[0];
        $line_loading['floor'] = explode('&', $data)[1];
        $line_loading['line_no'] = explode('&', $data)[2];
        $line_loading['buyer_id'] = explode('&', $data)[3];
        $line_loading['style_id'] = explode('&', $data)[4];
        $line_loading['item_id'] = explode('&', $data)[5];
        $line_loading['quantity'] = explode('&', $data)[6];
        $line_loading['with_percent'] = round(explode('&', $data)[6] + (explode('&', $data)[6]*2)/100);
        $line_loading['allot_qty'] = $total;
        $line_loading['mc_use'] = explode('&', $data)[7];
        $line_loading['manpower'] = round(explode('&', $data)[7] * 1.25);
        $line_loading['smv'] = explode('&', $data)[8];
        $line_loading['avg_prod'] = round($total/$count_day);
        $line_loading['days_total'] = $count_day;
        $line_loading['eff_avg'] = round($total_efficiency / $count_day);
        $line_loading['avl_min_1'] = round(explode('&', $data)[7] * 1.25 *600);
        $line_loading['avl_min_2'] = round(explode('&', $data)[7] * 1.25 *480);
        $line_loading['date'] = explode('&', $data)[9];

        $repeat = explode('&', $data)[9];
        $dates_array = array(explode('&', $data)[9]);
        for($i = 1; $i < $count_day; $i++){
            $repeat = date('Y-m-d',strtotime($repeat . "+1 days"));
            if(!in_array($repeat, $holiday_array)){
                array_push($dates_array, $repeat);
            }else{
                $i--;
            }
        }

        $line_loading['dates'] = $dates_array;
        $date_with_efficiency = array();
        $date_with_output = array();
        foreach ($dates_array as $key => $value) {
            $date_with_efficiency[$value] = $individual_efficiency[$key+1];
            $date_with_output[$value] = $day[$key+1];
        }
        $line_loading['date_with_efficiency'] = $date_with_efficiency;

        session()->put('line_loading_session', $line_loading);

        return view('planning.line_loading.showTable', compact('line_loading','day','individual_efficiency','date_with_efficiency','date_with_output'));
    }

   

    public function store(Request $request)
    {
        $line_loading = session()->get('line_loading_session');
        $new_line_loading = new LineLoading();

        $new_line_loading->factory_id = $line_loading['factory_id'];
        $new_line_loading->item_id = $line_loading['item_id'];
        $new_line_loading->buyer_id = $line_loading['buyer_id'];
        $new_line_loading->style_id = $line_loading['style_id'];
        $new_line_loading->floor = $line_loading['floor'];
        $new_line_loading->line_no = $line_loading['line_no'];
        $new_line_loading->quantity = $line_loading['quantity'];
        $new_line_loading->with_percent = $line_loading['with_percent'];
        $new_line_loading->allot_qty = $line_loading['allot_qty'];
        $new_line_loading->mc_use = $line_loading['mc_use'];
        $new_line_loading->manpower = $line_loading['manpower'];
        $new_line_loading->smv = $line_loading['smv'];
        $new_line_loading->avg_prod = $line_loading['avg_prod'];
        $new_line_loading->days_total = $line_loading['days_total'];
        $new_line_loading->eff_avg = $line_loading['eff_avg'];
        $new_line_loading->avl_min_1 = $line_loading['avl_min_1'];
        $new_line_loading->avl_min_2 = $line_loading['avl_min_2'];
        $new_line_loading->date = $line_loading['date'];
        $new_line_loading->date_with_efficiency = json_encode($line_loading['date_with_efficiency']);
        $new_line_loading->save();

        session()->forget('line_loading_session');

        return redirect('line-loading-plan/report');
    }

    public function edit($id)
    {
        $factories = CompanyUnit::pluck('name','id');
        $buyers = Buyer::pluck('name','id');
        $styles = CostBreakdown::where('style', '!=', null)->pluck('style','id');
        $items = Item::pluck('name','id');

        $line_loading_plan = LineLoading::find($id);
        return view('planning.line_loading.edit',compact('line_loading_plan','factories','styles','items','buyers'));
    }

    public function update(Request $request, $id)
    {
        $line_loading = session()->get('line_loading_session');
        $new_line_loading = LineLoading::find($id);

        $new_line_loading->factory_id = $line_loading['factory_id'];
        $new_line_loading->item_id = $line_loading['item_id'];
        $new_line_loading->buyer_id = $line_loading['buyer_id'];
        $new_line_loading->style_id = $line_loading['style_id'];
        $new_line_loading->floor = $line_loading['floor'];
        $new_line_loading->line_no = $line_loading['line_no'];
        $new_line_loading->quantity = $line_loading['quantity'];
        $new_line_loading->with_percent = $line_loading['with_percent'];
        $new_line_loading->allot_qty = $line_loading['allot_qty'];
        $new_line_loading->mc_use = $line_loading['mc_use'];
        $new_line_loading->manpower = $line_loading['manpower'];
        $new_line_loading->smv = $line_loading['smv'];
        $new_line_loading->avg_prod = $line_loading['avg_prod'];
        $new_line_loading->days_total = $line_loading['days_total'];
        $new_line_loading->eff_avg = $line_loading['eff_avg'];
        $new_line_loading->avl_min_1 = $line_loading['avl_min_1'];
        $new_line_loading->avl_min_2 = $line_loading['avl_min_2'];
        $new_line_loading->date = $line_loading['date'];
        $new_line_loading->date_with_efficiency = json_encode($line_loading['date_with_efficiency']);
        $new_line_loading->save();

        session()->forget('line_loading_session');

        return redirect('line-loading-plan/report');
    }

    public function delete($id)
    {
        $line_loading_plan = LineLoading::find($id)->delete();
        if($line_loading_plan){
            return response()->json(['success'=>true]);
        }
    }

   

}
