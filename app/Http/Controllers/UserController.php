<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use Hash;
use App\Models\User;
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
            // Mail::to('emfsd@fsdf.fsd')->send(new );
            //Log the user in
            //Redirect back to homepage
            return redirect()->route('home');
        }
    }
}
