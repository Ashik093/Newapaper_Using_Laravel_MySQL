<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    protected $fillable = ['name_en','name_bn','url'];
}
