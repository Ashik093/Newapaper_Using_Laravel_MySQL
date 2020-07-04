<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class LanguageController extends Controller
{
    public function bangla()
    {
    	Session::get('lang');
    	session()->forget('lang');
    	session()->put('lang','Bangla');
    	return redirect()->back();
    }

    public function english()
    {
    	Session::get('lang');
    	session()->forget('lang');
    	session()->put('lang','English');
    	return redirect()->back();
    }
}
