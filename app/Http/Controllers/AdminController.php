<?php

namespace App\Http\Controllers;

use \App\User;
use App\Http\Requests;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Admin Dashboard
     * @return View 
     */
    public function index()
    {
        $subscriptions = \DB::table('subscriptions')
                                    ->select('id', 'interest', 'name')->get();
        $waiting = User::users()->where('approved', '=', 0)->count();
    	return view('backend.dashboard',compact('waiting', 'subscriptions'));	
    }

    /**
     * Change subscription interest rate
     * @param  Request $request 
     * @return Redirect back()           
     */
    public function changeSub(Request $request)
    {
        \DB::table('subscriptions')
            ->where('id', $request['id'])
                ->update(['interest' => $request['interest']]);

        return redirect()->back();
    }

    /**
     * Users View
     * @return View 
     */
    public function users()
    {
        return view('backend.users');   
    }

    /**
     * Store View
     * @return View 
     */
    public function store()
    {
        return view('backend.store');   
    }

    /**
     * Settings View
     * @return View 
     */
    public function settings()
    {
        $subscriptions = \DB::table('subscriptions')
                                    ->select('id', 'interest', 'name')->get();

        return view('backend.settings', compact('subscriptions'));   
    }

    /**
     * AJAX
     * Return all users (ajax)
     * @return User 
     */
    public function getusers()
    {
    	return User::users()->get(); // users is a custom-scope in User.php
    }

    /**
     * AJAX
     * Update user info/approval
     * @param  Request $request user
     * @return Boolean      1:done, 0:error
     */
    public function updateUser(Request $request)
    {
		$user =  $request['user'];	

    	$original = User::findOrFail($user['id']);

    	$original->name = $user['name'];
    	$original->approved = $user['approved'];
    	$original->subscription = $user['subscription'];

    	if( $original->save() ) {
    		return 1;
    	}
    	return 0;
    }

    /**
     * AJAX
     * Remove/delete user
     * @param  Request $request id
     * @return Boolean        1:done
     */
    public function deleteUser(Request $request)
    {
        User::findOrFail($request['id'])->delete();

        return 1;
    }

}
