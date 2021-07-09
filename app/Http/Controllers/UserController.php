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
use App\Mail\ResetPasswordMail;
use App\Mail\WelcomeUserSocialMail;
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
            $user->email = 'no@'.$user->id.'email.com';
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
            try{
                Mail::to($NewUser->email)->send(new WelcomeUserSocialMail($NewUser));
            }catch(Exception $e){}
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
    public function postEdit(Request $r){
        //Validate the request
        $Rules = [
            'name' => 'required|min:3|max:255',
            'phone_number' => 'required|numeric',
            'zip_code' => 'numeric'
        ];
        $Validator = Validator::make($r->all() , $Rules);
        if($Validator->fails()){
            return back()->withErrors($Validator->errors()->all());
        }else{
            //Update the user
            $TheUser = User::findOrFail(auth()->user()->id);
            $TheUser->update($r->all());
            return back()->withSuccess('Profile updated successfully');
        }
    }
    public function getApproveAccount($code){
        $TheUser = User::where('code' , $code)->first();
        if($TheUser){
            if($TheUser->confirmed){
            return redirect()->route('profile')->withErrors('Your account is already confirmed');
            }
            if($TheUser->email == auth()->user()->email){
            $TheUser->update(['confirmed' => 1]);
            return redirect()->route('profile')->withSuccess('Your account has been confirmed, Thanke you');
            }else{
            return redirect()->route('profile')->withErrors('Authentication code dosen\'t match, Please follow the link we sent to you via email');
            }
        }else{
            return redirect()->route('profile')->withErrors('Authentication code dosen\'t match, Please follow the link we sent to you via email');
        }
    }
    public function getResetPage(){
        return view('user.reset');
    }
    public function postResetPage(Request $r){
        //Validation
        $Rules = [
            'email' => 'required|email'
        ];
        $Validator = Validator::make($r->all() , $Rules);
        if($Validator->fails()){
            return back()->withErrors($Validator->errors()->all());
        }else{
            //Check if this email exists
            $TheUser = User::where('email',$r->email)->first();
            if($TheUser){
                //Send Reset Email
                try{
                    Mail::to($TheUser->email)->send(new ResetPasswordMail($TheUser));
                }catch(Exception $e){}
                return back()->withSuccess("Please follow the instruction sent to you via email, Make sure to check your spam or junk mail");
            }else{
                return back()->withErrors("This email dosen't exist");
            }
        }
    }
    public function getChoosePasswordPage($email,$code){
        $TheUser = User::where('email' , $email)->first();
        if($TheUser){
          if(md5($TheUser->code) == $code){
            //Return the Page
            return view('user.choose-password' , compact('TheUser'));
          }else{
            return redirect()->route('home')->withErrors('Identification code is not valid!');
          }
        }else{
          return redirect()->route('home')->withErrors('This email dose not exist');
        }
    }
    public function postChoosePasswordPage(Request $r){
        //Validation
        $Rules = [
            'user_id' => 'required|numeric',
            'user_code' => 'required',
            'password' => 'required|min:5|confirmed',
        ];
        $Validator = Validator::make($r->all() , $Rules);
        if($Validator->fails()){
            return back()->withErrors($Validator->errors()->all());
        }else{
            $TheUser = User::findOrFail($r->user_id);
            if($TheUser){
            if(md5($TheUser->code) == $r->user_code){
                //Update The Passowrd
                $TheUser->update(['password' => Hash::make($r->password)]);
                Auth::loginUsingId($TheUser->id);
                return redirect()->route('profile')->withSuccess('Password Updated');
            }else{
                return back()->withErrors('Something went wrong, Please try again');
            }
            }else{
                return back()->withErrors('Something went wrong, Please try again');
            }
        }
    }
    public function getOrders(){
        return view('user.orders');
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



