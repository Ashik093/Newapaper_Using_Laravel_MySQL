<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Admin;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('backend.dashboard');
    }

    public function changepassword()
    {
        return view('backend.changepassword');
    }

    public function updatePassword(Request $request,$id){
        $validatedData = $request->validate([
            'password'=>'required|min:8',
            'confirmpassword'=>'required|min:8',
        ]);

        $admin = Admin::find($id);
        if ($request->password != $request->confirmpassword) {
            return redirect()->back()->with('messege','Password Not Match');
        }else{
            $admin->password = Hash::make($request->password);
            if ($admin->save()) {
                $notification = array(
                    'messege'=>'Password Successfully Updated',
                    'type'=>'info'
                );

                return Redirect()->route('admin.dashboard')->with($notification);
            }
        }
    }
     public function logout()
    {
         Auth::logout();
         return redirect()->to('/admin/login');
    }
}
