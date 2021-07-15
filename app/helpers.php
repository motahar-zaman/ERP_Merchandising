<?php

use App\Models\Production\Forecast;
use App\Models\Production\ForecastDetails;

function isActive($path, $active = 'active menu-open'){
    return call_user_func_array('Request::is', (array)$path) ? $active : '';
}

function total_input($detail){
    $floor = $detail->floor;
    $line_no = $detail->line_no;
    $buyer_id = $detail->buyer_id;
    return ForecastDetails::when(!in_array($line_no, ['cutting','finishing']), function ($query) use($floor, $line_no, $buyer_id){
            return $query->where(['floor'=>$floor,'line_no'=>$line_no,'buyer_id'=>$buyer_id]);
        })->where(['factory_id'=>$detail->factory_id,'item_id'=>$detail->item_id,'style_id'=>$detail->style_id])->sum('today_input');
}

function total_output($detail){
    $floor = $detail->floor;
    $line_no = $detail->line_no;
    $buyer_id = $detail->buyer_id;
    return ForecastDetails::when(!in_array($line_no, ['cutting','finishing']), function ($query) use($floor, $line_no, $buyer_id){
            return $query->where(['floor'=>$floor,'line_no'=>$line_no,'buyer_id'=>$buyer_id]);
        })->where(['factory_id'=>$detail->factory_id,'item_id'=>$detail->item_id,'style_id'=>$detail->style_id])->sum('output');
}

function monthly_total_target($detail){
    return ForecastDetails::where([['production_date','<=',$detail->production_date],['production_date','>=',date('Y-m-d',strtotime($detail->production_date.'-1 month'))]])->where(['factory_id'=>$detail->factory_id,'floor'=>$detail->floor,'line_no'=>$detail->line_no,'buyer_id'=>$detail->buyer_id,'item_id'=>$detail->item_id,'style_id'=>$detail->style_id])->sum('target');
}

function monthly_total_output($detail){
    return ForecastDetails::where([['production_date','<=',$detail->production_date],['production_date','>=',date('Y-m-d',strtotime($detail->production_date.'-1 month'))]])->where(['factory_id'=>$detail->factory_id,'floor'=>$detail->floor,'line_no'=>$detail->line_no,'buyer_id'=>$detail->buyer_id,'item_id'=>$detail->item_id,'style_id'=>$detail->style_id])->sum('output');
}

function last_production($detail){
    $past_forcast = ForecastDetails::where('production_date','<',$detail->production_date)->where(['factory_id'=>$detail->factory_id,'floor'=>$detail->floor,'line_no'=>$detail->line_no,'buyer_id'=>$detail->buyer_id,'item_id'=>$detail->item_id,'style_id'=>$detail->style_id])->first();
    $last_production = null;
    if($past_forcast != null){
        $last_production = ForecastDetails::where('production_date','<',$past_forcast->production_date)->where(['factory_id'=>$detail->factory_id,'floor'=>$detail->floor,'line_no'=>$detail->line_no,'buyer_id'=>$detail->buyer_id,'item_id'=>$detail->item_id,'style_id'=>$detail->style_id])->first();
    }

    return $last_production;
}

function past_forcast($detail){
    return $past_forcast = ForecastDetails::where('production_date','<',$detail->production_date)->where(['factory_id'=>$detail->factory_id,'floor'=>$detail->floor,'line_no'=>$detail->line_no,'buyer_id'=>$detail->buyer_id,'item_id'=>$detail->item_id,'style_id'=>$detail->style_id])->first();
}

function last_day($detail){
    return $past_forcast = ForecastDetails::where('production_date','<',$detail->production_date)->where(['factory_id'=>$detail->factory_id,'floor'=>$detail->floor,'line_no'=>$detail->line_no,'buyer_id'=>$detail->buyer_id,'item_id'=>$detail->item_id,'style_id'=>$detail->style_id])->first();
    
}
function forecastOptions()
{
    $array=array(
    	'varience' => 'Varience %',
        'achieve' => 'Achieve %',
        'pcs_per_machine' => 'PCS Per Machine',
        'wash_send' => 'Wash Send',
        'input_target' => 'Input Target',
        'today_input' => 'Today Input',
        'new_style_input' => 'New Style Input',
        'total_input' => 'Total Input',
        'total_output' => 'Total Output',
        'need_wip' => 'Need 2.5 day WIP',
        'avg_output' => 'AVG Output',
        'wip_line_balance' => 'WIP Line Balance',
        'monthly_total_target' => 'Monthly Total Target',
        'monthly_total_output' => 'Monthly Total Output',
        'monthly_varience' => 'Var. %',
        'monthly_achieve' => 'Ach. %',
        'efficiency' => 'Eff %',
        'dhu' => 'DHU %',
        'total_npt_min' => 'Total <br>Npt',
        'npt_details' => 'NPT Details',
        'reason_for_less_production' => 'Reason For Less Production',
        'total_npt_min' => 'Total Npt (MIN)',
        'total_npt_min' => 'Total Npt (MIN)',
        'remarks' => 'Remarks',
        'style_cm' => 'Style CM',
        'plan_cm' => 'Plan CM',
        'cm_erned' => 'CM EARN',
        'cm_short' => 'CM Short/Over',
    );

    return $array;
}
function itemNames()
{
    $array=array(
        'Thread',
        'Size Label',
        'Main Label ',
        'Care Label',
        'Fly Zipper',
        'Other Zipper',
        'Plastic Button',
        'Slap Button',
        'Shang Button',
        'Hangtag',
        'Price Tag',
        'Zoker Tag',
        'Size Sticker',
        'Size Strip',
        'Poly',
        'Poly Sticker',
        'Cartoon',
        'Cartoon Sticker',
        'Other Trims',
    );

    return $array;
}

