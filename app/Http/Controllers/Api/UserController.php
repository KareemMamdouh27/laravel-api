<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function user()
    {
        return [
            "status" => 200,
            "msg"    => "Thanks",
            "data"   => User::all()
        ];
    }

    public function userId($id=null)
    {
        return $id?User::find($id):[
            "status" => 200,
            "msg"    => "Thanks",
            "data"   => User::all()
        ];
    }

    public function userAdd(Request $request)
    {
        $user = new user;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        $res = $user->save();
        if($res){
            return [
                "results" => "added"
            ];
        }else{
            return [
                "Results" => "failed"
            ];
        }
        
    }

}
