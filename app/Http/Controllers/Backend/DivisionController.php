<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Division;
use App\Model\District;

class DivisionController extends Controller
{
    public function __construct(){
		$this->middleware('auth:admin');
	}

    public function index(){
    	$divisions = Division::where('soft_delete',0)->get();
    	return view('backend.division.index',compact('divisions'));
    }

    public function store(Request $request){
    	$validatedData = $request->validate([
	        'name_en' => 'required|unique:divisions|max:255',
	        'name_bn' => 'required|unique:divisions|max:255',
    	]);

    	$division = new Division();

    	$division->name_en = $request->name_en;
    	$division->name_bn = $request->name_bn;

    	if ($division->save()) {
			$notification = array(
				'messege'=>'Division Successfully Added',
				'type'=>'success'
			);

			return Redirect()->route('division')->with($notification);
    	}else{
    		$notification = array(
				'messege'=>'Unsuccessful',
				'type'=>'error'
			);

			return Redirect()->route('division')->with($notification);
    	}
    }

    public function edit($id){
    	$division = Division::findOrFail($id);
    	return view('backend.division.edit',compact('division'));
    }

    public function update(Request $request,$id){
    	$validatedData = $request->validate([
	        'name_en' => 'required|max:255',
	        'name_bn' => 'required|max:255',
    	]);

    	$division = Division::find($id);

    	$division->name_en = $request->name_en;
    	$division->name_bn = $request->name_bn;

    	if ($division->save()) {
			$notification = array(
				'messege'=>'Division Successfully Updated',
				'type'=>'info'
			);

			return Redirect()->route('division')->with($notification);
    	}else{
    		$notification = array(
				'messege'=>'Unsuccessful',
				'type'=>'error'
			);

			return Redirect()->route('division')->with($notification);
    	}
    }

    public function softDelete($id){
    	$division=Division::find($id);
    	$division->soft_delete = 1;

    	if ($division->save()) {
			$notification = array(
				'messege'=>'Division Successfully Deleted',
				'type'=>'info'
			);

			return Redirect()->route('division')->with($notification);
    	}else{
    		$notification = array(
				'messege'=>'Unsuccessful',
				'type'=>'error'
			);

			return Redirect()->route('division')->with($notification);
    	}
    }

    public function recycleBin(){
        $divisions = Division::where('soft_delete','!=',0)->get();
        $districts = District::where('soft_delete','!=',0)->get();
        return view('backend.division.recycle',compact('divisions','districts'));
    }

    public function undoDelete($id){
        $division=Division::find($id);
        $division->soft_delete = 0;

        if ($division->save()) {
            $notification = array(
                'messege'=>'Division Successfully Retrieve',
                'type'=>'info'
            );

            return Redirect()->route('division.recycle.bin')->with($notification);
        }else{
            $notification = array(
                'messege'=>'Unsuccessful',
                'type'=>'error'
            );

            return Redirect()->route('division.recycle.bin')->with($notification);
        }
    }

    public function permanentDelete($id){
        $division=Division::find($id);
        
        if ($division->delete()) {
            $notification = array(
                'messege'=>'Division Permanently Deleted',
                'type'=>'warning'
            );

            return Redirect()->route('division.recycle.bin')->with($notification);
        }else{
            $notification = array(
                'messege'=>'Unsuccessful',
                'type'=>'error'
            );

            return Redirect()->route('division.recycle.bin')->with($notification);
        }
    }
}
