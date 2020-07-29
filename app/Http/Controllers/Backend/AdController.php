<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Ad;
use Image;

class AdController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth:admin');
    }

    public function index()
    {
    	$ads = Ad::all();
    	return view('backend.ads.all',compact('ads'));
    }

    public function create()
    {
    	return view('backend.ads.add');
    }

    public function store(Request $request)
    {
    	$validatedData = $request->validate([
	        'link' => 'required',
	        'type' => 'required',
    	]);

    	$ads = new Ad();

    	$ads->link = $request->link;
    	$ads->type = $request->type;

    	$image = $request->ads;

        $image_name = date('dm').uniqid().'.'.$image->getClientOriginalExtension();
        if ($ads->type == 0) {
        	Image::make($image)->resize(970,90)->save(public_path("/upload/ads/".$image_name));
        }else{
        	Image::make($image)->resize(500,500)->save(public_path("/upload/ads/".$image_name));
        }       
        $ads->ads = "upload/ads/".$image_name;

    	if ($ads->save()) {
			$notification = array(
				'messege'=>'Ads Successfully Added',
				'type'=>'success'
			);

			return Redirect()->route('all.ads')->with($notification);
    	}else{
    		$notification = array(
				'messege'=>'Unsuccessful',
				'type'=>'error'
			);

			return Redirect()->route('all.ads')->with($notification);
    	}
    }

    public function edit($id)
    {
    	$ads = Ad::find($id);
    	return view('backend.ads.edit',compact('ads'));
    }

    public function update(Request $request,$id)
    {
    	$validatedData = $request->validate([
	        'link' => 'required',
	        'type' => 'required',
    	]);

    	$ads = Ad::find($id);

    	$ads->link = $request->link;
    	$ads->type = $request->type;

    	$image = $request->ads;

    	if ($image) {
    		$image_name = date('dm').uniqid().'.'.$image->getClientOriginalExtension();
    		if ($ads->type == 0) {
    			Image::make($image)->resize(970,90)->save(public_path("/upload/ads/".$image_name));
    		}else{
    			Image::make($image)->resize(500,500)->save(public_path("/upload/ads/".$image_name));
    		}
    		unlink($ads->ads);  
    		$ads->ads = "upload/ads/".$image_name;	
    	}

    	if ($ads->save()) {
			$notification = array(
				'messege'=>'Ads Successfully Added',
				'type'=>'success'
			);

			return Redirect()->route('all.ads')->with($notification);
    	}else{
    		$notification = array(
				'messege'=>'Unsuccessful',
				'type'=>'error'
			);

			return Redirect()->route('all.ads')->with($notification);
    	}
    }

    public function delete($id)
    {
    	$ads = Ad::find($id);
    	unlink($ads->ads);
    	if ($ads->delete()) {
			$notification = array(
				'messege'=>'Ads Successfully deleted',
				'type'=>'success'
			);

			return Redirect()->route('all.ads')->with($notification);
    	}else{
    		$notification = array(
				'messege'=>'Unsuccessful',
				'type'=>'error'
			);

			return Redirect()->route('all.ads')->with($notification);
    	}

    }
}
