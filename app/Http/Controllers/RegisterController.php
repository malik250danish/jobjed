<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ResponseController;
use App\Models\UserGPS;
use App\Models\UserPackage;
use App\Models\UserCategory;
use App\Models\UserCompany;
use Validator;
use Sentinel;

class RegisterController extends Controller
{
    public function advertiserRegister(Request $request){
        try{

            // Declare the rules for the form validation
            $rules = array(
                'first_name'       => 'required|min:3',
                'last_name'        => 'required|min:3',
                'email'            => 'required|email|unique:users',
                'password'         => 'required|between:3,32',
                'password_confirm' => 'required|same:password',
                'country'          => 'required|integer',
                'state'            => 'required|integer',
                'city'             => 'required|integer',
                'package_id'       => 'required|integer',
                'category_id'      => 'required|integer',
                'address'          => 'required',
                'company_name'     => 'required',
                'company_description' => 'required',
                'company_address'  => 'required',
                'lat'              => 'required',
                'lng'              => 'required',
            );

            // Create a new validator instance from our validation rules
            $validator = Validator::make($request->all(), $rules);

            // If validation fails, we'll exit the operation now.
            if ($validator->fails()) {
                // Ooops.. something went wrong
                return ResponseController::result(null,$validator->errors(),201);
            }
            $data = [];
            // Register the user
            $userField = array(
                'name' => $request->get('first_name').' '.$request->get('last_name'),
                'first_name' => $request->get('first_name'),
                'last_name' => $request->get('last_name'),
                'email' => $request->get('email'),
                'password' => $request->get('password'),
                'country' => $request->get('country'),
                'state' => $request->get('state'),
                'city' => $request->get('city'),
            );
            $user = Sentinel::register($userField);

            //add user to 'User' group
            $role = Sentinel::findRoleById(2);
            $role->users()->attach($user);
            # # # Add GPS
            UserGPS::create([
                'user_id' => $user->id,
                'lat' => $request->get('lat'),
                'lng' => $request->get('lng'),
                'gps' => $request->get('lat').','.$request->get('lng'),
            ]);
            # # # Add User Package
            UserPackage::create([
                'user_id'    => $user->id,
                'package_id' => $request->get('package_id'),
            ]);
            # # # Add User Category
            UserCategory::create([
                'user_id'    => $user->id,
                'category_id' => $request->get('category_id'),
            ]);
            # # # Add User Company
            UserCompany::create([
                'user_id'       => $user->id,
                'name'          => $request->get('company_name'),
                'description'   => $request->get('company_description'),
                'address'       => $request->get('company_address'),
            ]);
            return ResponseController::result([],'You are registered Successfully.',200);
        } 
        catch (\Throwable $e) {
            return ResponseController::result(null,$e->getMessage(),201);
        }
        
    }
}
