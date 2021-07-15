<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RawAttendance extends Model
{
    protected $table ='raw_attendances';


    protected $fillable = ['device','card','date','time'];
}
