<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Livetv;
use App\Model\Prayer;
use App\Model\Website;
use App\Model\Category;
use App\Model\Post;
use App\Model\Video;
use App\Model\Photo;

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
        $fourthCategory = Category::skip(3)->first();
        $fifthCategory = Category::skip(4)->first();
        $sixCategory = Category::skip(5)->first();
        $sevenCategory = Category::skip(6)->first();
        $eightCategory = Category::skip(7)->first();

    	$firstCategoryPostsBig = Post::where('category_id',$firstCategory->id)->where('bigthumbnail',1)->orderBy('id','DESC')->first();
    	$secondCategoryPostsBig = Post::where('category_id',$secondCategory->id)->where('bigthumbnail',1)->orderBy('id','DESC')->first();
    	$thirdCategoryPostsBig = Post::where('category_id',$thirdCategory->id)->where('bigthumbnail',1)->orderBy('id','DESC')->first();
        $fourthCategoryPostsBig = Post::where('category_id',$fourthCategory->id)->where('bigthumbnail',1)->orderBy('id','DESC')->first();
        $fifthCategoryPostsBig = Post::where('category_id',$fifthCategory->id)->where('bigthumbnail',1)->orderBy('id','DESC')->first();
        $sixCategoryPostsBig = Post::where('category_id',$sixCategory->id)->where('bigthumbnail',1)->orderBy('id','DESC')->first();
        $sevenCategoryPostsBig = Post::where('category_id',$sevenCategory->id)->where('bigthumbnail',1)->orderBy('id','DESC')->first();
        $eightCategoryPostsBig = Post::where('category_id',$eightCategory->id)->where('bigthumbnail',1)->orderBy('id','DESC')->first();

    	$firstCategoryPostsSmall = Post::where('category_id',$firstCategory->id)->where('bigthumbnail',Null)->orderBy('id','DESC')->limit(3)->get();
    	$secondCategoryPostsSmall = Post::where('category_id',$secondCategory->id)->where('bigthumbnail',Null)->orderBy('id','DESC')->limit(3)->get();
    	$thirdCategoryPostsSmall = Post::where('category_id',$thirdCategory->id)->where('bigthumbnail',Null)->orderBy('id','DESC')->limit(3)->get();
        $fourthCategoryPostsSmall = Post::where('category_id',$fourthCategory->id)->where('bigthumbnail',Null)->orderBy('id','DESC')->limit(3)->get();
        $fifthCategoryPostsSmall = Post::where('category_id',$fifthCategory->id)->where('bigthumbnail',Null)->orderBy('id','DESC')->limit(3)->get();
        $sixCategoryPostsSmall = Post::where('category_id',$sixCategory->id)->where('bigthumbnail',Null)->orderBy('id','DESC')->limit(3)->get();
        $sevenCategoryPostsSmall = Post::where('category_id',$sevenCategory->id)->where('bigthumbnail',Null)->orderBy('id','DESC')->limit(3)->get();
        $eightCategoryPostsSmall = Post::where('category_id',$eightCategory->id)->where('bigthumbnail',Null)->orderBy('id','DESC')->limit(3)->get();

        $countryBig = Post::whereNotNull('district_id')->orderBy('id','DESC')->first();
        $countryFirstSection = Post::whereNotNull('district_id')->orderBy('id','DESC')->skip(1)->limit(3)->get();
        $countrySecondSection = Post::whereNotNull('district_id')->orderBy('id','DESC')->skip(4)->limit(3)->get();

        $videoBig = Video::where('type',1)->orderBy('id','DESC')->first();
        $videoSmall = Video::where('type',0)->orderBy('id','DESC')->get();

        $photoBig = Photo::where('type',1)->orderBy('id','DESC')->first();
        $photoSmall = Photo::where('type',0)->orderBy('id','DESC')->get();

        $latest = Post::orderBy('id','DESC')->limit(8)->get();
        $popular = Post::inRandomOrder()->orderBy('id','DESC')->limit(8)->get();
        $highlyread = Post::inRandomOrder()->orderBy('id','ASC')->limit(8)->get();

    	return view('frontend.index',compact('livetv','prayer','websites','postbig','postsmalls','firstCategory','secondCategory','firstCategoryPostsBig','secondCategoryPostsBig','firstCategoryPostsSmall','secondCategoryPostsSmall','thirdCategory','thirdCategoryPostsBig','thirdCategoryPostsSmall','fourthCategory','fourthCategoryPostsBig','fourthCategoryPostsSmall','fifthCategory','fifthCategoryPostsBig','fifthCategoryPostsSmall','sixCategory','sixCategoryPostsBig','sixCategoryPostsSmall','sevenCategory','sevenCategoryPostsBig','sevenCategoryPostsSmall','eightCategory','eightCategoryPostsBig','eightCategoryPostsSmall','countryBig','countryFirstSection','countrySecondSection','videoBig','videoSmall','photoBig','photoSmall','latest','popular','highlyread'));
    }

    public function singlePost($id,$slug)
    {
        $post = Post::find($id);
        $relatedPost = Post::where('id','!=',$post->id)->where('category_id',$post->category_id)->orderBy('id','DESC')->limit(6)->get();

        $latest = Post::orderBy('id','DESC')->limit(8)->get();
        $popular = Post::inRandomOrder()->orderBy('id','DESC')->limit(8)->get();
        $highlyread = Post::inRandomOrder()->orderBy('id','ASC')->limit(8)->get();

        return view('frontend.singlepost',compact('post','relatedPost','latest','popular','highlyread'));
    }
}
