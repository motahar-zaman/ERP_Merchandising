<form action="#" method="post" id="efficiency_edit_form">
@csrf
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered">
            <tr>
                <th class="text-center">Day</th>
                <th class="text-center">Efficiency (%)</th>
            </tr>
            @foreach($efficiency as $eff)
            <tr>
                <td style="padding: 3px !important; width: 50% !important" class="text-center">
                    @if($eff->day == 1) 
                        {{$eff->day}}<sup>st</sup> Day
                    @elseif($eff->day == 2)
                        {{$eff->day}}<sup>nd</sup> Day
                    @elseif($eff->day == 3)
                        {{$eff->day}}<sup>rd</sup> Day
                    @else
                        {{$eff->day}}<sup>th</sup> Day
                    @endif
                </td>
                <td style="padding: 3px !important; width: 50% !important" class="text-center"><input style="text-align: center;" type="number" class="form-control efficiency_edit" name="efficiency_edit[]" id="efficiency_{{ $eff->id }}" value="{{  $eff->efficiency }}">
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    
</div>
</form>
