<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function auth(Request $request){
        
        //dd('Auth');
        if(isset($request->email) && isset($request->password)){
           
            $credentials = $request->only('email', 'password');
    
            if (Auth::attempt($credentials)) {
                // Authentication passed...
                return redirect()->intended('/user'); 
            }else{
                $message = 'Heslo alebo Email niesu spravne. Ak nemate ucet zaregistrujte sa.';
               return view('signin',compact('message'));  
            }
        }else{
            return view('signin'); 
           
        }
        

    }

    public function registration(Request $request){
        if($request->password){

        }
        return view('registration');
    }

    
}
