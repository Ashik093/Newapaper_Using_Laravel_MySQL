<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['logo','address_bn','address_en','phone_en','phone_bn','email'];
}
