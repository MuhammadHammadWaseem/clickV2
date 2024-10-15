<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Blog;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;


class WebController extends Controller
{
    public function lang($lang)
    {
        if (array_key_exists($lang, Config::get('languages'))) {
            Session::put('applocale', $lang);
        }
        return Redirect::back();
    }
    public function index()
    {
        return view('Website.home');
    }
    public function events()
    {
        return view('Website.events');
    }
    public function features()
    {
        return view('Website.features');
    }
    public function about()
    {
        return view('Website.about');
    }
    public function contact()
    {
        return view('Website.contact');
    }

    public function tutorial(){
        return view('Website.tutorial');
    }
    public function blog(){
        $latest_blogs = Blog::where('is_latest', 1)->latest()->take(6)->get();
        $trending_blogs = Blog::where('is_trending', 1)->latest()->take(2)->get();
        $popular_blogs = Blog::where('is_popular', 1)->latest()->take(3)->get();
        
        return view('Website.blogs', compact('latest_blogs', 'trending_blogs', 'popular_blogs'));
    }

    public function blogshow($slug){
        $blog = Blog::where('slug', $slug)->first();
        $latest_blogs = Blog::where('is_latest', 1)->latest()->take(6)->get();
        if($blog){
            return view('Website.blog.show', compact('blog','latest_blogs'));
        }else{
            return redirect()->route('blog.index');
        }

    }

    public function blogshowall(){
        // dd("dsadasd");
        $blogs = Blog::all();
        return view('Website.blog.allBlog', compact('blogs'));
    }
    public function blogsearch(Request $request)
    {
        // dd($request);
        $query = $request->input('query');
        if(empty($query)){
            $blogs = null;
            return response()->json($blogs);
        }
        $blogs = Blog::where('title', 'like', "%$query%")->get();
        return response()->json($blogs);
    }

    public function postcontact(Request $request)
	{

                Mail::to($request->email)->send(new ContactMail([
                    'subject' => $request->subject ,
                    'message' => $request->message ,
                    'name' => $request->name,
                    'email' => $request->email,
                ]));

	}
}

