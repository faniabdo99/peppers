<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class AdminController extends Controller
{
    public function getIndex(){
        $UsersCount = User::where('role' , 2)->count();
        return view('admin.index',compact('UsersCount'));
    }
}
