<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Exception;

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
        $MyUser=User::where('name',$name)->first();
        if ($MyUser != Null){
            return $MyUser;
        } else{
            throw new Exception('Name not found.');
        }
    }

    public function getUsersByMobileNumber($mobile_number){
        $MyUser= User::where('mobile_number',$mobile_number)->first();
        if ($MyUser != Null){
            return $MyUser;
        } else{
            throw new Exception('Number not found.');
        }
    }

    public function getUsersByEmail($email){
        $MyUser = User::where('email',$email)->first();
        if ($MyUser != Null){
            return $MyUser;
        } else{
            throw new Exception('Email not found.');
        }
    }

    public function deleteUsersByMobileNumber($mobile_number){
        $MyUser=User::where('mobile_number',$mobile_number)->first();
        if ($MyUser != Null){
            $MyUser->delete();
            return 204;
        } else{
            throw new Exception('Number not found.');
        }
    }

    public function deleteUsersByName($name){
        $MyUser=User::where('name',$name)->first();
        if ($MyUser != Null){
            $MyUser->delete();
            return 204;
        } else{
            throw new Exception('Name not found.');
        }
    }

    public function deleteUsersByEmail($email){
        $MyUser=User::where('email',$email)->first();
        if ($MyUser != Null){
            $MyUser->delete();
            return 204;
        } else{
            throw new Exception('Email not found.');
        }
    }
}
