<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\MyUser;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
   public function register(Request $request)
   {
       if(!$request->has(['username', 'password'])){
           return to_route('formregister')->with('error', 'Invalid user');
       }
       $username = $request->input('username');
       $password = $request->input('password');
       $user = new MyUser();
       if($user->where('username', $username)->exists()){
           return to_route('formregister')->with('error', 'User already exists');
       }


       $user->username = $username;
       $user->password = password_hash($password, PASSWORD_DEFAULT);
       $user->save();
       return to_route('login')->with('success', 'User created successfully');
   }


   public function login(Request $request)
   {
         if(!$request->has(['username', 'password'])){
              return to_route('login')->with('error', 'Invalid user');
         }
         $username = $request->input('username');
         $password = $request->input('password');

         $user = MyUser::where('username', $username)->first();
         if(!$user){
              return to_route('login')->with('error', 'Invalid user');
         }

         if(password_verify($password, $user->password)){

              Session::put('user', $user);
              return to_route('account');
         }
         else{
              return to_route('login')->with('error', 'Invalid user');
         }
   }

    public function logout()
    {
         Session::flush();
         return to_route('login');
    }
    public function changepassword(Request $request)
    {
        if (!$request->has(['oldpassword', 'newpassword'])) {
            return to_route('formpassword')->with('error', 'Invalid password');
        }
        $oldpassword = $request->input('oldpassword');
        $newpassword = $request->input('newpassword');
        $user = Session::get('user');

        if (password_verify($oldpassword, $user->password)) {
            $user->where('username', $user->username)->update(['password' => password_hash($newpassword, PASSWORD_DEFAULT)]);
            return to_route('account')->with('success', 'Password changed successfully');
        } else {
            return to_route('formpassword')->with('error', 'Invalid password');
        }

    }
}
