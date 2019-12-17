<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class OwnerLoginController extends Controller
{

	public function __construct()
	{
		$this->middleware('guest:owner');
	}

    public function showLoginForm()
    {
    	return view ('auth.Owner.OwnerLogin');

    }

    public function login(Request $request)
    {
    	//validate the form
    	$this->validate($request, [
    		'email' => 'required|email',
    		'password' => 'required|min:6'
    	]);

    	//attempt to log the user in 
    	if (Auth::guard('owner')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
    		
    		//if successful, the redirect to their intended location
    		return redirect('owner/home');
    	}
        else{
        	//if unsuccessful, the redirect back to the login page
        	return redirect()->back()->withInput($request->only('email', 'remember'));
        }
    }
}
