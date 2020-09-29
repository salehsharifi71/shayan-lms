<?php

namespace App\Http\Controllers;

use App\Model\Blog;
use App\Services\MainService;
use App\Services\StringService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //

    public function articles(){
        $user = auth()->user();
        $articles=Blog::where('user_id',$user->id)->orderByRaw('id DESC')->paginate(15);
        return view('blog.articles',compact('articles','user'));
    }
    public function edit($id)
    {
        $user = auth()->user();
        if($id==0){
            $article=new Blog();
        }else{
            $article=Blog::where('user_id',$user->id)->where('id',$id)->firstOrFail();
        }
        if(request()->has('title')){
            $mainService=new MainService();
            $this->validate(request(), [
                'title' => 'required',
                'description' => 'required',
                'publishDate' => 'required',
                'thumb' => 'mimes:jpeg,png,jpg,gif'
            ]);
            $pdate=explode(" ",request()->publishDate);
            if(strlen($pdate[1])<3){
                $sTime= "09:00";
            }else{
                $sTime= $mainService->convertNumbersToEnglish($pdate[1]);
            }

            $publishDate = \Morilog\Jalali\CalendarUtils::createCarbonFromFormat('Y/m/d H:i', $mainService->convertNumbersToEnglish($pdate[0]).' '.$sTime);
            $article->title=request()->title;
            $article->description=request()->description;
            $article->meta_description=request()->meta_description;
            $article->created_at=$publishDate;
            $article->user_id=$user->id;
            if($user->role==10)
                $article->organizer_id=0;
            else
                $article->organizer_id=$user->Organizer->id;
            if (request()->has('thumb')) {
                $photoName = time() . '-' . uniqid() . '.' . request()->thumb->getClientOriginalExtension();
                request()->thumb->move(public_path('myup'), $photoName);
                $photoName = '/myup/' . $photoName;
                $article->thumb = $photoName;
            }
            $article->save();
            return redirect(route('articles'))->with(['success' => __('info.saveChange')]);

        }
        return view('blog.articleEdit',compact('article','user','id'));
    }
}
