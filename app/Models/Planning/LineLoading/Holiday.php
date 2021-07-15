<?php

namespace App\Models\Planning\LineLoading;
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    protected $table = 'holidays';
    protected $primaryKey = 'id';

    protected $fillable = [
        'year',
        'date',
    ];

}