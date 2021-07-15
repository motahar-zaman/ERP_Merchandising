<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2/10/2019
 * Time: 11:37 AM
 * created By Ahmed
 */

namespace App\Repositories;


use App\Grade;
use App\Hrm\AppraisalCategory;
use App\Hrm\Building;
use App\Hrm\CalendarCode;
use App\Hrm\City;
use App\Hrm\Company;
use App\Hrm\Country;
use App\Hrm\Department;
use App\Hrm\Designation;
use App\Hrm\District;
use App\Hrm\EmployeeType;
use App\Hrm\Floor;
use App\Hrm\LeaveCategory;
use App\Hrm\Line;
use App\Hrm\Nationality;
use App\Hrm\Section;
use App\Hrm\Shift;
use App\Hrm\ShiftGroup;
use App\Hrm\Status;
use App\Hrm\TransportLocation;
use App\Hrm\Unit;
use App\Hrm\WeeklyOff;
use App\Hrm\Employee;



class HrmRepository
{
    public function genders(){
        return [
            '1'=>'Male',
            '2'=> 'Female',
            '3'=> 'Others'
        ];
    }

    public function bloodGroup(){
        return [
            'O+' => 'O+',
            'O-' => 'O-',
            'A+' => 'A+',
            'A-' => 'A-',
            'B+' => 'B+',
            'B-' => 'B-',
            'AB+'=> 'AB+',
            'AB-'=>'AB-'
        ];
    }


    public function divisions(){
        return [
            '1'   => 'Barisal',
            '2' => 'Chittagong',
            '3'      => 'Dhaka',
            '4'     => 'Khulna',
            '5' => 'Mymensingh',
            '6'   => 'Rajshahi',
            '7'    => 'Rangpur',
            '8'     => 'Sylhet'
        ];
    }

    //List of education boards in bangladesh
    public function boards(){
        return [
            '1'=>'Barisal',
            '2'=>'Chittagong',
            '3'=>'Comilla',
            '4'=>'Dhaka',
            '5'=>'Dinajpur',
            '6'=>'Jessore',
            '7'=>'Rajshahi',
            '8'=>'Sylhet',
            '9'=>'Madrasah',
            '10'=>'Technical',
            '11'=>'DIBS(Dhaka)',
        ];
    }

    //List of year
    public function years(){
        return [
            '2019','2018','2017','2016','2015','2014','2013','2012','2011','2010',
            '2009', '2008','2007','2006','2005', '2004','2003','2002','2001','2000',
            '1999','1998', '1997','1996','1995','1994','1993','1992','1991','1990',
            '1989','1988','1987','1986','1985','1984','1983','1982','1981','1980'
        ];
    }

    //List of year
    public function subjects(){
        return [
            '1'=>'Science','2'=>'Commerce','3'=>'Arts',
        ];
    }


    public function maritalStatus(){
        return [
            '1'  => 'Married',
            '2'  => 'Widowed',
            '3'  => 'Separated',
            '4'  => 'Divorced',
            '5'  => 'Single'
        ];
    }

    public function religion(){
        return [
            '1'    =>'Islam',
            '2'    => 'Hinduism',
            '3'    => 'Buddhism',
            '4'    => 'Christianity',
            '5'    => 'Others'
        ];
    }

    //get all shift groups
    public function shiftGroups(){
        return ShiftGroup::query()->latest()->paginate(10);
    }

    //get all leave Categories
    public function leaveCategories(){
        return LeaveCategory::query()->latest()->paginate(10);
    }

    public function lines(){
        return Line::all()->where('name','<>','NA')->pluck('name','id');
    }

    //get all buildings
//    public function buildings(){
//        return Building::query()->latest()->paginate(10);
//    }

    //get all units to show after foreach...
    public function unitList(){
        return Unit::query()->latest()->paginate(10);
    }

    //get all units to show after without foreach ...
    public function units(){
        return Unit::all()->pluck('name','id');
    }

    //get all buildings to use from select option
    public function buildingList(){
        return Building::all()->pluck('name','id');
    }

    //get all buildings to use from select option
    public function floors(){
        return Floor::query()->latest()->paginate(10);
    }

    //get all buildings to use from select option
//    public function lines(){
//        return Line::query()->latest()->paginate(10);
//    }

//    public function linePluck(){
//        return Line::all()->pluck('name','id');
//    }

    //get all statuses
    public function statuses(){
        return Status::query()->latest()->paginate(10);
    }

    //get all statuses
    public function nationalities(){
        return Nationality::query()->latest()->paginate(10);
    }

    //get all grades list
    public function grades(){
        return Grade::query()->latest()->paginate(10);
    }


    //get all departments with pluck
    public function departments(){
        return Department::pluck('name','id');
    }

    //get all designations for select
    public function designations(){
        return Designation::all()->pluck('name','id');
    }

    public function designation_all(){
        return Designation::all();
    }

    //get all companies to show after foreach ...
    public function companies(){
        return Company::query()->latest()->paginate(10);
    }

    //get all companies to show after foreach ...
    public function employeeTypes(){
        return EmployeeType::query()->latest()->paginate(10);
    }

    //get all appraisalCategories to show after foreach ...
    public function appraisalCategories(){
        return AppraisalCategory::query()->latest()->paginate(10);
    }

    public function appraisals(){
        return AppraisalCategory::pluck('name','id');
    }

    //get all Calendar Code  to show after foreach ...
    public function calendarCodes(){
        return CalendarCode::query()->latest()->paginate(10);
    }

    public function calendar_codes_pluck(){
        return CalendarCode::pluck('name','id');
    }

    //get all countries Code  to show without foreach ...
    public function countries(){
        return Country::all()->pluck('name','id');
    }

    //get all countries Code  to show without foreach ...
    public function districts(){
        return District::all()->pluck('name','id');
    }


    public function cities(){
        return City::all()->pluck('name','id');
    }


    public function shift_group(){
        return ShiftGroup::pluck('name','id');
    }

    public function sections(){
        return Section::pluck('name','id');
    }

    public function WeeklyOff(){
        //return WeeklyOff::all()->pluck('name','id');
        return  [
            1=>'Friday',
            2=>'Saturday',
            3=>'Sunday',
            4=>'Monday',
            5=>'Tuesday',
            6=>'Wednesday',
            7=>'Thursday',
        ];
    }

    public function shifts(){
        return Shift::pluck('name','id');
    }

    public function leavecategories_pluck(){
        return LeaveCategory::pluck('name','id');
    }

    public function transportlocation(){
        return TransportLocation::pluck('name','id');
    }

    public function exams(){
        return ['1'=>'JSE','2'=>'JDC','3'=>'SSC','4'=>'DHAKIL','5'=>'HSC','6'=>'ALIM','7'=>'BBA Hons','8'=>'FAZIL','9'=>'MSC'];
    }

    public function exam_grades(){
        return [
            '1'=>'A+',
            '2'=>'A',
            '3'=>'A-',
            '4'=>'B',
            '5'=>'B-',
            '6'=>'C-',
            '7'=>'D',
            '8'=>'First Class',
            '9'=>'Second Class',
            '10'=>'First Division',
            '11'=>'Second Division',
            '12'=>'Other Grade',
        ];
    }

    public function employees(){
        return Employee::all()->where('status',1)->pluck('employee_no','id');
    }

    public function leave_categories(){
        return LeaveCategory::all()->pluck('name','id');
    }







}