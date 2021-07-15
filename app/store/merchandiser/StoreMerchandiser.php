<?php

namespace App\store\merchandiser;

use Illuminate\Database\Eloquent\Model;

class StoreMerchandiser extends Model
{
    protected $fillable= ['merchandiser_id','merchandiser_name','merchandiser_address','merchandiser_phone','merchandiser_mobile','merchandiser_fax','merchandiser_email'];
}
