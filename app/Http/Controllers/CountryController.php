<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use Redirect;
use View;

class CountryController extends Controller
{
    public function index(){
        $countries = Country::all();
        return view('admin.settings.country.index',compact('countries'));
    }
    public function updateStatus($st,$id){
        Country::where('id' , $id)->update(['enable' => $st]);
        return Redirect::back()->with('success', 'Status has been updated.');
    }
}
