<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Subcategory;
use App\Model\Category;

class SubcategoryController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
    	$subcategories = Subcategory::where('soft_delete',0)->get();
    	$categories = Category::where('soft_delete',0)->get();
    	return view('backend.subcategory.index',compact('subcategories','categories'));
    }

    public function store(Request $request){
    	$validatedData = $request->validate([
	        'name_en' => 'required|unique:categories|max:255',
	        'name_bn' => 'required|unique:categories|max:255',
	        'category_id' => 'required',
    	]);

    	$subcategory = new Subcategory();

    	$subcategory->name_en = $request->name_en;
    	$subcategory->name_bn = $request->name_bn;
    	$subcategory->category_id = $request->category_id;

    	if ($subcategory->save()) {
			$notification = array(
				'messege'=>'Sub Category Successfully Added',
				'type'=>'success'
			);

			return Redirect()->route('subcategory')->with($notification);
    	}else{
    		$notification = array(
				'messege'=>'Unsuccessful',
				'type'=>'error'
			);

			return Redirect()->route('subcategory')->with($notification);
    	}
    }

    public function softDelete($id){
    	$subcategory=Subcategory::find($id);
    	$subcategory->soft_delete = 1;

    	if ($subcategory->save()) {
			$notification = array(
				'messege'=>'Sub Category Successfully Deleted',
				'type'=>'info'
			);

			return Redirect()->route('subcategory')->with($notification);
    	}else{
    		$notification = array(
				'messege'=>'Unsuccessful',
				'type'=>'error'
			);

			return Redirect()->route('subcategory')->with($notification);
    	}
    }

    public function undoDelete($id){
    	$subcategory=Subcategory::find($id);
    	$subcategory->soft_delete = 0;

    	if ($subcategory->save()) {
			$notification = array(
				'messege'=>'Sub category Successfully Retrieve',
				'type'=>'info'
			);

			return Redirect()->route('category.recycle.bin')->with($notification);
    	}else{
    		$notification = array(
				'messege'=>'Unsuccessful',
				'type'=>'error'
			);

			return Redirect()->route('category.recycle.bin')->with($notification);
    	}
    }

    public function permanentDelete($id){
    	$subcategory=Subcategory::find($id);
    	
    	if ($subcategory->delete()) {
			$notification = array(
				'messege'=>'Sub Category Permanently Deleted',
				'type'=>'warning'
			);

			return Redirect()->route('category.recycle.bin')->with($notification);
    	}else{
    		$notification = array(
				'messege'=>'Unsuccessful',
				'type'=>'error'
			);

			return Redirect()->route('category.recycle.bin')->with($notification);
    	}
    }

    public function edit($id){
    	$categories = Category::all();
    	$subcategory = Subcategory::findOrFail($id);
    	return view('backend.subcategory.edit',compact('subcategory','categories'));
    }

    public function update(Request $request,$id){
    	$validatedData = $request->validate([
	        'name_en' => 'required|max:255',
	        'name_bn' => 'required|max:255',
	        'category_id' => 'required',
    	]);

    	$subcategory = Subcategory::find($id);

    	$subcategory->name_en = $request->name_en;
    	$subcategory->name_bn = $request->name_bn;
    	$subcategory->category_id = $request->category_id;

    	if ($subcategory->save()) {
			$notification = array(
				'messege'=>'Sub Category Successfully Updated',
				'type'=>'success'
			);

			return Redirect()->route('subcategory')->with($notification);
    	}else{
    		$notification = array(
				'messege'=>'Unsuccessful',
				'type'=>'error'
			);

			return Redirect()->route('subcategory')->with($notification);
    	}
    }
}
