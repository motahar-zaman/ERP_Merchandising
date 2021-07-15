<div class="row">
   <div class="col-md-6">
        <div class="form-group">
            <label for="color_name_edit">Color Name</label>
            <input type="text" name="color_name_edit" value="{{ explode('&', $data)[0] }}" class="form-control" id="color_name_edit">
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
                $j = 9;
            @endphp
            @foreach($pre_production_tnas as $productionKey => $tna)
            @php 
                $i++;
                $j++;
            @endphp
            <tr>
                <th style="padding: 3px !important" class="text-center" colspan="2">{{ $tna }}</th>
                <td style="padding: 3px !important" class="text-center">
                    <input type="date" class="form-control" name="{{ $productionKey }}" id="{{ $productionKey }}_edit" value="{{ explode('&', $data)[$i] }}">
                </td>
                <td style="padding: 3px !important" class="text-center"><input type="date" class="form-control" name="actual_{{ $productionKey }}" id="actual_{{ $productionKey }}_edit" value="{{  explode('&', $data)[$j] }}"></td>
            </tr>
            @endforeach
        </table>
    </div>
   <div class="col-md-6">
        <div class="form-group">
            <label for="remarks_edit">Remarks</label>
            <input type="text" name="remarks_edit" value="{{ explode('&', $data)[19] }}" class="form-control" id="remarks_edit">
          </div>
    </div>
    
</div>