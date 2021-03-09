<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use Hash;
use Mail;
use Auth;
use Socialite;
use Image;
use App\Models\User;
use App\Mail\WelcomeNewUser;
class UserController extends Controller{
    public function getSignup(){
        return view('user.signup');
    }
    public function postSignup(Request $r){
        //Validate the request
        $Rules = [
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:5'
        ];
        $Validator = Validator::make($r->all(),$Rules);
        if($Validator->fails()){
            return back()->withErrors($Validator->errors()->all());
        }else{
            //Create the User
            $UserData = $r->except('password_confirmation');
            $UserData['code'] = mt_rand(100000, 999999);
            $UserData['password'] = Hash::make($r->password);
            $NewUser = User::create($UserData);
            //Send Welcome email
            try{
                Mail::to($NewUser->email)->send(new WelcomeNewUser($NewUser));
            }catch(Exception $e){}
            //Log the user in
            Auth::loginUsingId($NewUser->id);
            //Redirect back to homepage
            return redirect()->route('home')->withSuccesss('Your are now logged in as '.$NewUser->name);
        }
    }
    public function getLogin(){
        return view('user.login');
    }
    public function postLogin(Request $r){
        //Validate the request
        $Rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];
        $Validator = Validator::make($r->all() , $Rules);
        if($Validator->fails()){
            return back()->withErrors($Validator->errors()->all());
        }else{
            //Attempt to login
            if (Auth::attempt($r->except('_token'))) {
                return redirect()->route('home');
            }else{
                return back()->withErrors('This information dose not match our records');
            }
        }
    }
    //Social Login
    public function redirectToProvider($provider){
        return Socialite::driver($provider)->redirect();
    }
    public function handleProviderCallback(Request $r , $driver){
        $user = Socialite::driver($driver)->user();
        if(!$user->email){
            $user->email = 'no@email.com';
        }
        $FindUser = User::where('email' , $user->email)->get();
        if($FindUser->count() == 0){
            //Signup
            $ProfileImage = (isset($user->avatar)) ? $user->avatar : 'user.png';
            $NewUser = User::create([
            'name' => $user->name,
            'email' => $user->email,
            'image' => $ProfileImage,
            'password' => 'PlaceholderPass',
            'auth_provider' => $driver,
            'code' =>  mt_rand(100000, 999999),
            'confirmed' => 1
            ]);
            //Send Welcome Email
            auth()->loginUsingId($NewUser->id);
            return redirect()->route('home');
        }else{
            auth()->loginUsingId($FindUser->first()->id);
            return redirect()->route('home');
        }
    }
    public function profile(){
        return view('user.profile');
    }
    public function getEdit(){
        return view('user.edit');
    }
    public function logout(){
        if(auth()->check()){
            Auth::logout();
            return redirect()->route('home')->withSuccess('You have successfully logged out');
        }else{
            return redirect()->route('home')->withSuccess('You are already logged out');
        }
    }
}
