<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="color_name_edit">Garments color name</label>
            <input type="text" name="color_name_edit" value="{{ explode('&', $data)[0] }}" class="form-control" id="color_name_edit" placeholder="Enter Color Name:">
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
                $j = 14;
            @endphp
            @foreach($sampla_tnas as $sampleKey => $tna)
            @php 
                $i++;
                $j++;
            @endphp
            <tr>
                <th style="padding: 3px !important" class="text-center" colspan="2">{{ $tna }}</th>
                <td style="padding: 3px !important" class="text-center">
                    <input type="date" class="form-control" name="{{ $sampleKey }}" id="{{ $sampleKey }}_edit" value="{{ explode('&', $data)[$i] }}">
                </td>
                <td style="padding: 3px !important" class="text-center"><input type="date" class="form-control" name="actual_{{ $sampleKey }}" id="actual_{{ $sampleKey }}_edit" value="{{  explode('&', $data)[$j] }}"></td>
            </tr>
            @endforeach
        </table>
    </div>
    {{-- <div class="col-md-3">
        <div class="form-group">
            <label for="second_fit_submission_edit">2nd Fit Submission Date</label>
            <input type="date" name="second_fit_submission_edit" value="{{ explode('&', $data)[2] }}" class="form-control" id="second_fit_submission_edit" placeholder="Enter Date:">
          </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="third_fit_submission_edit">3rd Fit Submission Date</label>
            <input type="date" name="third_fit_submission_edit" value="{{ explode('&', $data)[3] }}" class="form-control" id="third_fit_submission_edit" placeholder="3rd Fit Submission Date">
          </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="fit_approved_date_edit">Fit Approved Date</label>
            <input type="date" name="fit_approved_date_edit" value="{{ explode('&', $data)[4] }}" class="form-control" id="fit_approved_date_edit" placeholder="Fit Approved Date">
          </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="first_wash_sub_date_edit">1st Wash Sub Date</label>
            <input type="date" name="first_wash_sub_date_edit" value="{{ explode('&', $data)[5] }}" class="form-control" id="first_wash_sub_date_edit" placeholder="1st Wash Sub Date">
          </div>
    </div>
    <div class="col-md-3">
         <div class="form-group">
            <label for="second_wash_sub_date_edit">2nd Wash Sub Date</label>
            <input type="date" name="second_wash_sub_date_edit" value="{{ explode('&', $data)[6] }}" class="form-control" id="second_wash_sub_date_edit" placeholder="2nd Wash Sub Date">
          </div>
    </div>
    <div class="col-md-3">
         <div class="form-group">
            <label for="third_wash_sub_date_edit">3rd Wash Sub Date</label>
            <input type="date" name="third_wash_sub_date_edit" value="{{ explode('&', $data)[7] }}" class="form-control" id="third_wash_sub_date_edit" placeholder="2nd Wash Sub Date">
          </div>
    </div>
    <div class="col-md-3">
         <div class="form-group">
            <label for="wash_app_comm_rcv_date_edit">Wash Approved Date</label>
            <input type="date" name="wash_app_comm_rcv_date_edit" value="{{ explode('&', $data)[8] }}" class="form-control" id="wash_app_comm_rcv_date_edit" placeholder="2nd Wash Sub Date">
          </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="size_set_sub_date_edit">Size set sub date</label>
            <input type="date" name="size_set_sub_date_edit" value="{{ explode('&', $data)[9] }}" class="form-control" id="size_set_sub_date_edit" placeholder="Size set sub date">
          </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="size_set_rcv_date_edit">Size set receive date</label>
            <input type="date" name="size_set_rcv_date_edit" value="{{ explode('&', $data)[10] }}" class="form-control" id="size_set_rcv_date_edit" placeholder="Size set sub date">
          </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="first_pp_sub_date_edit">1st p.p sub date</label>
            <input type="date" name="first_pp_sub_date_edit" value="{{ explode('&', $data)[11] }}" class="form-control" id="first_pp_sub_date_edit" placeholder="1st p.p sub date">
          </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="second_pp_sub_date_edit">2nd p.p sub date</label>
            <input type="date" name="second_pp_sub_date_edit" value="{{ explode('&', $data)[12] }}" class="form-control" id="second_pp_sub_date_edit" placeholder="2nd p.p sub date:">
          </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="third_pp_sub_date_edit">3rd p.p sub date</label>
            <input type="date" name="third_pp_sub_date_edit" value="{{ explode('&', $data)[13] }}" class="form-control" id="third_pp_sub_date_edit" placeholder="2nd p.p sub date:">
          </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="pp_approved_date_edit">p.p aprroved date</label>
            <input type="date" name="pp_approved_date_edit" value="{{ explode('&', $data)[14] }}" class="form-control" id="pp_approved_date_edit" placeholder=">p.p aprroved comments recieve date">
          </div>
    </div> --}}
    
</div>