function lines()
{
    $array=array(
        'a' => 'A',
        'b' => 'B',
        'c' => 'C',
        'd' => 'D',
        'ab' => 'AB',
        'bc' => 'BC',
        'cd' => 'CD',
        'abc' => 'ABC',
        'bcd' => 'BCD',
        'e' => 'E',
        'f' => 'F',
        'g' => 'G',
        'h' => 'H',
        'ef' => 'EF',
        'fg' => 'FG',
        'gh' => 'GH',
        'efg' => 'EFG',
        'fgh' => 'FGH',
        'efgh' => 'EFGH',
        'i' => 'I',
        'j' => 'J',
        'k' => 'K',
        'l' => 'L',
        'ij' => 'IJ',
        'jk' => 'JK',
        'kl' => 'KL',
        'ijk' => 'IJK',
        'jkl' => 'JKL',
        'ijkl' => 'IJKL',
        'cutting' => 'Cutting',
        'finishing' => 'Finishing'
    );

    return $array;
}


function floors()
{
    $array=array(
        'Ground Floor',
        '1st Floor',
        '2nd Floor',
        '3rd Floor',
        '4th Floor',
        '5th Floor',
        '6th Floor',
        '7th Floor',
        '8th Floor',
        '9th Floor',
        '10th Floor',
        '11th Floor',
        
    );

    return $array;
}

function sampleTNAs()
{
    $array=array(
        'first_fit_submission' => '1st Fit Submission Date',
        'second_fit_submission' => '2nd Fit Submission Date',
        'third_fit_submission' => '3rd Fit Submission Date',
        'fit_approved_date' => 'Fit Approved Date',
        'first_wash_sub_date' => '1st Wash Submission Date',
        'second_wash_sub_date' => '2nd Wash Submission Date',
        'third_wash_sub_date' => '3rd Wash Submission Date',
        'wash_app_comm_rcv_date' => 'Wash Approved Comments Received Date',
        'size_set_rcv_date' => 'Size set Received Date',
        'size_set_sub_date' => 'Size Set Submission Date',
        'first_pp_sub_date' => '1st PP Submission Date',
        'second_pp_sub_date' => '2nd PP Submission Date',
        'third_pp_sub_date' => '3rd PP Submission Date',
        'pp_approved_date' => 'PP Aproved Date',
    );

    return $array;
}

function ouputRange()
{
    return array(5,15,30,40,45,55,65,65,65,70,70,75,75,75,75);
}

function lineLoading()
{
    $array=array(
        'factory_id' => 'Factory',
        'floor' => 'Floor',
        'line_no' => 'Line No',
        'buyer_id' => 'Buyer',
        'style_id' => 'Style',
        'item_id' => 'Item',
        'quantity' => 'Order Qty',
        'with_percent' => 'With 2 %',
        'allot_qty' => 'Allot. Qty',
        'mc_use' => 'MC Use:',
        'manpower' => 'Manpower',
        'smv' => 'SMV',
        'avg_prod' => 'Avg. Prod.',
        'days_total' => 'Days Ttl',
        'eff_avg' => 'Eff. Avg.',
        'avl_min_1' => 'Avl. Min. 1',
        'avl_min_2' => 'Avl. Min. 2',
    );

    return $array;
}

function styleReviews()
{
    $array=array(
        'buyer_id' => 'Buyer',
        'style_id' => 'Style',
        'po_no' => 'PO No',
        'item' => 'Item',
        'quantity' => 'O. Qty',
        'with_percent' => 'With 2 %',
        'delivery_date' => 'Deli Date',
        'sewing_com_date' => 'Complete Date',
        'sewing_total_complete' => 'Total Complete',
        'sewing_balance' => 'Sewing Balance',
        'sewing_day_remaining' => 'Day Remaining',
        'sewing_need_per_day' => 'Need Per Day',
        'finishing_com_date' => 'Complete Date',
        'finishing_total_complete' => 'Total Complete',
        'finishing_balance' => 'Sewing Balance',
        'finishing_day_remaining' => 'Day Remaining',
        'finishing_need_per_day' => 'Need Per Day',
    );

    return $array;
}

function preProductionTNAs()
{
    $array=array(
        'size_ready_date' => 'Production Size Set Ready Date',
        'pp_meeting_date' => 'P.P Meeting Date',
        'bulk_cut_date' => 'Bulk Cutting Date',
        'sewing_start' => 'Sewing Start Date',
        'sewing_finish' => 'Sewing Finish Date',
        'washing_date' => 'Wash Complete Date',
        'finishing_packing' => 'Finishing & Packing Complete Date',
        'final_inspection' => 'Final Inspection Date',
        'ex_factory' => 'Ex. Factory Date',
    );

    return $array;
}

function bookingPlan()
{
    $array=array(
        'lc_factory' => 'LC Factory',
        'buyer_id' => 'Buyer',
        'style_id' => 'Style',
        'item' => 'Item',
        'merchandiser' => 'Responsible Merchandiser',
        'merchandiser_head' => 'Responsible Merchandiser Head',
        'sketch_or_sample' => 'Sketch/Sample',
        'smv' => 'SMV',
        'quantity' => 'Order Qty',
        'order_season' => 'Order Season',
        'input_date' => 'Input Date',
        'ex_factory' => 'Ex Factory',
        'wash' => 'Wash/ Not Wash',
        'emblishment' => 'Emblishment',
        'remarks' => 'Remarks',
    );

    return $array;
}

function planOrActual()
{
    $array=array(
        'Plan',
        'Actual',
    );

    return $array;
}