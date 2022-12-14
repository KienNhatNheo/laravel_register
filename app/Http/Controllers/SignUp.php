<?php

namespace App\Http\Controllers;
use App\Models\SignUp_Model;

use Illuminate\Http\Request;
use Illuminate\Routing\ControllerDispatcher;

class SignUp extends Controller
{
    public function HandleSignUp(Request $request){
        if($request->confirmPassword === $request->password){
            $user = SignUp_Model::create([
                'username' => $request->username,
                'password' => md5($request->password),
                'role'=> '0',
            ]);
        } else {
            return redirect()->back()->with('err','1234');
        }
        return view('signin');
       
    }
}