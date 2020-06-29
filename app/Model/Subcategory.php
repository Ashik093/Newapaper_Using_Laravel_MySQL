<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = ['category_id','name_en','name_bn','soft_delete'];

    public function category(){
    	return $this->belongsTo(Category::class);
    }
}
