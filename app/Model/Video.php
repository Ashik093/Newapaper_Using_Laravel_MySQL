<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['title_en','title_bn','embed_code','type'];
}
