<?php

namespace App\Http\Controllers\Organizer;

use App\Http\Controllers\Controller;
use App\Model\Organizer\Organizer;
use App\Model\Organizer\Packagesite;
use App\Services\Logdb;
use App\Services\SiteOrgCreate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SiteController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(SiteOrgCreate $siteOrgCreate,Logdb $logdb){
        $user = auth()->user();
        $organizer=Organizer::where('user_id',$user->id)->first();
        if(!$organizer){
            $organizer = $siteOrgCreate->makeSite($user);
        }
        if(request()->has('title')){

            if($organizer->Packagesite->id==1){
                $domain=str_replace('.','',request()->domain);
                $domain=$domain.'.'.env('APP_LTE');
                if($siteOrgCreate->checkDomain($domain,$user->id)){
                    return redirect()->back()->withErrors(['error' => __('info.duplicateDomain')]);
                }
            }
            $this->validate(request(), [
                'title' => 'required',
                'domain' => 'required|unique:organizers',
                'logo' => 'mimes:jpeg,png,jpg,gif',
            ]);
            if(isset($domain))
                $organizer->domain=$domain;
            else
                $organizer->domain=request()->domain;
            $organizer->title=request()->title;
            $organizer->description=request()->description;
            if(request()->has('logo')){
                $photoName = time() . '-' . uniqid() . '.' . request()->logo->getClientOriginalExtension();
                request()->logo->move(public_path('myup'), $photoName);
                $photoName =  '/myup/' . $photoName;
                $organizer->logo=$photoName;
            }
            $organizer->save();
            $logdb->sendLog('ORGANIZER_CHANGE_SITE_SETTING','کاربر تنظیمات سایت را ویرایش کرد',$user->id);
            return redirect(route('orgSite'))->with(['success' => __('info.saveChange')]);
        }

        if($organizer->Packagesite->id==1){
            $organizer->domain=str_replace('.'.env('APP_LTE'),'',$organizer->domain);
        }
        return view('organizer.site',compact('organizer','user'));
    }
    public function package(SiteOrgCreate $siteOrgCreate){
        $user = auth()->user();
        $organizer=Organizer::where('user_id',$user->id)->first();
        if(!$organizer){
            $organizer = $siteOrgCreate->makeSite($user);
        }
        $packages=Packagesite::where('isActive',1)->orderByRaw('sort ASC')->get();
        return view('organizer.package',compact('organizer','packages'));
    }
}
