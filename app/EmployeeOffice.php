<?php

namespace App\Hrm;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class EmployeeOffice extends Model
{
    protected $fillable = [
        'employee_id','department_id','section_id','line_id',
        'designation_id', 'employee_type_id', 'grade_id','shift_id', 'shift_group_id',
        'calendar_code_id', 'weekly_off', 'join_date', 'confirm_date','provision_period',
        'leave_category_id', 'allowance', 'gross', 'fixed', 'modified_desc', 'modified_by',
        'modified_on', 'work_entitle', 'tds','ot', 'transport_entitled', 'transport_amnt',
        'transport_location','transport_location_id','medical_entitle','medical_amnt',
        'house_rent_entitle', 'house_rent_amnt', 'other_allow_entitle', 'other_allow_amount',
        'bank_id','cost_center', 'account_no', 'tin_no', 'termination_date', 'resigned_date',
        'reason','unit_id','floor_id'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function section()
    {
        return $this->belongsTo('App\Hrm\Section');
    }


    //protected $dates = ['join_date'];

//    public function getJoinDateAttribute($date)
//    {
//        return Carbon::parse($date);
//    }

//    public function setJoinDateAttribute($date)
//    {
//        $this->attributes['join_date'] = Carbon::parse($date)->format('Y-m-d');
//    }

    public function designation()
    {
        return $this->belongsTo('App\Hrm\Designation');
    }

    public function employee_type()
    {
        return $this->belongsTo('App\Hrm\EmployeeType');
    }

    public function unit()
    {
        return $this->belongsTo('App\Hrm\Unit');
    }

    public function department()
    {
        return $this->belongsTo('App\Hrm\Department');
    }

    public function line()
    {
        return $this->belongsTo('App\Hrm\Line');
    }

    public function calendar_code()
    {
        return $this->belongsTo('App\Hrm\CalendarCode');
    }

    public function shift_group()
    {
        return $this->belongsTo('App\Hrm\ShiftGroup');
    }

    public function leave_category(){
        return $this->belongsTo('App\Hrm\LeaveCategory');
    }

    /**
     * An employee is belongs to a shift
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }

    //text purpose
    public function location()
    {
        return $this->belongsTo(TransportLocation::class,'transport_location_id');
    }

//    public function employees(){
//        return $this->belongsTo(Employee::class);
//    }
//


}
