<?php

namespace App\Http\Controllers\Merchandise;

use App\Buyer;
use App\CostBreakdown;
use App\Hrm\Country;
use App\Merchandise\PriceQuotation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\MerchandiseRepository;

use App\Models\Planning\OrderSummary;
use App\Models\Planning\OrderSummaryDetails;
use App\Models\Planning\SampleTNA;
use App\Models\Planning\FabricsTNA;
use App\Models\Planning\AllAccTNA;
use App\Models\Planning\PreProduction;

use App\Merchandise\CompanyUnit;

class ActionPlanController extends Controller
{
    private $repository;

    public function __construct(MerchandiseRepository $repository){
        $this->middleware('auth');
        $this->repository = $repository;
    }


    public function getLastOrderSummary(){
        $order_summary = OrderSummary::orderBy('id','desc')->first();
        return $order_summary ? $order_summary->id : null;
    }

    public function index()
    {
        $order_summary = OrderSummary::orderBy('id','desc')->with('details','sample_tna','fabrics_tna','all_acc_tna','pre_production')->first();
        $all_order_summary = OrderSummary::orderBy('id','desc')->get(['id']);
        return view('merchandising.action_plan.at_a_glance',compact('all_order_summary','order_summary'));
    }
     public function atAGlance($id)
    {
        $order_summary = OrderSummary::with('details','sample_tna','fabrics_tna','all_acc_tna','pre_production')->find($id);
        $all_order_summary = OrderSummary::orderBy('id','desc')->get(['id']);
        return view('merchandising.action_plan.at_a_glance',compact('all_order_summary','order_summary'));
    }


    public function create()
    {
        $order_summary_no = OrderSummary::max('id')+1;
        $buyers=Buyer::pluck('name','id');
        $payment_terms=PriceQuotation::pluck('name','id');
        $Styles=$this->repository->styles();
        $repository = $this->repository;
        return view('merchandising.action_plan.order-summary',compact('order_summary_no','repository','buyers','payment_terms','Styles'));
    }

    public function sample_tna(){
        $Styles=$this->repository->styles();
        $order_summary_no = $this->getLastOrderSummary();
        $order_summary_nos = OrderSummary::get(['id','style_id']);
        return view('merchandising.action_plan.sample_tna',compact('Styles','order_summary_nos','order_summary_no'));
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
        }else{
            session()->flash('error','Fill up at least one row !');
            return back();
        }

        return redirect('actionPlan/fabrics_tna');
    }

    public function fabrics_tna(){
        $repository = $this->repository;
        $countries = Country::get();
        $order_summary_no = $this->getLastOrderSummary();
        $order_summary_nos = OrderSummary::get(['id','style_id']);
        $Styles=$this->repository->styles();
        return view('merchandising.action_plan.fabrics_tna',compact('order_summary_nos','countries','Styles','repository','order_summary_no'));
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
            session()->flash('success','Fabrics TNA Successfullty Saved !');
        }else{
            session()->flash('error','Fill up at least one row !');
            return back();
        }
        return redirect('actionPlan/acc_tna');
    }

    public function acc_tna(){
        $repository = $this->repository;
        $Styles=$this->repository->styles();
        $countries = Country::get();
        $order_summary_nos = OrderSummary::get(['id','style_id']);
        $order_summary_no = $this->getLastOrderSummary();
        return view('merchandising.action_plan.all_acc_tna',compact('order_summary_nos','countries','Styles','repository','order_summary_no'));
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
            session()->flash('success','All Accessories TNA Successfullty Saved !');
        }else{
            session()->flash('error','Fill up at least one row !');
            return back();
        }
        return redirect('actionPlan/pre_production_act');
    }
    public function pre_production_act(){
        $repository = $this->repository;
        $Styles=$this->repository->styles();
        $order_summary_nos = OrderSummary::get(['id','style_id']);
        $order_summary_no = $this->getLastOrderSummary();
        return view('merchandising.action_plan.pre_production',compact('order_summary_nos','Styles','repository','order_summary_no'));
    }

    public function pre_production_edit($data){
        $countries = Country::get();
        return view('merchandising.action_plan.edit_pre_production',compact('data','countries'));
    }
    public function pre_production_store(Request $request){
        $order_summary_no = $this->getLastOrderSummary();
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
        }else{
            session()->flash('error','Fill up at least one row !');
            return back();
        }
        return redirect('actionPlan/at-a-glance');
    }


    public function store(Request $request)
    {
        if(empty($request->color_name)){
            session()->flash('error','Fill up at least one row !');
            return back();
        }
        $order_summary = new OrderSummary();
        $order_summary->id = OrderSummary::max('id')+1;
        $order_summary->fill($request->all());
        $order_summary->save();

        for($i = 0; $i < count($request->color_name); $i++){
            $order_summary_details = new OrderSummaryDetails();
            $order_summary_details->order_summary_id = $order_summary->id;
            $order_summary_details->color_name = $request->color_name[$i];
            $order_summary_details->fob_price_pcs = $request->fob_price_pcs[$i];
            $order_summary_details->cm_price_pcs = $request->cm_price_pcs[$i];
            $order_summary_details->quantity_pcs = $request->quantity_pcs[$i];
            $order_summary_details->ship_date = $request->ship_date[$i];
            $order_summary_details->save();

        }
        session()->flash('success','Order Summary Successfullty Saved !');
        return redirect('actionPlan/sample_tna');
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
        $order_summary_nos = OrderSummary::get(['id','style_id']);
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
        $order_summary_no = OrderSummary::orderBy('id','desc')->first() ? OrderSummary::orderBy('id','desc')->first()->id : null;
        $fabrics_tna = FabricsTNA::orderBy('order_summary_style', 'desc')->get();
        return view('merchandising.action_plan.reports.fabrics_tna', compact('fabrics_tna','order_summary_no'));
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

}
