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
            return to_route('register')->with('error', 'Invalid username or password');
         }

       $user = new MyUser($username, password_hash($password, PASSWORD_DEFAULT));
       $result=$user->login();
         if($result != false){
              return to_route('register')->with('error', 'User already exists');
         }
         $user->AddUser();
            return to_route('login')->with('success', 'User added successfully');
   }

   public function login(Request $request)
   {

       $username = $request->input('username');
       $password = $request->input('password');
       $user = new MyUser($username, " ");
       if($username == NULL || $password == NULL){
            return to_route('login')->with('error', 'Invalid username or password');
       }

       $result = $user->login();

       if($result==false){
        return to_route('login')->with('error', 'Invalid username or password');
       }

       if (password_verify($password, $result['password'])) {
                serialize($user);
                Session::put('user', $user);
                return to_route('account')->with('success', 'Login successfully');
         } else {
           return to_route('login')->with('error', 'Invalid username or password');
       }
   }

    public function logout()
    {
         Session::flush();
         return to_route('login');
    }
    public function changepassword(Request $request)
    {
        $username = Session::get('user')->getusername();
        $oldpassword = $request->input('oldpassword');
        $newpassword = $request->input('newpassword');
        if ($oldpassword == NULL || $newpassword == NULL) {
            return to_route('formpassword')->with('error', 'Invalid old password or new password');
        }
        $user = new MyUser($username, " ");
        $result = $user->login();
        if (password_verify($oldpassword, $result['password'])) {
            $user = new MyUser($username, password_hash($newpassword, PASSWORD_DEFAULT));
            $user->changepassword();
            return to_route('account')->with('success', 'Password changed successfully');

        } else {
            return to_route('formpassword')->with('error', 'Invalid old password');
        }
    }
}
