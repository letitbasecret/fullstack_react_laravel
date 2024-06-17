<?php

namespace App\Http\Controllers;

use App\Models\Register;
use App\Http\Requests\StoreRegisterRequest;
use App\Http\Requests\UpdateRegisterRequest;
use Illuminate\Http\Request;
// use Illuminate\Contracts\Validation\Validator;
// use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
    public function register(request $request)
    {
        $validator=Validator::make($request->all(), [
            "email"=> "required|unique",
            "password"=> "required",
            "phone"=>"required",
            "name"=>"required",]);
            if ($validator->fails()) {
                return response()->json([
                    "message"=>$validator->errors(),
                    "status"=>false,
                ],400);
            }

            $user= new Register;
            $user->email=$request->email;
            $user->password=$request->password;
            $user->phone=$request->phone;
            $user->name=$request->name;
            $user->save();
            return response()->json([
                "message"=>"registed successfullly",
                "data"=>$user,
                "status"=>true,
            ],200);

    }


    public function login(Request $request)
    {
        $validator=Validator::make($request->all(), [
            "email"=> "required",
            "password"=> "required",]);
            if ($validator->fails()) {
                return response()->json([
                    "message"=>$validator->errors(),
                    "status"=>false,
                ],400);
            }
            $user=Register::where('email',$request->email)->where('password',$request->password)->first();
            if(!$user){
                return response()->json([
                    "message"=>"invalid email or password",
                    "status"=>false,
                ],400);
            }
            return response()->json([
                "message"=>"login successfullly",
                "data"=>$user,
                "status"=>true,
            ],200);

    }


}
