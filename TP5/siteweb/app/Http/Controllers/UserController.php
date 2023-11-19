<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MyUser;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
   public function register(Request $request)
   {
       $username = $request->input('username');
       $password = $request->input('password');
       if ( $username == NULL || $password == NULL) {
           return redirect('/register')->with('error', 'Invalid username or password');
       }

       $user = new MyUser($username, password_hash($password, PASSWORD_DEFAULT));
       $result=$user->login();
         if($result != false){
              return redirect('/register')->with('error', 'Username already exists');
         }
         $user->AddUser();
            return redirect('/');
   }

   public function login(Request $request)
   {

       $username = $request->input('username');
       $password = $request->input('password');
       $user = new MyUser($username, " ");
       if($username == NULL || $password == NULL){
           return redirect('/')->with('error', 'Invalid username or password');
       }

       $result = $user->login();

       if($result==false){
              return redirect('/')->with('error', 'Invalid username or password');
       }

       if (password_verify($password, $result['password'])) {
                serialize($user);
                Session::put('user', $user);
              return redirect('/account');
         } else {
              return redirect('/')->with('error', 'Invalid username or password');
       }
   }

    public function logout()
    {
         Session::flush();
         return redirect('/');
    }
    public function changepassword(Request $request)
    {
        $username = Session::get('user')->getusername();
        $oldpassword = $request->input('oldpassword');
        $newpassword = $request->input('newpassword');
        $user = new MyUser($username, " ");
        $result = $user->login();
        if (password_verify($oldpassword, $result['password'])) {
            $user = new MyUser($username, password_hash($newpassword, PASSWORD_DEFAULT));
            $user->changepassword();
            return redirect('/account')->with('success', 'Password changed successfully');
        } else {
            return redirect('/formpassword')->with('error', 'Invalid old password');
        }
    }


}
