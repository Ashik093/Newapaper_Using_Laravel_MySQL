<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    protected $fillable = ['meta_author_en','meta_author_bn','meta_title_en','meta_title_bn','meta_keyword_en','meta_keyword_bn','meta_description_en','meta_description_bn','google_analytics','google_verifications','alexa_analytics'];
}
