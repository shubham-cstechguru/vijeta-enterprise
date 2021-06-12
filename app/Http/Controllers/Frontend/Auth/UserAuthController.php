<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class UserAuthController extends Controller
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


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/account/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
        $this->redirectTo = url()->previous();
    }


    public function getRegister()
    {
      // echo 'Hello'; die;
      $categories = Category::with('products')->get();
      $data = compact('categories');
      return view('frontend.inc.signup',$data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request)
    {
      $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required',
      ]);

      $password = Hash::make($request->password);
      User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $password,
      ]);

      \Session::put('success','You are Registered successfully!!');
      return redirect(route('home.login'));
    }

    public function getLogin()
    {
      // echo 'Hello'; die;
      $categories = Category::with('products')->get();
      $data = compact('categories');
      return view('frontend.inc.login',$data);
    }

    /**
     * Show the application loginprocess.
     *
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (auth()->guard('web')->attempt([
          'email' => $request->input('email'),
          'password' => $request->input('password')
        ]))
        {
            $user = auth()->guard('web')->user();

            return redirect()->back();

        }
        else {
            return back()->with('error','your username and password are wrong.');
        }


    }

    /**
     * Show the application logout.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        auth()->guard('web')->logout();
        \Session::flush();
        \Session::put('success','You are logout successfully');
        return redirect(route('home.login'));
    }
}
