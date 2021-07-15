<?php

namespace App\Http\Controllers\Production;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\MerchandiseRepository;

use App\Buyer;
use App\CostBreakdown;
use App\Models\Production\Forecast;
use App\Models\Production\ForecastDetails;
use App\Merchandise\BudgetSheet;

use App\Models\Planning\LineLoading\Item;

class ForecastController extends Controller
{
    private $repository;

    public function __construct(MerchandiseRepository $repository){
        $this->middleware('auth');
        $this->repository = $repository;
    }

    public function getCM($style_id){
        $style = CostBreakdown::find($style_id);
        $budget_sheet = BudgetSheet::orderBy('id','desc')->where('style',$style->style)->first();
        $cm = $budget_sheet ? $budget_sheet->cutting_marking : 0;

        return response()->json(['cm'=>$cm]);
    }

    public function index()
    {
        $forecasts = Forecast::get();
        $factories = $this->repository->AllCompanyUnit();
        return view('production.forecast.index',compact('factories','forecasts'));
    }

    public function individualForecast($id)
    {
        $forecast = Forecast::find($id);
        $factories = $this->repository->AllCompanyUnit();

        $date_today = date('Y-m-d');
        $past_forcast = ForecastDetails::where('production_date','<',$forecast->production_date)->orderBy('production_date','desc')->first();
        $last_production = null;
        if($past_forcast != null){
            $last_production = ForecastDetails::where('production_date','<',$past_forcast->production_date)->orderBy('production_date','desc')->first();
        }

        return view('production.forecast.individual-forecast',compact('forecast','factories','past_forcast','last_production','date_today'));
    }

    public function create()
    {
        $buyers=Buyer::pluck('name','id');
        $styles=CostBreakdown::where('style', '!=', null)->pluck('style','id');
        $repository = $this->repository;
        $items=Item::pluck('name','id');
        $date_today = date('Y-m-d');
        // $past_forcast = ForecastDetails::orderBy('production_date','desc')->first();
        // $last_production = null;
        // if($past_forcast != null){
        //     $last_production = ForecastDetails::where('production_date','<',$past_forcast->production_date)->orderBy('production_date','desc')->first();
        // }

        return view('production.forecast.create',compact('buyers','styles','repository','items','date_today'));
    }

    public function getForecast($data)
    {
        $factory_id = explode('&', $data)[0];
        $floor = explode('&', $data)[1];
        $line_no = explode('&', $data)[2];
        $buyer_id = explode('&', $data)[3];
        $item_id = explode('&', $data)[4];
        $style_id = explode('&', $data)[5];

        $date_today = date('Y-m-d');

        $past_forcast = ForecastDetails::when(!in_array($line_no, ['cutting','finishing']), function ($query) use($floor, $line_no, $buyer_id){
            return $query->where(['floor'=>$floor,'line_no'=>$line_no,'buyer_id'=>$buyer_id]);
        })->where(['factory_id'=>$factory_id,'item_id'=>$item_id,'style_id'=>$style_id])->orderBy('production_date','desc')->first();

        $last_production_output = 0;
        if($past_forcast != null){
            $last_production_output = $past_forcast->output;
        }
        
        $total = ForecastDetails::where(['factory_id'=>$factory_id,'floor'=>$floor,'line_no'=>$line_no,'buyer_id'=>$buyer_id,'item_id'=>$item_id,'style_id'=>$style_id])->get();
        /* Total Input */
        $total_input = $total->sum('today_input');

        /* Total Output */
        $total_output = $total->sum('output');

        
        $monthly_total = ForecastDetails::where([['production_date','<=',$date_today],['production_date','>=',date('Y-m-d',strtotime($date_today.'-1 month'))]])->where(['factory_id'=>$factory_id,'floor'=>$floor,'line_no'=>$line_no,'buyer_id'=>$buyer_id,'item_id'=>$item_id,'style_id'=>$style_id])->get();
        /* Monthly Total Target */
        $monthly_total_target = $monthly_total->sum('target');

        /* Monthly Total Output */
        $monthly_total_output = $monthly_total->sum('output');

        return response()->json([
            'success' => true,
            'past_forcast' => $past_forcast,
            'last_production_output' => $last_production_output,
            'total_input' => $total_input,
            'total_output' => $total_output,
            'monthly_total_target' => $monthly_total_target,
            'monthly_total_output' => $monthly_total_output,
        ]);
        
    }

