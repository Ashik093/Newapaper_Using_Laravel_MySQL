<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Livetv;
use App\Model\Prayer;
use App\Model\Website;
use App\Model\Category;
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

    	$firstCategory = Category::first();
    	$secondCategory = Category::skip(1)->first();
    	$thirdCategory = Category::skip(2)->first();

    	$firstCategoryPostsBig = Post::where('category_id',$firstCategory->id)->where('bigthumbnail',1)->orderBy('id','DESC')->first();
    	$secondCategoryPostsBig = Post::where('category_id',$secondCategory->id)->where('bigthumbnail',1)->orderBy('id','DESC')->first();
    	$thirdCategoryPostsBig = Post::where('category_id',$thirdCategory->id)->where('bigthumbnail',1)->orderBy('id','DESC')->first();

    	$firstCategoryPostsSmall = Post::where('category_id',$firstCategory->id)->where('bigthumbnail',Null)->orderBy('id','DESC')->limit(3)->get();
    	$secondCategoryPostsSmall = Post::where('category_id',$secondCategory->id)->where('bigthumbnail',Null)->orderBy('id','DESC')->limit(3)->get();
    	$thirdCategoryPostsSmall = Post::where('category_id',$thirdCategory->id)->where('bigthumbnail',Null)->orderBy('id','DESC')->limit(3)->get();


    	return view('frontend.index',compact('livetv','prayer','websites','postbig','postsmalls','firstCategory','secondCategory','firstCategoryPostsBig','secondCategoryPostsBig','firstCategoryPostsSmall','secondCategoryPostsSmall','thirdCategory','thirdCategoryPostsBig','thirdCategoryPostsSmall'));
    }
}
