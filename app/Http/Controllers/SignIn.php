<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\SignIn_Model;

use Illuminate\Http\Request;
use Illuminate\Routing\ControllerDispatcher;
use Symfony\Component\HttpFoundation\Session\Session;

class SignIn extends Controller
{
    public function HandleSignIn(Request $request){
        $passDB = DB::table('table_users')->where('username',$request->username)->get();
        if(count($passDB) > 0 && $passDB[0]->password === md5($request->password)){
            session()->put('cur_username', $request->username);
            
        
            return redirect(route('list'));
        } else {
            return redirect()->back()->with('err', '1234');
        }
    }
    public function logout(){
        session()->forget('cur_username');
        return redirect(route('signin'));
    }
}