<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Admin;

class RoleController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth:admin');
    }

    public function index()
    {
    	$users = Admin::all();
    	return view('backend.user.all',compact('users'));
    }

    public function create()
    {
    	return view('backend.user.add');
    }

    public function store(Request $request)
    {
    	$validatedData = $request->validate([
	        'name' => 'required',
	        'email' => 'required|unique:admins',
	        'password' => 'required|min:8',
    	]);

    	$user = new Admin();

    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->password = Hash::make($request->password);
    	$user->type = $request->type;
    	$user->category = $request->category;
    	$user->division = $request->division;
    	$user->post = $request->post;
    	$user->setting = $request->setting;
    	$user->gallery = $request->gallery;
    	$user->ads = $request->ads;
    	$user->role = $request->role;

    	if ($user->type == 1) {
    		$user->category = 1;
	    	$user->division = 1;
	    	$user->post = 1;
	    	$user->setting = 1;
	    	$user->gallery = 1;
	    	$user->ads = 1;
	    	$user->role = 1;
    	}
    	


    	if ($user->save()) {
			$notification = array(
				'messege'=>'Writter Successfully Added',
				'type'=>'success'
			);

			return Redirect()->route('all.user')->with($notification);
    	}else{
    		$notification = array(
				'messege'=>'Unsuccessful',
				'type'=>'error'
			);

			return Redirect()->route('all.user')->with($notification);
    	}
    }

    public function edit($id)
    {
    	$row = Admin::find($id);
    	return view('backend.user.edit',compact('row'));
    }

    public function update(Request $request,$id)
    {
    	$validatedData = $request->validate([
	        'name' => 'required',
	        'email' => 'required',
    	]);

    	$user = Admin::find($id);

    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->type = $request->type;
    	$user->category = $request->category;
    	$user->division = $request->division;
    	$user->post = $request->post;
    	$user->setting = $request->setting;
    	$user->gallery = $request->gallery;
    	$user->ads = $request->ads;
    	$user->role = $request->role;

    	if ($user->type == 1) {
    		$user->category = 1;
	    	$user->division = 1;
	    	$user->post = 1;
	    	$user->setting = 1;
	    	$user->gallery = 1;
	    	$user->ads = 1;
	    	$user->role = 1;
    	}
    	


    	if ($user->save()) {
			$notification = array(
				'messege'=>'Writter Successfully Updated',
				'type'=>'success'
			);

			return Redirect()->route('all.user')->with($notification);
    	}else{
    		$notification = array(
				'messege'=>'Unsuccessful',
				'type'=>'error'
			);

			return Redirect()->route('all.user')->with($notification);
    	}
    }

    public function delete($id)
    {
    	$user = Admin::find($id);

    	if ($user->delete()) {
			$notification = array(
				'messege'=>'Writter Successfully Deleted',
				'type'=>'success'
			);

			return Redirect()->route('all.user')->with($notification);
    	}else{
    		$notification = array(
				'messege'=>'Unsuccessful',
				'type'=>'error'
			);

			return Redirect()->route('all.user')->with($notification);
    	}

    }
}
