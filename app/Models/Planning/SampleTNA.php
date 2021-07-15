<?php

namespace App\Models\Planning;

use Illuminate\Database\Eloquent\Model;

class SampleTNA extends Model
{
	protected $table = 'sample_tna';
	protected $primaryKey = 'id';

	protected $fillable = [
        'order_summary_style',
        'color_name',
        'first_fit_submission',
        'second_fit_submission',
        'third_fit_submission',
        'fit_approved_date',
        'first_wash_sub_date',
        'second_wash_sub_date',
        'third_wash_sub_date',
        'wash_app_comm_rcv_date',
        'size_set_sub_date',
        'size_set_rcv_date',
        'first_pp_sub_date',
        'second_pp_sub_date',
        'third_pp_sub_date',
        'pp_approved_date',

        'actual_first_fit_submission',
        'actual_second_fit_submission',
        'actual_third_fit_submission',
        'actual_fit_approved_date',
        'actual_first_wash_sub_date',
        'actual_second_wash_sub_date',
        'actual_third_wash_sub_date',
        'actual_wash_app_comm_rcv_date',
        'actual_size_set_sub_date',
        'actual_size_set_rcv_date',
        'actual_first_pp_sub_date',
        'actual_second_pp_sub_date',
        'actual_third_pp_sub_date',
        'actual_pp_approved_date',
    ];
	
    public function summary()
    {
        return $this->hasOne(OrderSummary::class,'id', 'order_summary_style');
    }
}
