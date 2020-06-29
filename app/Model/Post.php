<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable =['category_id','subcategory_id','division_id','district_id','author_id','title_en','title_bn','image','details_en','details_bn','tags_en','tags_bn','headline','first_section','first_section_thumbnail','bigthumbnail','post_date','post_month','post_year'];


    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
    	return $this->belongsTo(Subcategory::class);
    }

    public function division()
    {
    	return $this->belongsTo(Division::class);
    }

    public function district()
    {
    	return $this->belongsTo(District::class);
    }
}
