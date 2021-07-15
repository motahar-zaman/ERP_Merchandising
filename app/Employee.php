<?php

namespace App\Hrm;

use App\Attendance;
use App\Payroll\AdvanceLoan;
use App\Payroll\LoanPayment;
use App\Payroll\Salary;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Employee extends Model
{
    //protected $table = 'employees_wd';

    protected $dates = ['inactivedate'];

    //to retrieve dob as dd/mm/yyyy
    public function getDobAttribute($date)
    {
        if(Request::path() != 'device/store'){ // skip this process while uploading attendance file
            if($date != null){
                return Carbon::parse($date)->format('d-m-Y');
            }
        }
    }

    protected $fillable = [
        'employee_no','card_no','ename','bname','father', 'mother','husband', 'gender', 'dob',
        'marital_status', 'blood','religion', 'status','image', 'nid','passport_no', 'valid',
        'passport_status', 'identification', 'poi', 'inactivedate', 'activedate', 'status',
        ];


    public function office(){
        return $this->hasOne(EmployeeOffice::class);
    }

    public function section(){
        return $this->belongsTo('App\Hrm\Section');
    }

    public function appraisalcategory(){
        return $this->belongsTo('App\Hrm\AppraisalCategory');
    }

    public function calendarcode(){
        return $this->belongsTo('App\Hrm\CalendarCode');
    }

    public function city(){
        return $this->belongsTo('App\Hrm\City');
    }

    public function country(){
        return $this->belongsTo('App\Hrm\Country');
    }

    public function department(){
        return $this->belongsTo('App\Hrm\Department');
    }

    public function designation(){
        return $this->belongsTo('App\Hrm\Designation');
    }

    public function district(){
        return $this->belongsTo('App\Hrm\District');
    }

    public function employeetype(){
        return $this->belongsTo('App\Hrm\EmployeeType');
    }

    public function floor(){
        return $this->belongsTo('App\Hrm\Floor');
    }

    public function grade(){
        return $this->belongsTo(Grade::class);
    }

    public function leavecategory(){
        return $this->belongsTo('App\Hrm\LeaveCategory');
    }

    public function line(){
        return $this->belongsTo(Line::class);
    }

    public function nationality(){
        return $this->belongsTo('App\Hrm\Nationality');
    }


    public function shift(){
        return $this->belongsTo(Shift::class);
    }

    public function shiftgroup(){
        return $this->belongsTo('App\Hrm\ShiftGroup');
    }

    public function state(){
        return $this->belongsTo('App\Hrm\State');
    }

    public function status(){
        return $this->belongsTo('App\Hrm\Status');
    }

    public function transportlocation(){
        return $this->belongsTo('App\Hrm\TransportLocation');
    }

    public function unit(){
        return $this->belongsTo('App\Hrm\Unit');
    }

    public function weeklyoff(){
        return $this->belongsTo('App\Hrm\WeeklyOff');
    }

    public function educations(){
        return $this->hasMany('App\Hrm\EmployeeEducation');
    }

    public function short_courses(){
        return $this->hasMany('App\Hrm\EmployeeShortCourse');
    }

    public function trainings(){
        return $this->hasMany('App\Hrm\EmployeeTraining');
    }

    public function experiences(){
        return $this->hasMany('App\Hrm\EmployeeExperience');
    }

    public function familymembers(){
        return $this->hasMany('App\Hrm\EmployeeFamily');
    }

    public function earn_leave(){
        return $this->hasOne('App\Hrm\EmployeeEarnLeave','employee_id');
    }

    public function location(){
        return $this->hasOne('App\Hrm\EmployeeLocation','employee_id');
    }

    public function attendances(){
        return $this->hasMany(Attendance::class);
    }

    public function salaries(){
        return $this->hasMany(Salary::class,'employee_id');
    }

    public function leave(){
        return $this->hasMany(Leave::class,'employee_id');
    }

    public function advance_loan(){
        return $this->hasMany(AdvanceLoan::class,'employee_id');
    }
    public function loan_payments(){
        return $this->hasMany(LoanPayment::class,'employee_id');
    }



}
