<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('approved', ['only'=> 'index']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.store');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        return view('frontend.profile')->with('sub', Auth::user()->subscription);
    }

    /**
     * User requesting change to their subscription
     * @param  Request $request 
     * @return View           redirection
     */
    public function requestChange(Request $request)
    {
        $user = Auth::user();
        
        if ($user->subscription != $request['subscription']) {
            
            $user->subscription = $request['subscription'];
            $user->approved = 0;
            
            $user->save();
            // Auth::logout();
            return redirect('/');
        } else {
            return redirect()->back();
        }
    }
}
