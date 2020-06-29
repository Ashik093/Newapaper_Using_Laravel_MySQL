<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Subcategory;
use App\Model\Division;
use App\Model\District;
use App\Model\Post;
use Image;
use Auth;

class PostController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $posts = Post::where('soft_delete',0)->get();
        return view('backend.post.index',compact('posts'));
    }

    public function create()
    {
    	$categories = Category::where('soft_delete',0)->get();
    	$divisions = Division::where('soft_delete',0)->get();
    	return view('backend.post.create',compact('categories','divisions'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'author_id' => 'required',
            'title_en' => 'required',
            'title_bn' => 'required',
            'details_en' => 'required',
            'details_bn' => 'required',
            'tags_en' => 'required',
            'tags_bn' => 'required'
        ]);

        $post = new Post();
        $post->category_id = $request->category_id;
        $post->subcategory_id = $request->subcategory_id;
        $post->division_id = $request->division_id;
        $post->district_id = $request->district_id;
        $post->author_id = Auth::user()->id;
        $post->title_en = $request->title_en;
        $post->title_bn = $request->title_bn;
        $post->details_en = $request->details_en;
        $post->details_bn = $request->details_bn;
        $post->tags_en = $request->tags_en;
        $post->tags_bn = $request->tags_bn;
        $post->headline = $request->headline;
        $post->first_section = $request->first_section;
        $post->first_section_thumbnail = $request->first_section_thumbnail;
        $post->bigthumbnail = $request->bigthumbnail;
        $post->post_date = date('d-m-Y');
        $post->post_month = date('F');
        $post->post_year = date('Y');

        $image = $request->image;
        if ($image) {
            $image_name = date('dm').uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(500,310)->save(public_path("/upload/post/".$image_name));
            $post->image = "upload/post/".$image_name;
        }

        if ($post->save()) {
            $notification = array(
                'messege'=>'Post Successfully Added',
                'type'=>'success'
            );

            return Redirect()->route('all.post')->with($notification);
        }else{
            $notification = array(
                'messege'=>'Unsuccessful',
                'type'=>'error'
            );

            return Redirect()->route('add.post')->with($notification);
        }

    }

    public function edit($id)
    {
        $post = Post::where('soft_delete',0)->where('id',$id)->first();
        $categories = Category::where('soft_delete',0)->get();
        $subcategories = Subcategory::where('soft_delete',0)->get();
        $divisions = Division::where('soft_delete',0)->get();  
        $districts = District::where('soft_delete',0)->get();  
        return view('backend.post.edit',compact('post','categories','divisions','subcategories','districts'));
    }


    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'author_id' => 'required',
            'title_en' => 'required',
            'title_bn' => 'required',
            'details_en' => 'required',
            'details_bn' => 'required',
            'tags_en' => 'required',
            'tags_bn' => 'required'
        ]);

        $post = Post::find($id);
        $post->category_id = $request->category_id;
        $post->subcategory_id = $request->subcategory_id;
        $post->division_id = $request->division_id;
        $post->district_id = $request->district_id;
        $post->author_id = Auth::user()->id;
        $post->title_en = $request->title_en;
        $post->title_bn = $request->title_bn;
        $post->details_en = $request->details_en;
        $post->details_bn = $request->details_bn;
        $post->tags_en = $request->tags_en;
        $post->tags_bn = $request->tags_bn;
        $post->headline = $request->headline;
        $post->first_section = $request->first_section;
        $post->first_section_thumbnail = $request->first_section_thumbnail;
        $post->bigthumbnail = $request->bigthumbnail;

        $image = $request->image;
        if ($image) {
            $image_name = date('dm').uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(500,310)->save(public_path("/upload/post/".$image_name));
            if ($post->image) {
                unlink($post->image);
            }
            $post->image = "upload/post/".$image_name;
        }

        if ($post->save()) {
            $notification = array(
                'messege'=>'Post Successfully Updated',
                'type'=>'success'
            );

            return Redirect()->route('all.post')->with($notification);
        }else{
            $notification = array(
                'messege'=>'Unsuccessful',
                'type'=>'error'
            );

            return Redirect()->route('all.post')->with($notification);
        }

    }

    public function recycleBin()
    {
        $posts = Post::where('soft_delete',1)->get();
        return view('backend.post.recycle',compact('posts'));
    }


    public function softDelete($id)
    {
        $post = Post::find($id);
        $post->soft_delete = 1;
        if ($post->save()) {
            $notification = array(
                'messege'=>'Post Successfully Deleted',
                'type'=>'info'
            );

            return Redirect()->route('all.post')->with($notification);
        }else{
            $notification = array(
                'messege'=>'Unsuccessful',
                'type'=>'error'
            );

            return Redirect()->route('all.post')->with($notification);
        }
    }

    public function retrieve($id)
    {
        $post = Post::find($id);
        $post->soft_delete = 0;
        if ($post->save()) {
            $notification = array(
                'messege'=>'Post Successfully Retrieved',
                'type'=>'info'
            );

            return Redirect()->route('post.recycle')->with($notification);
        }else{
            $notification = array(
                'messege'=>'Unsuccessful',
                'type'=>'error'
            );

            return Redirect()->route('post.recycle')->with($notification);
        }
    }

    public function parmanentDelete($id)
    {
        $post = Post::find($id);
        if ($post->image) {
            unlink($post->image);
        }
        if ($post->delete()) {
            $notification = array(
                'messege'=>'Post Successfully Deleted',
                'type'=>'info'
            );

            return Redirect()->route('post.recycle')->with($notification);
        }else{
            $notification = array(
                'messege'=>'Unsuccessful',
                'type'=>'error'
            );

            return Redirect()->route('post.recycle')->with($notification);
        }
    }


    //multiple dependency
    public function getSubcategory($category_id)
    {
    	$subcategories = Subcategory::where('soft_delete',0)->where('category_id',$category_id)->get();
    	return response()->json($subcategories);
    }

    public function getDistrict($division_id)
    {
    	$districts = District::where('soft_delete',0)->where('division_id',$division_id)->get();
    	return response()->json($districts);
    }
}
