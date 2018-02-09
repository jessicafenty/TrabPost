<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use AuthenticatesUsers;


    public function __construct(){
        $this->middleware('guest')->except('logout');
    }


    public function login(){
        return view('auth.login2');

    }


    public function register(){

        return view('auth.register2');
    }



    public function attempt(Request $request){
        $this->validate($request,[
            'email' => ['required','max:255','email'],
            'password'=>['required','min:6','max:255']

        ]);


        $credentials = $request->only('email','password');



        $remember = $request->has('remember');


        $user = User::where('email',$request->email)->first();



        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }


        if($user){

            if($user->active){


                if(!Auth::attempt($credentials, $remember)){
                    $this->incrementLoginAttempts($request);
                    return redirect()->back()->with('fail','Usuário e/ou senha inválido!')->withInput();
                }


            }else{
                return redirect()->back()->with('fail','Usuário inativo!')->withInput();
            }


        }else{
            return redirect()->back()->with('fail','Usuário ou senha invalidos!!')->withInput();
        }


        return redirect('dashboard');



    }


    public function create(Request $request){
        $this->validate($request,[
            'email' => ['required','max:255','email','unique:users'],
            'password'=>['required','min:6','max:255','confirmed'],
            'name'=>['required','max:255']


        ]);


        $credentials = array_merge($request->all(),['password'=>bcrypt($request->input('password'))]);
        User::create($credentials);

        return redirect('auth/login');


    }



    public function logout(){
        Auth::logout();

        return redirect('/dashboard');
    }
}
