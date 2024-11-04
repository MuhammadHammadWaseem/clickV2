<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Carbon\Carbon;
use App\Models\Blog;
use App\Models\User;
use App\Mail\ContactMail;
use App\Mail\RecoverSent;
use App\Mail\RegisterMail;
use Illuminate\Http\Request;
use App\Jobs\RecoverEmailJob;
use App\Jobs\RegisterEmailJob;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Event;
use App\Models\EventType;



class WebController extends Controller
{
    public function lang($lang)
    {
        //    Validate the requested language
        if (!in_array($lang, ['en', 'fr'])) {
            abort(400); // Bad request if language is not supported
        }

        // Set the application locale
        App::setLocale($lang);

        // Store the language in session for future requests
        Session::put('locale', $lang);

        // Redirect back to the previous page
        // if (array_key_exists($lang, Config::get('languages'))) {
        //     Session::put('applocale', $lang);
        // }
        return Redirect::back();
    }
    public function index()
    {
        $templates = Template::inRandomOrder()->take(10)->get();
        return view('Website.home', compact('templates'));
    }

    public function register()
    {
        return view('Website.auth.register');
    }
    public function events()
    {
        return view('Website.events');
    }
    public function getEvents($id)
    {
        $type = EventType::where('id_eventtype', $id)->first();
        $templates = DB::table('templates')->where('type_id', $id)->get();
        return view('Website.showEvents', compact('templates', 'type'));
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

    public function tutorial()
    {
        return view('Website.tutorial');
    }
    public function blog()
    {
        $latest_blogs = Blog::where('is_latest', 1)->latest()->take(6)->get();
        $trending_blogs = Blog::where('is_trending', 1)->latest()->take(2)->get();
        $popular_blogs = Blog::where('is_popular', 1)->latest()->take(3)->get();

        return view('Website.blogs', compact('latest_blogs', 'trending_blogs', 'popular_blogs'));
    }

    public function blogshow($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        $latest_blogs = Blog::where('is_latest', 1)->latest()->take(6)->get();
        if ($blog) {
            return view('Website.blog.show', compact('blog', 'latest_blogs'));
        } else {
            return redirect()->route('web.blog.index');
        }

    }

    public function blogshowall()
    {
        // dd("dsadasd");
        $blogs = Blog::all();
        return view('Website.blog.allBlog', compact('blogs'));
    }
    public function blogsearch(Request $request)
    {
        // dd($request);
        $query = $request->input('query');
        if (empty($query)) {
            $blogs = null;
            return response()->json($blogs);
        }
        $blogs = Blog::where('title', 'like', "%$query%")->get();
        return response()->json($blogs);
    }

    public function postcontact(Request $request)
    {

        Mail::to("hw13604@gmail.com")->send(new ContactMail([
            'subject' => $request->subject,
            'message' => $request->message,
            'name' => $request->name,
            'email' => $request->email,
        ]));

    }


    public function register_store(Request $request)
    {
        // Check if the email already exists
        $result1 = User::where('email', $request->emailreg)->first();

        if ($result1 != null) {
            return 2; // Email already exists
        } else {
            // Get the user's IP address
            $ip = '';

            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }

            // Set trial expiration date (5 days from now)
            $current = Carbon::now()->addDays(5);
            $dateExp = $current->format('Y-m-d');

            // Create a new user
            $user = new User;
            $user->name = $request->firstnamereg;
            $user->surname = $request->surnamereg;
            $user->email = $request->emailreg;
            $user->phone = $request->phonereg;
            $user->role = 1;
            $user->confirmation_code = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'), 0, 20);
            $user->language = '';
            $user->active = 0;
            $user->password = password_hash($request->passwordreg, PASSWORD_DEFAULT);
            $user->ip = $ip;
            $user->trail = 1;
            $user->trail_date = $dateExp;

            // Save the user to the database
            $user->save();

            // Dispatch the RegisterEmailJob to send the email asynchronously
            RegisterEmailJob::dispatch([
                'email' => $user->email,
                'confirmation_code' => $user->confirmation_code
            ]);

            return 1; // Registration successful
        }
    }
    public function success()
    {
        return view('Website.auth.success');
    }

    public function login()
    {
        return view('Website.auth.login');
    }

    public function login_success(Request $request)
    {
        if ($request->has('email') && $request->has('password')) {
            $result = User::where('email', '=', $request->email)->first();
            if ($result && password_verify($request->password, $result->password) && $result->active == 1) {
                Auth::login($result, false);
                return 1;
            } elseif ($result && password_verify($request->password, $result->password) && $result->active == 0) {
                Mail::to($result->email)->send(new RegisterMail($result->confirmation_code));
                return 2;
            } else
                return 0;
        } else
            return 0;
    }

    public function confirm(Request $request)
    {

        $user = User::where('confirmation_code', $request->route('code'))->first();
        if ($user) {
            $user->active = 1;
            $user->save();
            return view('Website.auth.confirm');
        } else
            return '';
    }

    public function reset(Request $req)
    {
        $eventList = DB::table('event_type')->get();
        return view('Website.auth.reset');
    }

    public function dorecover(Request $request)
    {
        if ($request->has('emailrec')) {
            $result = User::select('confirmation_code')->where('email', '=', $request->emailrec)->first();

            if ($result) {
                $details = [
                    'email' => $request->emailrec,
                    'confirmation_code' => $result->confirmation_code,
                ];

                // Dispatch the job to send the recovery email
                dispatch(new RecoverEmailJob($details));

                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    public function newPassword()
    {
        return view('Website.auth.newPassword');
    }

    public function changep(Request $request)
    {
        $user = User::where('confirmation_code', $request->code)->first();
        if ($user) {
            $user->password = password_hash($request->newp, PASSWORD_DEFAULT);
            $user->save();
            $user->refresh();
            return 1;
        } else
            return 0;
    }

    public function packages()
    {

        return view("Website.package");
    }

}

