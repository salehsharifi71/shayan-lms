<?php

namespace App\Http\Controllers;

use App\Model\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function articles(){
        $this->middleware('auth');
        $user = auth()->user();
        $articles=Blog::where('user_id',$user->id)->orderByRaw('id DESC')->paginate(15);
        return view('blog.articles',compact('articles','user'));
    }
    public function edit($id)
    {

        $this->middleware('auth');
        $user = auth()->user();
        if($id==0){
            $article=new Blog();
        }else{
            $article=Blog::where('user_id',$user->id)->where('id',$id)->firstOrFail();
        }
        return view('blog.articleEdit',compact('article','user','id'));
    }
}
