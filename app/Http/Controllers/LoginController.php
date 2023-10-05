<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\ResponseController;
use Validator;

class LoginController extends Controller
{
    public function apiLogin(Request $request){
        try{

            // Declare the rules for the form validation
            $rules = array(
                'email'            => 'required',
                'password'         => 'required',
            );

            // Create a new validator instance from our validation rules
            $validator = Validator::make($request->all(), $rules);

            // If validation fails, we'll exit the operation now.
            if ($validator->fails()) {
                // Ooops.. something went wrong
                return ResponseController::result(null,$validator->errors(),201);
            }
            $data = [];
            if(Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])){
                $user = Auth::user();
                //$data['user'] =  $user;
                $data['accessToken'] = $user->createToken('API TOKEN')->plainTextToken; //Throws Error here
                return ResponseController::result($data,'You are login successfully.',200);
            }else{
                return ResponseController::result(null,'The provided credentials are incorrect',201);
            }
        } 
        catch (\Throwable $e) {
            return ResponseController::result(null,$e->getMessage(),201);
        }
    }
    public function getUser(){
        return ResponseController::result(Auth::user(),'Data Loaded.',200);
    }
    public function apiLogout(){
        Auth::user()->tokens()->delete();
        return ResponseController::result([],'Logout Successfully.',200);
    }
}
