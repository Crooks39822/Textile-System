<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ForgetPasswordMail;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(!empty(Auth::check()))
        {
            if(Auth::User()->is_role == '1'){
                return redirect()->intended('admin/dashboard');
            }
            elseif(Auth::user()->is_role == 2)
            {
                return redirect()->intended('teacher/dashboard');
            }
            elseif(Auth::user()->is_role == 3)
            {
                return redirect()->intended('student/dashboard');
            }
            elseif(Auth::user()->is_role == 4)
            {
                return redirect()->intended('parent/dashboard');
            }


        }
        return view('auth.login');
    }




    public function register_users(Request $request)
    {
        return view('auth.register');
    }

    public function CheckEmail(Request $request)
    {
        $email = $request->input('email');
        $isExists = User::where('email',$email)->first();
        if($isExists){
            return response()->json(array("exists => true"));
        }else{
            return response()->json(array("exists => false"));
        }
    }

    public function login_user(Request $request)
    {
        //dd($request->all());
        $remember = !empty($request->remember) ? true : false;
        if(Auth::attempt(['email' => $request->email,'password' => $request->password],$remember)){

            if(Auth::User()->is_role == '1'){
                return redirect()->intended('admin/dashboard');
            }
            elseif(Auth::user()->is_role == 2)
            {
                return redirect()->intended('teacher/dashboard');
            }
            elseif(Auth::user()->is_role == 3)
            {
                return redirect()->intended('student/dashboard');
            }
            elseif(Auth::user()->is_role == 4)
            {
                return redirect()->intended('parent/dashboard');
            }
            else{
                return redirect('/')->with('error','No Record Available....Please Check & Try Again!');
            }
        }else{
            return redirect()->back()->with('error', 'Please Enter the Correct Credentials');
        }
    }
    public function register_user(Request $request)
    {
      // dd($request->all());
      $user = request()->validate([

        'name' => 'required',
        'last_name' => 'required',
        'phone' => 'required',
        'password' => 'required|min:6',
        'confirm_password' => 'required_with:password|same:password|min:6',
        'email' => 'required|unique:users'
        ]);

      $user                 = new User;
      $user->name           = trim($request->name);
      $user->last_name      = trim($request->last_name);
      $user->phone          = trim($request->phone);
      $user->email          = trim($request->email);
      $user->password       = Hash::make($request->password);
      $user->remember_token = Str::random(50);

      $user->save();
      return redirect('/')->with('success','Register Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function logout(){
        Auth::logout();
        return redirect('/')->with('success',' Successfully Logout');
    }

    public function forgot_password(Request $request)
    {
        return view('auth.forgot-password');
    }


    public function reset_password(Request $request)
        {

            $user =User::where('email', '=', $request->email)->first();
            if(!empty($user))
            {
                $user->remember_token = Str::random(50);

                $user->save();

                Mail::to($user->email)->send(new ForgotPasswordMail($user));
                return redirect('/')->with('success','Please Check your Email & Reset Your Password');
            }
            else
            {
                return redirect('/')->with('error','Email Not Found in the System');
            }

        }
        public function reset($token)
        {
            $user =User::where('remember_token', '=', $token)->first();
            if(!empty($user))
            {
               $data['user'] = $user;
               return view('auth.reset',$data);
            }
            else
            {
                abort(404);
            }
        }

        public function pass_reset($token, Request $request)
        {

            $user =User::where('remember_token', '=', $token)->first();
            if(!empty($user))
            {
               if($request->password == $request->cpassword)
               {
                $user->password       = Hash::make($request->password);
                $user->remember_token = Str::random(50);

                $user->save();
                return redirect('/')->with('success','Password Succesfully Changed');

               }
               else
               {

                return redirect()->back()->with('error','Passord & Confirm Password Does Not Match');
               }
            }
            else
            {
                abort(404);
            }
        }

}
