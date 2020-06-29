<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = ['division_id','name_en','name_bn','soft_delete'];

    public function division(){
    	return $this->belongsTo(Division::class);
    }
}
