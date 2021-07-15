<form id="pre_production_tna_form" method="POST" action="{{ url('actionPlan/reports/pre-production-tna') }}">
    {{csrf_field()}}
    <div class="row">
        <input type="hidden" name="order_no" value="{{ $pre_production_tna->id }}">
   <div class="col-md-3">
        <div class="form-group">
            <label for="color_name">Color Name</label>
            <input type="text" name="color_name" value="{{ $pre_production_tna->color_name }}" class="form-control" id="color_name">
          </div>
    </div>
    <div class="col-md-12">
        <table class="table table-bordered">
            <tr>
                <th class="text-center" colspan="2">Options</th>
                <th class="text-center">Plan Date</th>
                <th class="text-center">Actual Date</th>
            </tr>
            @php 
                $pre_production_tnas = preProductionTNAs();
                $i = 0;
            @endphp
            @foreach($pre_production_tnas as $productionKey => $tna)
            @php 
                $i++;
                if($i == 1){
                    $plan_value = $pre_production_tna->size_ready_date;
                    $actual_value = $pre_production_tna->actual_size_ready_date;
                }else if($i == 2){
                    $plan_value = $pre_production_tna->pp_meeting_date;
                    $actual_value = $pre_production_tna->actual_pp_meeting_date;
                }else if($i == 3){
                    $plan_value = $pre_production_tna->bulk_cut_date;
                    $actual_value = $pre_production_tna->actual_bulk_cut_date;
                }else if($i == 4){
                    $plan_value = $pre_production_tna->sewing_start;
                    $actual_value = $pre_production_tna->actual_sewing_start;
                }else if($i == 5){
                    $plan_value = $pre_production_tna->sewing_finish;
                    $actual_value = $pre_production_tna->actual_sewing_finish;
                }else if($i == 6){
                    $plan_value = $pre_production_tna->washing_date;
                    $actual_value = $pre_production_tna->actual_washing_date;
                }else if($i == 7){
                    $plan_value = $pre_production_tna->finishing_packing;
                    $actual_value = $pre_production_tna->actual_finishing_packing;
                }else if($i == 8){
                    $plan_value = $pre_production_tna->final_inspection;
                    $actual_value = $pre_production_tna->actual_final_inspection;
                }else if($i == 9){
                    $plan_value = $pre_production_tna->ex_factory;
                    $actual_value = $pre_production_tna->actual_ex_factory;
                }
            @endphp
            <tr>
                <th style="padding: 3px !important" class="text-center" colspan="2">{{ $tna }}</th>
                <td style="padding: 3px !important" class="text-center">
                    <input type="date" class="form-control" name="{{ $productionKey }}" id="{{ $productionKey }}_edit" value="{{ $plan_value }}">
                </td>
                <td style="padding: 3px !important" class="text-center"><input type="date" class="form-control" name="actual_{{ $productionKey }}" id="actual_{{ $productionKey }}_edit" value="{{  $actual_value }}"></td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="remarks">Remarks</label>
            <input type="text" name="remarks" value="{{ $pre_production_tna->remarks }}" class="form-control" id="remarks">
          </div>
    </div>
    
</div>