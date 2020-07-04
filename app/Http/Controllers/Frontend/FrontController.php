<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Livetv;
use App\Model\Prayer;
use App\Model\Website;
use App\Model\Post;

class FrontController extends Controller
{
    public function index()
    {
    	$livetv = Livetv::where('status',1)->first();
    	$prayer = Prayer::first();
    	$websites = Website::all();
    	$postbig = Post::where('first_section_thumbnail',1)->orderBy('id','DESC')->first();
    	$postsmalls = Post::where('first_section',1)->orderBy('id','DESC')->get();
    	return view('frontend.index',compact('livetv','prayer','websites','postbig','postsmalls'));
    }
}
