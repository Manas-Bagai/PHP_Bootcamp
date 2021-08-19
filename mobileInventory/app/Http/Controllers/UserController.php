<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function create(Request $request){
        $request->validate([
            'name'=> 'required|max:120',
            'email' => 'required|email|unique:users',
            'mobile_number' => 'required|min:10|max:10'
        ]);
        $user = new User();
        $user->name=  $request->Input('name');
        $user->email=  $request->Input('email');
        $user->mobile_number=  $request->Input('mobile_number');
        $user->save();
        return 200;
    }

    public function getAllUsers(){
        return User::all();
    }

    public function getUsersByName($name){
        return User::where('name',$name)->first();
    }

    public function getUsersByMobileNumber($mobile_number){
        return User::where('mobile_number',$mobile_number)->first();
    }

    public function getUsersByEmail($email){
        return User::where('email',$email)->first();
    }
}
