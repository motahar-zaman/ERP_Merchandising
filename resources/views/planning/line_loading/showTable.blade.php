<table class="table table-bordered" id="table">
    <tr>
        @php 
            $lineLoadings = lineLoading();

            $total_dates = count($line_loading['dates']);
            $start_year = date($line_loading['dates'][0]);
            $end_year = date($line_loading['dates'][$total_dates-1]);
            $end_year = date('Y-m-d',strtotime($end_year . "+1 days"));
            $period = new DatePeriod(
                 new DateTime($start_year),
                 new DateInterval('P1D'),
                 new DateTime($end_year)
            );
        @endphp
        <th colspan="18"></th>
        @foreach($period as $key => $element)
            <th>{{ $element->format('d/M') }} ({{ $element->format('Y') }})</th>
        @endforeach
    </tr>
    <tr>
        
        @foreach($lineLoadings as $value)
        <th>{{ $value }}</th>
        @endforeach
        <th>Target Efficiency <a title="Edit" onclick="editEfficiency()" class="btn bg-info btn-sm" role="button"><i class="fas fa-edit"></i></a></th>
        @foreach($period as $efficiencyKey => $element)
            <td id="{{ $element->format('Y-m-d') }}-efficiency">
                @if(isset($date_with_efficiency[$element->format('Y-m-d')]))
                    {{ $date_with_efficiency[$element->format('Y-m-d')] }} %
                @endif
            </td>
        @endforeach
        
    </tr>
    <tr>
        @foreach($lineLoadings as $key => $value)
        <td id="{{ $key }}_row">
            @if($key == 'with_percent') {{ $line_loading['with_percent'] }}
            @elseif($key == 'allot_qty') {{ $line_loading['allot_qty'] }}
            @elseif($key == 'manpower') {{ $line_loading['manpower'] }}
            @elseif($key == 'smv') {{ $line_loading['smv'] }}
            @elseif($key == 'avg_prod') {{ $line_loading['avg_prod'] }}
            @elseif($key == 'eff_avg') {{ $line_loading['eff_avg'] }} %
            @elseif($key == 'days_total') {{ $line_loading['days_total'] }}
            @elseif($key == 'avl_min_1') {{ $line_loading['avl_min_1'] }}
            @elseif($key == 'avl_min_2') {{ $line_loading['avl_min_2'] }}
            @endif
        </td>
        @endforeach
        <th>Target Output</th>
        @foreach($period as $outputKey => $element)
            <td id="{{ $element->format('Y-m-d') }}-output">
                @if(isset($date_with_output[$element->format('Y-m-d')]))
                    {{ $date_with_output[$element->format('Y-m-d')] }}
                @endif
            </td>
        @endforeach
    </tr>
    <tr>
        <td colspan="17"></td>
        <th>Cumulative Output</th>
        @php
            $total_cumulative = 0;
        @endphp
        @foreach($period as $cumulativeKey => $element)
            <td id="{{ $element->format('Y-m-d') }}-cumulative-output">
                @if(isset($date_with_output[$element->format('Y-m-d')]))
                    @php
                        $total_cumulative += $date_with_output[$element->format('Y-m-d')];
                    @endphp
                    {{ $total_cumulative }}
                @endif
            </td>
        @endforeach
    </tr>
</table>
<script type="text/javascript">
    function editEfficiency(){
            $.alert({
                 title: 'Edit Efficiency',
                 content: "url:{{url('line-loading-plan/edit-efficiency')}}",
                 animation: 'scale',
                 closeAnimation: 'bottom',
                 columnClass:"col-md-6 col-md-offset-3",
                 buttons: {
                   save: {
                     text: 'Save',
                     btnClass: 'btn-primary',
                     action: function(){
                        
                       $.ajax({
                           url: '{{ url('line-loading-plan/edit-efficiency') }}',
                           type: 'POST',
                           data: $('#efficiency_edit_form').serializeArray(),
                       })
                       .done(function(response) {
                            $('#line_loading_table').html(response);
                            for(i = 0; i< all_input_fields.length; i++){
                                if(i != 0 && i != 3 && i != 4 && i != 5){
                                    $('#'+all_input_fields[i]+'_row').html($('#'+all_input_fields[i]+'').val());
                                }else{
                                    $('#'+all_input_fields[i]+'_row').html($('#'+all_input_fields[i]+' option:selected').text());
                                }
                            }

                       });
                       
                       
                   }
                   },
                   close: {
                     text: 'Close',
                     btnClass: 'btn-default',
                   },
               }
           });
        }
</script>