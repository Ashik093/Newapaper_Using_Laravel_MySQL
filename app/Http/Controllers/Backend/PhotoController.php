<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Photo;
use Image;

class PhotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
    	$photos = Photo::all();
    	return view('backend.gallery.photo',compact('photos'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title_en' => 'required',
            'title_bn' => 'required',
            'type' => 'required',
            'photo' => 'required',
        ]);

        $photo = new Photo();
        $photo->title_en = $request->title_en;
        $photo->title_bn = $request->title_bn;
        $photo->type = $request->type;
        $image = $request->photo;
        $image_name = date('dm').uniqid().'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(500,310)->save(public_path("/upload/photogallery/".$image_name));
        $photo->photo = "upload/photogallery/".$image_name;

        if ($photo->save()) {
            $notification = array(
                'messege'=>'Photo Successfully Added',
                'type'=>'success'
            );

            return Redirect()->route('photo.gallery')->with($notification);
        }else{
            $notification = array(
                'messege'=>'Unsuccessful',
                'type'=>'error'
            );

            return Redirect()->route('photo.gallery')->with($notification);
        }

    }

    public function delete($id)
    {
        $photo = Photo::find($id);
        unlink($photo->photo);

        if ($photo->delete()) {
            $notification = array(
                'messege'=>'Photo Successfully Deleted',
                'type'=>'info'
            );

            return Redirect()->route('photo.gallery')->with($notification);
        }else{
            $notification = array(
                'messege'=>'Unsuccessful',
                'type'=>'error'
            );

            return Redirect()->route('photo.gallery')->with($notification);
        }
    }

    public function edit($id)
    {
        $photo = Photo::findOrFail($id);
        return view('backend.gallery.photoEdit',compact('photo'));
    }

    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'title_en' => 'required',
            'title_bn' => 'required',
            'type' => 'required',
        ]);

        $photo = Photo::find($id);
        $photo->title_en = $request->title_en;
        $photo->title_bn = $request->title_bn;
        $photo->type = $request->type;

        $image = $request->photo;
        if ($image) {
            $image_name = date('dm').uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(500,310)->save(public_path("/upload/photogallery/".$image_name));
            
            unlink($photo->photo);
          
            $photo->photo = "upload/photogallery/".$image_name;
        }

        if ($photo->save()) {
            $notification = array(
                'messege'=>'Photo Successfully Updated',
                'type'=>'success'
            );

            return Redirect()->route('photo.gallery')->with($notification);
        }else{
            $notification = array(
                'messege'=>'Unsuccessful',
                'type'=>'error'
            );

            return Redirect()->route('photo.gallery')->with($notification);
        }

    }
}