    public function delete($id){
        $delete = Forecast::find($id)->delete();
        if($delete){
            $delete_details = ForecastDetails::where('forecast_id',$id)->delete();
            if($delete_details){
                return response()->json(['success' => true]);
            }
        }
        return response()->json(['success' => false]);
    }

    public function store(Request $request)
    {
        //return $request->all();
        if(isset($request->line)){
            if(Forecast::where(['factory_id'=>$request->factory_id,'production_date'=> $request->production_date])->first() != null){
                return back()->with('error','Already added this for the production date !');
            }
            $forecast = Forecast::create($request->all());

            if($forecast){
                foreach ($request->line as $key => $detail) {
                    ForecastDetails::create([
                        'forecast_id' => $forecast->id,
                        'factory_id' => $request->factory_id,
                        'reporting_date' => $request->reporting_date,
                        'production_date' => $request->production_date,
                        'target_date' => $request->target_date,
                        'floor' => $request->floor[$key],
                        'line_no' => $request->line[$key],
                        'buyer_id' => $request->buyer_id[$key],
                        'item_id' => $request->item_id[$key],
                        'style_id' => $request->style_id[$key],
                        'smv' => $request->smv[$key],
                        'op_present' => $request->op_present[$key],
                        'hp_present' => $request->hp_present[$key],
                        'total_mp' => $request->total_mp[$key],
                        'running_mc' => $request->running_mc[$key],
                        'prod_days' => $request->prod_days[$key],
                        'qty' => $request->qty[$key],
                        'alloc_qty' => $request->alloc_qty[$key],
                        'npt_details' => $request->npt_details[$key],
                        'reason_for_less_production' => $request->reason_for_less_production[$key],
                        'style_cm' => $request->style_cm[$key],
                        'plan_cm' => $request->plan_cm[$key],
                        'cm_erned' => $request->cm_erned[$key],
                        'cm_short' => $request->cm_short[$key],
                        'target' => $request->present_target[$key],
                        'target_hours' => $request->present_target_hours[$key],
                        'output' => $request->last_day_output[$key],
                        'hours' => $request->last_day_hours[$key],
                        'wash_send' => $request->wash_send[$key],
                        'input_target' => $request->input_target[$key],
                        'today_input' => $request->today_input[$key],
                        'new_style_input' => $request->new_style_input[$key],
                        'dhu' => $request->dhu[$key],
                        'total_npt_min' => $request->total_npt_min[$key],
                        'remarks' => $request->remarks[$key],
                    ]);
                }
            }
            return back()->with('success','Data saved successfully');
        }
        return back()->with('error','No Line selected');

        
    }

    public function sample_tna(){
        $Styles=CostBreakdown::pluck('style','id');
        $order_summary_nos = OrderSummary::get(['id']);
        return view('merchandising.action_plan.sample_tna',compact('Styles','order_summary_nos'));
    }
    public function sample_tna_edit($data){
        return view('merchandising.action_plan.edit_sample_tna',compact('data'));
    }
    public function sample_tna_store(Request $request){
        if(!empty($request->color_name)){
            for($i = 0; $i < count($request->color_name) ; $i++){
                $sample_tna = new SampleTNA();
                $sample_tna->order_summary_style = $request->order_style;
                $sample_tna->color_name = $request->color_name[$i];
                $sample_tna->first_fit_submission = $request->first_fit_submission[$i];
                $sample_tna->second_fit_submission = $request->second_fit_submission[$i];
                $sample_tna->third_fit_submission = $request->third_fit_submission[$i];
                $sample_tna->fit_approved_date = $request->fit_approved_date[$i];
                $sample_tna->first_wash_sub_date = $request->first_wash_sub_date[$i];
                $sample_tna->second_wash_sub_date = $request->second_wash_sub_date[$i];
                $sample_tna->third_wash_sub_date = $request->third_wash_sub_date[$i];
                $sample_tna->wash_app_comm_rcv_date = $request->wash_app_comm_rcv_date[$i];
                $sample_tna->size_set_sub_date = $request->size_set_sub_date[$i];
                $sample_tna->size_set_rcv_date = $request->size_set_rcv_date[$i];
                $sample_tna->first_pp_sub_date = $request->first_pp_sub_date[$i];
                $sample_tna->second_pp_sub_date = $request->second_pp_sub_date[$i];
                $sample_tna->third_pp_sub_date = $request->third_pp_sub_date[$i];
                $sample_tna->pp_approved_date = $request->pp_approved_date[$i];

                $sample_tna->actual_first_fit_submission = $request->actual_first_fit_submission[$i];
                $sample_tna->actual_second_fit_submission = $request->actual_second_fit_submission[$i];
                $sample_tna->actual_third_fit_submission = $request->actual_third_fit_submission[$i];
                $sample_tna->actual_fit_approved_date = $request->actual_fit_approved_date[$i];
                $sample_tna->actual_first_wash_sub_date = $request->actual_first_wash_sub_date[$i];
                $sample_tna->actual_second_wash_sub_date = $request->actual_second_wash_sub_date[$i];
                $sample_tna->actual_third_wash_sub_date = $request->actual_third_wash_sub_date[$i];
                $sample_tna->actual_wash_app_comm_rcv_date = $request->actual_wash_app_comm_rcv_date[$i];
                $sample_tna->actual_size_set_sub_date = $request->actual_size_set_sub_date[$i];
                $sample_tna->actual_size_set_rcv_date = $request->actual_size_set_rcv_date[$i];
                $sample_tna->actual_first_pp_sub_date = $request->actual_first_pp_sub_date[$i];
                $sample_tna->actual_second_pp_sub_date = $request->actual_second_pp_sub_date[$i];
                $sample_tna->actual_third_pp_sub_date = $request->actual_third_pp_sub_date[$i];
                $sample_tna->actual_pp_approved_date = $request->actual_pp_approved_date[$i];

                $sample_tna->save();

            }
            session()->flash('success','Sample TNA Successfullty Saved !');
        }

        return redirect('actionPlan/reports/sample-tna');
    }

