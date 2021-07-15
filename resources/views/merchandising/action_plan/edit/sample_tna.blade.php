<form id="sample_tna_form" method="POST" action="{{ url('actionPlan/reports/sample-tna') }}">
    {{csrf_field()}}
    <div class="row">
        <input type="hidden" name="order_no" value="{{ $sample_tna->id }}">
        <div class="col-md-3">
            <div class="form-group">
                <label for="color_name">Garments color name</label>
                <input type="text" name="color_name" value="{{ $sample_tna->color_name }}" class="form-control" id="color_name" placeholder="Enter Color Name:">
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
                $sampla_tnas = SampleTNAs();
                $i = 0;
            @endphp
            @foreach($sampla_tnas as $sampleKey => $tna)
            @php 
                $i++;
                if($i == 1){
                    $plan_value = $sample_tna->first_fit_submission;
                    $actual_value = $sample_tna->actual_first_fit_submission;
                }else if($i == 2){
                    $plan_value = $sample_tna->second_fit_submission;
                    $actual_value = $sample_tna->actual_second_fit_submission;
                }else if($i == 3){
                    $plan_value = $sample_tna->third_fit_submission;
                    $actual_value = $sample_tna->actual_third_fit_submission;
                }else if($i == 4){
                    $plan_value = $sample_tna->fit_approved_date;
                    $actual_value = $sample_tna->actual_fit_approved_date;
                }else if($i == 5){
                    $plan_value = $sample_tna->first_wash_sub_date;
                    $actual_value = $sample_tna->actual_first_wash_sub_date;
                }else if($i == 6){
                    $plan_value = $sample_tna->second_wash_sub_date;
                    $actual_value = $sample_tna->actual_second_wash_sub_date;
                }else if($i == 7){
                    $plan_value = $sample_tna->third_wash_sub_date;
                    $actual_value = $sample_tna->actual_third_wash_sub_date;
                }else if($i == 8){
                    $plan_value = $sample_tna->wash_app_comm_rcv_date;
                    $actual_value = $sample_tna->actual_wash_app_comm_rcv_date;
                }else if($i == 9){
                    $plan_value = $sample_tna->size_set_rcv_date;
                    $actual_value = $sample_tna->actual_size_set_rcv_date;
                }else if($i == 10){
                    $plan_value = $sample_tna->size_set_sub_date;
                    $actual_value = $sample_tna->actual_size_set_sub_date;
                }else if($i == 11){
                    $plan_value = $sample_tna->first_pp_sub_date;
                    $actual_value = $sample_tna->actual_first_pp_sub_date;
                }else if($i == 12){
                    $plan_value = $sample_tna->second_pp_sub_date;
                    $actual_value = $sample_tna->actual_second_pp_sub_date;
                }else if($i == 13){
                    $plan_value = $sample_tna->third_pp_sub_date;
                    $actual_value = $sample_tna->actual_third_pp_sub_date;
                }else if($i == 14){
                    $plan_value = $sample_tna->pp_approved_date;
                    $actual_value = $sample_tna->actual_pp_approved_date;
                }
            @endphp
            <tr>
                <th style="padding: 3px !important" class="text-center" colspan="2">{{ $tna }}</th>
                <td style="padding: 3px !important" class="text-center">
                    <input type="date" class="form-control" name="{{ $sampleKey }}" id="{{ $sampleKey }}_edit" value="{{$plan_value }}">
                </td>
                <td style="padding: 3px !important" class="text-center"><input type="date" class="form-control" name="actual_{{ $sampleKey }}" id="actual_{{ $sampleKey }}_edit" value="{{  $actual_value }}"></td>
            </tr>
            @endforeach
        </table>
    </div>
        
    </div>
</form>