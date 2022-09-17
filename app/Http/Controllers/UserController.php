<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
class UserController extends Controller
{
    // 
    function login(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        $password = User::where('password',$request->password)->first();
        if(!$user||!$password||$request->password!=$user->password){
        return "Email or Password is not matched";
         }
         else{
            $request->session()->put('user', $user);
          return redirect('/');
        }
    }
    
    public function register(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('/login');
    }
}
?>