    public function fabrics_tna(){
        $repository = $this->repository;
        $countries = Country::get();
        $order_summary_nos = OrderSummary::get(['id']);
        $Styles=CostBreakdown::pluck('style','id');
        return view('merchandising.action_plan.fabrics_tna',compact('order_summary_nos','countries','Styles','repository'));
    }

    public function fabrics_tna_edit($data){
        $countries = Country::get();
        return view('merchandising.action_plan.edit_fabrics_tna',compact('data','countries'));
    }
    public function fabrics_tna_store(Request $request){
        if(!empty($request->color_name)){
            for($i = 0; $i < count($request->color_name) ; $i++){
                $fabrics_tna = new FabricsTNA();
                $fabrics_tna->order_summary_style = $request->order_style;
                $fabrics_tna->color_name = $request->color_name[$i];
                $fabrics_tna->shell_booking_date = $request->shell_booking_date[$i];
                $fabrics_tna->shell_plan_inhouse_date = $request->shell_plan_inhouse_date[$i];
                $fabrics_tna->shell_actual_inhouse_date = $request->shell_actual_inhouse_date[$i];
                $fabrics_tna->shell_origin_country = $request->shell_origin_country[$i];
                $fabrics_tna->shell_app_supplier_name = $request->shell_app_supplier_name[$i];
                $fabrics_tna->trims_booking_date = $request->trims_booking_date[$i];
                $fabrics_tna->trims_plan_inhouse_date = $request->trims_plan_inhouse_date[$i];
                $fabrics_tna->trims_actual_inhouse_date = $request->trims_actual_inhouse_date[$i];
                $fabrics_tna->trims_origin_country = $request->trims_origin_country[$i];
                $fabrics_tna->trims_app_supplier_name = $request->trims_app_supplier_name[$i];
                $fabrics_tna->save();

            }
            session()->flash('success','Sample TNA Successfullty Saved !');
        }
        return redirect('actionPlan/reports/fabrics-tna');
    }

    public function acc_tna(){
        $repository = $this->repository;
        $Styles=CostBreakdown::pluck('style','id');
        $countries = Country::get();
        $order_summary_nos = OrderSummary::get(['id']);
        return view('merchandising.action_plan.all_acc_tna',compact('order_summary_nos','countries','Styles','repository'));
    }

    public function all_acc_tna_edit($data){
        $countries = Country::get();
        return view('merchandising.action_plan.edit_all_acc_tna',compact('data','countries'));
    }
    public function all_acc_tna_store(Request $request){
        if(!empty($request->item_name)){
            for($i = 0; $i < count($request->item_name) ; $i++){
                $all_acc_tna = new AllAccTNA();
                $all_acc_tna->order_summary_style = $request->order_style;
                $all_acc_tna->item_name = $request->item_name[$i];
                $all_acc_tna->booking_date = $request->booking_date[$i];
                $all_acc_tna->inhouse_date = $request->inhouse_date[$i];
                $all_acc_tna->actual_inhouse_date = $request->actual_inhouse_date[$i];
                $all_acc_tna->org_country = $request->org_country[$i];
                $all_acc_tna->supplier_name = $request->supplier_name[$i];
                $all_acc_tna->save();
            }
            session()->flash('success','Sample TNA Successfullty Saved !');
        }
        return redirect('actionPlan/reports/all-acc-tna');
    }
    public function pre_production_act(){
        $repository = $this->repository;
        $Styles=CostBreakdown::pluck('style','id');
        $order_summary_nos = OrderSummary::get(['id']);
        return view('merchandising.action_plan.pre_production',compact('order_summary_nos','Styles','repository'));
    }

