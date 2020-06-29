<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Social;
use App\Model\Seo;
use App\Model\Prayer;
use App\Model\Livetv;
use App\Model\Notice;
use App\Model\Website;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function social()
    {
    	$social = Social::first();
    	return view('backend.setting.social',compact('social'));
    }

    public function updateSocialLink(Request $request,$id)
    {
    	$social = Social::find($id);
    	$social->facebook = $request->facebook;
    	$social->tweter = $request->tweter;
    	$social->instagram = $request->instagram;
    	$social->youtube = $request->youtube;

    	if ($social->save()) {
			$notification = array(
				'messege'=>'Social Link Successfully Updated',
				'type'=>'info'
			);

			return Redirect()->route('social.link')->with($notification);
    	}else{
    		$notification = array(
				'messege'=>'Unsuccessful',
				'type'=>'error'
			);

			return Redirect()->route('social.link')->with($notification);
    	}
    }

    public function seo()
    {
        $seo = Seo::first();
        return view('backend.setting.seo',compact('seo'));
    }

    public function updateSeo(Request $request,$id)
    {
        $seo = Seo::find($id);
        $seo->meta_author_en = $request->meta_author_en;
        $seo->meta_author_bn = $request->meta_author_bn;
        $seo->meta_title_en = $request->meta_title_en;
        $seo->meta_title_bn = $request->meta_title_bn;
        $seo->meta_keyword_en = $request->meta_keyword_en;
        $seo->meta_keyword_bn = $request->meta_keyword_bn;
        $seo->meta_description_en = $request->meta_description_en;
        $seo->meta_description_bn = $request->meta_description_bn;
        $seo->google_analytics = $request->google_analytics;
        $seo->google_verifications = $request->google_verifications;
        $seo->alexa_analytics = $request->alexa_analytics;

        if ($seo->save()) {
            $notification = array(
                'messege'=>'Seo Successfully Updated',
                'type'=>'info'
            );

            return Redirect()->route('seo')->with($notification);
        }else{
            $notification = array(
                'messege'=>'Unsuccessful',
                'type'=>'error'
            );

            return Redirect()->route('seo')->with($notification);
        }
    }

    public function prayer()
    {
        $prayer = Prayer::first();
        return view('backend.setting.prayer',compact('prayer'));
    }

    public function updatePrayer(Request $request,$id)
    {
        $prayer = Prayer::find($id);
        $prayer->fajr_en = $request->fajr_en;
        $prayer->fajr_bn = $request->fajr_bn;
        $prayer->johr_en = $request->johr_en;
        $prayer->johr_bn = $request->johr_bn;
        $prayer->asor_en = $request->asor_en;
        $prayer->asor_bn = $request->asor_bn;
        $prayer->magrib_en = $request->magrib_en;
        $prayer->magrib_bn = $request->magrib_bn;
        $prayer->esha_en = $request->esha_en;
        $prayer->esha_bn = $request->esha_bn;


        if ($prayer->save()) {
            $notification = array(
                'messege'=>'Prayer Time Successfully Updated',
                'type'=>'info'
            );

            return Redirect()->route('prayer')->with($notification);
        }else{
            $notification = array(
                'messege'=>'Unsuccessful',
                'type'=>'error'
            );

            return Redirect()->route('prayer')->with($notification);
        }
    }

    public function liveTV()
    {
        $livetv = Livetv::first();
        return view('backend.setting.livetv',compact('livetv'));
    }

    public function updateLivetv(Request $request,$id)
    {
        $livetv = Livetv::find($id);
        $livetv->embed_code = $request->embed_code;


        if ($livetv->save()) {
            $notification = array(
                'messege'=>'Live TV Successfully Updated',
                'type'=>'info'
            );

            return Redirect()->route('live.tv')->with($notification);
        }else{
            $notification = array(
                'messege'=>'Unsuccessful',
                'type'=>'error'
            );

            return Redirect()->route('live.tv')->with($notification);
        }
    }

    public function deactiveLivetv($id)
    {
        $livetv = Livetv::find($id);
        $livetv->status = 0;


        if ($livetv->save()) {
            $notification = array(
                'messege'=>'Live TV Status Successfully Updated',
                'type'=>'info'
            );

            return Redirect()->route('live.tv')->with($notification);
        }else{
            $notification = array(
                'messege'=>'Unsuccessful',
                'type'=>'error'
            );

            return Redirect()->route('live.tv')->with($notification);
        }
    }
    
    public function activeLivetv($id)
    {
        $livetv = Livetv::find($id);
        $livetv->status = 1;


        if ($livetv->save()) {
            $notification = array(
                'messege'=>'Live TV Status Successfully Updated',
                'type'=>'info'
            );

            return Redirect()->route('live.tv')->with($notification);
        }else{
            $notification = array(
                'messege'=>'Unsuccessful',
                'type'=>'error'
            );

            return Redirect()->route('live.tv')->with($notification);
        }
    }

    public function notice()
    {
        $notice = Notice::first();
        return view('backend.setting.notice',compact('notice'));
    }

    public function updateNotice(Request $request,$id)
    {
        $notice = Notice::find($id);
        $notice->notice = $request->notice;


        if ($notice->save()) {
            $notification = array(
                'messege'=>'Notice Successfully Updated',
                'type'=>'info'
            );

            return Redirect()->route('notice')->with($notification);
        }else{
            $notification = array(
                'messege'=>'Unsuccessful',
                'type'=>'error'
            );

            return Redirect()->route('notice')->with($notification);
        }
    }

    public function deactiveNotice($id)
    {
        $notice = Notice::find($id);
        $notice->status = 0;


        if ($notice->save()) {
            $notification = array(
                'messege'=>'Live TV Status Successfully Updated',
                'type'=>'info'
            );

            return Redirect()->route('notice')->with($notification);
        }else{
            $notification = array(
                'messege'=>'Unsuccessful',
                'type'=>'error'
            );

            return Redirect()->route('notice')->with($notification);
        }
    }
    
    public function activeNotice($id)
    {
        $notice = Notice::find($id);
        $notice->status = 1;


        if ($notice->save()) {
            $notification = array(
                'messege'=>'Notice Status Successfully Updated',
                'type'=>'info'
            );

            return Redirect()->route('notice')->with($notification);
        }else{
            $notification = array(
                'messege'=>'Unsuccessful',
                'type'=>'error'
            );

            return Redirect()->route('notice')->with($notification);
        }
    }

    public function importantWebsite()
    {
        $websites = Website::all();
        return view('backend.setting.website',compact('websites'));
    }

    public function storeWebsite(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'url' => 'required|unique:websites',
        ]);
        $website = new Website();
        $website->name = $request->name;
        $website->url = $request->url;

        if ($website->save()) {
            $notification = array(
                'messege'=>'Website Successfully Inerted',
                'type'=>'info'
            );

            return Redirect()->route('website')->with($notification);
        }else{
            $notification = array(
                'messege'=>'Unsuccessful',
                'type'=>'error'
            );

            return Redirect()->route('website')->with($notification);
        }
    }

    public function websiteDelete($id)
    {
        $website = Website::find($id);

        if ($website->delete()) {
            $notification = array(
                'messege'=>'Website Successfully deleted',
                'type'=>'info'
            );

            return Redirect()->route('website')->with($notification);
        }else{
            $notification = array(
                'messege'=>'Unsuccessful',
                'type'=>'error'
            );

            return Redirect()->route('website')->with($notification);
        }
    }

    public function editWebsite($id)
    {
        $website = Website::findOrFail($id);
        return view('backend.setting.editWebsite',compact('website'));
    }

    public function updateWebsite(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'url' => 'required',
        ]);
        $website = Website::find($id);
        $website->name = $request->name;
        $website->url = $request->url;

        if ($website->save()) {
            $notification = array(
                'messege'=>'Website Successfully Updated',
                'type'=>'info'
            );

            return Redirect()->route('website')->with($notification);
        }else{
            $notification = array(
                'messege'=>'Unsuccessful',
                'type'=>'error'
            );

            return Redirect()->route('website')->with($notification);
        }
    }


}
