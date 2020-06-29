<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['photo','title_en','title_bn','type'];
}