    public function pre_production_edit($data){
        $countries = Country::get();
        return view('merchandising.action_plan.edit_pre_production',compact('data','countries'));
    }
    public function pre_production_store(Request $request){
        if(!empty($request->color_name)){
            for($i = 0; $i < count($request->color_name) ; $i++){
                $pre_production = new PreProduction();
                $pre_production->order_summary_style = $request->order_style;
                $pre_production->color_name = $request->color_name[$i];
                $pre_production->size_ready_date = $request->size_ready_date[$i];
                $pre_production->pp_meeting_date = $request->pp_meeting_date[$i];
                $pre_production->bulk_cut_date = $request->bulk_cut_date[$i];
                $pre_production->sewing_start = $request->sewing_start[$i];
                $pre_production->sewing_finish = $request->sewing_finish[$i];
                $pre_production->washing_date = $request->washing_date[$i];
                $pre_production->finishing_packing = $request->finishing_packing[$i];
                $pre_production->final_inspection = $request->final_inspection[$i];
                $pre_production->ex_factory = $request->ex_factory[$i];

                $pre_production->actual_size_ready_date = $request->actual_size_ready_date[$i];
                $pre_production->actual_pp_meeting_date = $request->actual_pp_meeting_date[$i];
                $pre_production->actual_bulk_cut_date = $request->actual_bulk_cut_date[$i];
                $pre_production->actual_sewing_start = $request->actual_sewing_start[$i];
                $pre_production->actual_sewing_finish = $request->actual_sewing_finish[$i];
                $pre_production->actual_washing_date = $request->actual_washing_date[$i];
                $pre_production->actual_finishing_packing = $request->actual_finishing_packing[$i];
                $pre_production->actual_final_inspection = $request->actual_final_inspection[$i];
                $pre_production->actual_ex_factory = $request->actual_ex_factory[$i];

                $pre_production->remarks = $request->remarks[$i];
                $pre_production->save();

            }
            session()->flash('success','Sample TNA Successfullty Saved !');
        }
        return redirect('actionPlan/reports/pre-production-tna');
    }


    public function show($id)
    {
        //
    }


    public function edit($data)
    {
        return view('merchandising.action_plan.edit_order_summary',compact('data'));
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }


    //Order Summary
    public function order_summary_show(){
        $order_summary = OrderSummary::orderBy('id', 'desc')->get();
        return view('merchandising.action_plan.reports.order_summary', compact('order_summary'));
    }

    public function order_summary_show_edit($id){
        $buyers=Buyer::get(['name','id']);
        $payment_terms=PriceQuotation::get(['name','id']);
        $styles=CostBreakdown::get(['style','id']);
        $units=CompanyUnit::get(['name','id']);
        $order_summary = OrderSummary::find($id);
        return view('merchandising.action_plan.edit.order_summary', compact('order_summary','payment_terms','styles','units','buyers'));
    }

    public function order_summary_show_update(Request $request){
        $order_summary = OrderSummary::find($request->order_no);
        $order_summary->update($request->all());
        return redirect()->back();
    }

    public function order_summary_show_delete($id){
        $delete = OrderSummary::find($id)->delete();
        if($delete){
            return response()->json(['success'=>true]);
        }
    }

    //Order Summary Details
    public function order_summary_details_show(){
        $order_summary_details = OrderSummaryDetails::orderBy('order_summary_id', 'desc')->get();
        return view('merchandising.action_plan.reports.order_summary_details', compact('order_summary_details'));
    }

    public function order_summary_details_show_edit($id){
        $order_summary_details = OrderSummaryDetails::find($id);
        return view('merchandising.action_plan.edit.order_summary_details', compact('order_summary_details'));
    }

    public function order_summary_details_show_add(){
        $order_summary_nos = OrderSummary::get(['id']);
        return view('merchandising.action_plan.add.order_summary_details',compact('order_summary_nos'));
    } 
    public function order_summary_details_show_addStore(Request $request){
        $order_summary_details = new OrderSummaryDetails();
        $order_summary_details->fill($request->all())->save();
        return redirect()->back();
    }

