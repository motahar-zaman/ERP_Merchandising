<?php

namespace App;

use App\Hrm\Department;
use App\Hrm\Employee;
use App\Hrm\EmployeeExperience;
use App\Hrm\EmployeeOffice;
use App\Hrm\Line;
use App\Hrm\Section;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{

    protected $fillable = [
        'employee_id',
        'empno',
        'shift_in_time',
        'shift_out_time',
        'in_time',
        'out_time',
        'ot',
        'extra_ot',
        'total_ot',
        'section_id',
        'line_id',
        'department_id',
        'designation_id',
        'employee_type_id',
        'unit_id',
        'leave_category_id',
        //'leave_id',
        'weekly_off_id',
        'employee_type_id',
        'manual_intime',
        'manual_outtime',
        'absent',
        'holiday',
        'present',
        'status',
        'late',
        'date',
    ];

    protected $table = 'attendances_new';

    protected $dates = ['join_date','date'];

    public function employee()
    {
        return $this->belongsTo(Employee::class,'employee_id');
    }

    public function employee_office()
    {
        return $this->belongsTo(EmployeeOffice::class,'employee_id','employee_id');
    }

    public function employeeExperience()
    {
        return $this->belongsTo(EmployeeExperience::class);
    }

    public function line()
    {
        return $this->belongsTo(Line::class);
    }

    public function section(){
        return $this->belongsTo(Section::class);
    }

    public function department(){
        return $this->belongsTo('App\Hrm\Department');
    }


}
