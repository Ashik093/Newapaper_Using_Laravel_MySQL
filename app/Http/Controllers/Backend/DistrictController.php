<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\District;
use App\Model\Division;

class DistrictController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
    	$districts = District::where('soft_delete',0)->get();
    	$divisions = Division::where('soft_delete',0)->get();
    	return view('backend.district.index',compact('districts','divisions'));
    }

    public function store(Request $request){
    	$validatedData = $request->validate([
	        'name_en' => 'required|unique:districts|max:255',
	        'name_bn' => 'required|unique:districts|max:255',
	        'division_id' => 'required',
    	]);

    	$district = new District();

    	$district->name_en = $request->name_en;
    	$district->name_bn = $request->name_bn;
    	$district->division_id = $request->division_id;

    	if ($district->save()) {
			$notification = array(
				'messege'=>'District Successfully Added',
				'type'=>'success'
			);

			return Redirect()->route('district')->with($notification);
    	}else{
    		$notification = array(
				'messege'=>'Unsuccessful',
				'type'=>'error'
			);

			return Redirect()->route('district')->with($notification);
    	}
    }

    public function edit($id){
    	$divisions = Division::all();
    	$district = District::findOrFail($id);
    	return view('backend.district.edit',compact('divisions','district'));
    }

    public function update(Request $request,$id){
    	$validatedData = $request->validate([
	        'name_en' => 'required|max:255',
	        'name_bn' => 'required|max:255',
	        'division_id' => 'required',
    	]);

    	$district = District::find($id);

    	$district->name_en = $request->name_en;
    	$district->name_bn = $request->name_bn;
    	$district->division_id = $request->division_id;

    	if ($district->save()) {
			$notification = array(
				'messege'=>'District Successfully Updated',
				'type'=>'success'
			);

			return Redirect()->route('district')->with($notification);
    	}else{
    		$notification = array(
				'messege'=>'Unsuccessful',
				'type'=>'error'
			);

			return Redirect()->route('district')->with($notification);
    	}
    }

    public function softDelete($id){
    	$district=District::find($id);
    	$district->soft_delete = 1;

    	if ($district->save()) {
			$notification = array(
				'messege'=>'District Successfully Deleted',
				'type'=>'info'
			);

			return Redirect()->route('district')->with($notification);
    	}else{
    		$notification = array(
				'messege'=>'Unsuccessful',
				'type'=>'error'
			);

			return Redirect()->route('district')->with($notification);
    	}
    }

    public function undoDelete($id){
        $district=District::find($id);
        $district->soft_delete = 0;

        if ($district->save()) {
            $notification = array(
                'messege'=>'District Successfully Retrieve',
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
        $district=District::find($id);
        
        if ($district->delete()) {
            $notification = array(
                'messege'=>'District Permanently Deleted',
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
