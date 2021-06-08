<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController as DefaultLoginController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AdminController extends DefaultLoginController
{
		
//	protected $redirectTo = '/dashboard';


    public function __construct()
    {
        $this->middleware('guest:web')->except('doLogout');
    }

    public function showLoginForm()
    {
        return view('Auth.login');
    }

    public function showAdminRegister()
        {
            return view('Auth.adminRegister');
        }



        public function register(Request $request)
        {
            $admins = new User() ; 

            $admins->admin_name = $request->admin_name; 
            $admins->password = Hash::make($request->admin_pass); 
            $admins->save();
            auth()->login($admins);
            return redirect('/');
            

        }

    public function doLogin(Request $request)
    {    


        $credentials = array(
        'admin_name' =>  $request->admin_name,
        'password' => $request->admin_pass  
        );


        if (Auth::attempt($credentials)) {
          return redirect('/dashboard/'.Auth::user()->id);
            }
            else
            {
                return back();
            }


    }

    public function doLogout()
    {
        Auth::logout();
        return redirect('/');
    }



    public function username()
    {
        return 'admin_name';
    }

    protected function guard()
    {
        return Auth::guard('web');
    }  


    
}
