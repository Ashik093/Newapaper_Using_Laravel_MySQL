<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Prayer extends Model
{
    protected $fillable = ['fajr_en','fajr_bn','johr_en','johr_bn','asor_en','asor_bn','magrib_en','magrib_bn','esha_en','esha_bn'];
}
