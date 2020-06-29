<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Subcategory;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
    	$categories = Category::where('soft_delete',0)->get();
    	return view('backend.category.index',compact('categories'));
    }

    public function store(Request $request){
    	$validatedData = $request->validate([
	        'name_en' => 'required|unique:categories|max:255',
	        'name_bn' => 'required|unique:categories|max:255',
    	]);

    	$category = new Category();

    	$category->name_en = $request->name_en;
    	$category->name_bn = $request->name_bn;

    	if ($category->save()) {
			$notification = array(
				'messege'=>'Category Successfully Added',
				'type'=>'success'
			);

			return Redirect()->route('category')->with($notification);
    	}else{
    		$notification = array(
				'messege'=>'Unsuccessful',
				'type'=>'error'
			);

			return Redirect()->route('category')->with($notification);
    	}
    }

    public function softDelete($id){
    	$category=Category::find($id);
    	$category->soft_delete = 1;

    	if ($category->save()) {
			$notification = array(
				'messege'=>'Category Successfully Deleted',
				'type'=>'info'
			);

			return Redirect()->route('category')->with($notification);
    	}else{
    		$notification = array(
				'messege'=>'Unsuccessful',
				'type'=>'error'
			);

			return Redirect()->route('category')->with($notification);
    	}
    }

    public function edit($id){
    	$category = Category::findOrFail($id);
    	return view('backend.category.edit',compact('category'));
    }

    public function update(Request $request,$id){
    	$validatedData = $request->validate([
	        'name_en' => 'required|max:255',
	        'name_bn' => 'required|max:255',
    	]);

    	$category = Category::find($id);

    	$category->name_en = $request->name_en;
    	$category->name_bn = $request->name_bn;

    	if ($category->save()) {
			$notification = array(
				'messege'=>'Category Successfully Updated',
				'type'=>'info'
			);

			return Redirect()->route('category')->with($notification);
    	}else{
    		$notification = array(
				'messege'=>'Unsuccessful',
				'type'=>'error'
			);

			return Redirect()->route('category')->with($notification);
    	}
    }

    public function recycleBin(){
    	$categories = Category::where('soft_delete','!=',0)->get();
        $subcategories = Subcategory::where('soft_delete','!=',0)->get();
    	return view('backend.category.recycle',compact('categories','subcategories'));
    }

    public function undoDelete($id){
    	$category=Category::find($id);
    	$category->soft_delete = 0;

    	if ($category->save()) {
			$notification = array(
				'messege'=>'Category Successfully Retrieve',
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
    	$category=Category::find($id);
    	
    	if ($category->delete()) {
			$notification = array(
				'messege'=>'Category Permanently Deleted',
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
}