    public function order_summary_details_show_update(Request $request){
        $order_summary_details = OrderSummaryDetails::find($request->order_no);
        $order_summary_details->update($request->all());
        return redirect()->back();
    }

    public function order_summary_details_show_delete($id){
        $delete = OrderSummaryDetails::find($id)->delete();
        if($delete){
            return response()->json(['success'=>true]);
        }
    }


     //Sample TNA
    public function sample_tna_show(){
        $sample_tna = SampleTNA::orderBy('order_summary_style', 'desc')->get();
        return view('merchandising.action_plan.reports.sample_tna', compact('sample_tna'));
    }

    public function sample_tna_show_edit($id){
        $sample_tna = SampleTNA::find($id);
        return view('merchandising.action_plan.edit.sample_tna', compact('sample_tna'));
    }

    public function sample_tna_show_update(Request $request){
        $sample_tna = SampleTNA::find($request->order_no);
        $sample_tna->update($request->all());
        return redirect()->back();
    }

    public function sample_tna_show_delete($id){
        $delete = SampleTNA::find($id)->delete();
        if($delete){
            return response()->json(['success'=>true]);
        }
    }

     //Fabrics TNA
    public function fabrics_tna_show(){
        $fabrics_tna = FabricsTNA::orderBy('order_summary_style', 'desc')->get();
        return view('merchandising.action_plan.reports.fabrics_tna', compact('fabrics_tna'));
    }

    public function fabrics_tna_show_edit($id){
        $fabrics_tna = FabricsTNA::find($id);
        $countries = Country::get(['id','name']);
        return view('merchandising.action_plan.edit.fabrics_tna', compact('fabrics_tna','countries'));
    }

    public function fabrics_tna_show_update(Request $request){
        $fabrics_tna = FabricsTNA::find($request->order_no);
        $fabrics_tna->update($request->all());
        return redirect()->back();
    }

    public function fabrics_tna_show_delete($id){
        $delete = FabricsTNA::find($id)->delete();
        if($delete){
            return response()->json(['success'=>true]);
        }
    }

    //All ACC TNA
    public function all_acc_tna_show(){
        $all_acc_tna = AllAccTNA::orderBy('order_summary_style', 'desc')->get();
        return view('merchandising.action_plan.reports.all_acc_tna', compact('all_acc_tna'));
    }

    public function all_acc_tna_show_edit($id){
        $all_acc_tna = AllAccTNA::find($id);
        $countries = Country::get(['id','name']);
        return view('merchandising.action_plan.edit.all_acc_tna', compact('all_acc_tna','countries'));
    }

    public function all_acc_tna_show_update(Request $request){
        $all_acc_tna = AllAccTNA::find($request->order_no);
        $all_acc_tna->update($request->all());
        return redirect()->back();
    }

    public function all_acc_tna_show_delete($id){
        $delete = AllAccTNA::find($id)->delete();
        if($delete){
            return response()->json(['success'=>true]);
        }
    }


     //Pre Production T&A
    public function pre_production_tna_show(){
        $pre_production_tna = PreProduction::orderBy('order_summary_style', 'desc')->get();
        return view('merchandising.action_plan.reports.pre_production_tna', compact('pre_production_tna'));
    }

    public function pre_production_tna_show_edit($id){
        $pre_production_tna = PreProduction::find($id);
        return view('merchandising.action_plan.edit.pre_production_tna', compact('pre_production_tna'));
    }

    public function pre_production_tna_show_update(Request $request){
        $pre_production_tna = PreProduction::find($request->order_no);
        $pre_production_tna->update($request->all());
        return redirect()->back();
    }

    public function pre_production_tna_show_delete($id){
        $delete = PreProduction::find($id)->delete();
        if($delete){
            return response()->json(['success'=>true]);
        }
    } 
    public function dailySectionWiseReport(){
        $from = date('Y-m-d', strtotime('-1 month'));
        $to = date('Y-m-d');
        $factories = $this->repository->AllCompanyUnit();
        return view('production.daily_section_wise.report',compact('factories','from','to'));
    }

    public function searchDailySectionWiseReport(Request $request){
        $factories = $this->repository->AllCompanyUnit();
        $factory_id = $request->factory_id;
        $forecastDetails = ForecastDetails::where(['factory_id'=>$request->factory_id,'floor'=>$request->floor,'line_no'=>$request->line_no])->where([['production_date','>=',$request->from],['production_date','<=',$request->to]])->get();
        return view('production.daily_section_wise.search',compact('forecastDetails','factories','factory_id'));
    }


}
