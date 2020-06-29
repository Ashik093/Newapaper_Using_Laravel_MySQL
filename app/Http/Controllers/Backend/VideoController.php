<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Video;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
    	$videos = Video::all();
    	return view('backend.gallery.video',compact('videos'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title_en' => 'required',
            'title_bn' => 'required',
            'type' => 'required',
            'embed_code' => 'required',
        ]);

        $video = new Video();
        $video->title_en = $request->title_en;
        $video->title_bn = $request->title_bn;
        $video->type = $request->type;
        $video->embed_code = $request->embed_code;
        

        if ($video->save()) {
            $notification = array(
                'messege'=>'Video Successfully Added',
                'type'=>'success'
            );

            return Redirect()->route('video.gallery')->with($notification);
        }else{
            $notification = array(
                'messege'=>'Unsuccessful',
                'type'=>'error'
            );

            return Redirect()->route('video.gallery')->with($notification);
        }

    }

    public function edit($id)
    {
        $video = Video::findOrFail($id);
        return view('backend.gallery.videoEdit',compact('video'));
    }

    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'title_en' => 'required',
            'title_bn' => 'required',
            'type' => 'required',
            'embed_code' => 'required',
        ]);

        $video = Video::find($id);
        $video->title_en = $request->title_en;
        $video->title_bn = $request->title_bn;
        $video->type = $request->type;
        $video->embed_code = $request->embed_code;
        

        if ($video->save()) {
            $notification = array(
                'messege'=>'Video Successfully Updated',
                'type'=>'success'
            );

            return Redirect()->route('video.gallery')->with($notification);
        }else{
            $notification = array(
                'messege'=>'Unsuccessful',
                'type'=>'error'
            );

            return Redirect()->route('video.gallery')->with($notification);
        }

    }

    public function delete($id)
    {
        $video = Video::find($id);

        if ($video->delete()) {
            $notification = array(
                'messege'=>'Video Successfully Deleted',
                'type'=>'info'
            );

            return Redirect()->route('video.gallery')->with($notification);
        }else{
            $notification = array(
                'messege'=>'Unsuccessful',
                'type'=>'error'
            );

            return Redirect()->route('video.gallery')->with($notification);
        }
    }
}
