<?php

namespace App\Http\Controllers;

use App\Models\CurriculumVitae;
use App\Models\Country;
use App\Models\Occupations;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Validator;
use Redirect;
use View;
use File;

class FrontEndController extends Controller
{
    public function index(){
        if(Auth::check()){
            //$results = CurriculumVitae::where('status',1)->where('cv_lock',0)->where('is_deleted',0)->orderby('id','desc')->limit(15)->get();
            $results = CurriculumVitae::where('status',1)->orderby('id','desc')->limit(15)->get();
            $activeCountries = Country::join('curriculum_vitaes as cv','cv.national_country_id','=','countries.id')
                                ->select('countries.*')
                                ->where('countries.enable',1)
                                ->groupby('cv.national_country_id')
                                ->get();
             $activeOcuupations = Occupations::join('curriculum_vitaes as cv','cv.occupation_id','=','occupations.id')
                                ->select('occupations.*')
                                ->where('occupations.enable',1)
                                ->groupby('cv.occupation_id')
                                ->get();
            return view('index',compact('results','activeCountries','activeOcuupations'));
        }
        return view('landing');
    }
    public function guest(){
        $results = CurriculumVitae::where('status',1)->orderby('id','desc')->limit(15)->get();
        $activeCountries = Country::join('curriculum_vitaes as cv','cv.national_country_id','=','countries.id')
                            ->select('countries.*')
                            ->where('countries.enable',1)
                            ->groupby('cv.national_country_id')
                            ->get();
         $activeOcuupations = Occupations::join('curriculum_vitaes as cv','cv.occupation_id','=','occupations.id')
                            ->select('occupations.*')
                            ->where('occupations.enable',1)
                            ->groupby('cv.occupation_id')
                            ->get();
        return view('index',compact('results','activeCountries','activeOcuupations'));
    }
    public function addMorePreviousEmployment(Request $request){
        return response()->json([
                                    'st' => 'ok',
                                    'html'=> View::make('renderHtml/addmorepreviousexperince',['x' => $request->get('addMore')])->render(),
                                ]);
    }
    public function adminviewcv($dec)
    {
        if($dec == 'today'){
            $from = date('Y-m-d 00:00:00');
        }elseif($dec == 'month'){
            $from = date('Y-m-01 00:00:00');
        }elseif($dec == 'all'){
            $from = date('2020-01-01 00:00:00');
        }
        $to = date('Y-m-d 23:59:59');
        $results = CurriculumVitae::wherebetween('created_at',[$from,$to])->orderby('id','desc')->get();
        $activeCountries = Country::join('curriculum_vitaes as cv','cv.national_country_id','=','countries.id')
                            ->select('countries.*')
                            ->where('countries.enable',1)
                            ->groupby('cv.national_country_id')
                            ->get();
         $activeOcuupations = Occupations::join('curriculum_vitaes as cv','cv.occupation_id','=','occupations.id')
                            ->select('occupations.*')
                            ->where('occupations.enable',1)
                            ->groupby('cv.occupation_id')
                            ->get();
        return view('allcvs',compact('results','activeCountries','activeOcuupations'));
    }
    public function adminviewconnectcv($dec)
    {
        if($dec == 'today'){
            $from = date('Y-m-d 00:00:00');
        }elseif($dec == 'month'){
            $from = date('Y-m-01 00:00:00');
        }elseif($dec == 'all'){
            $from = date('2020-01-01 00:00:00');
        }
        $to = date('Y-m-d 23:59:59');
        $results = CurriculumVitae::join('curriculum_vitae_connects as c','c.cv_id','=','curriculum_vitaes.id')
                                    ->select('curriculum_vitaes.*')
                                    ->where('c.status',0)
                                    ->wherebetween('c.created_at',[$from,$to])
                                    ->get();
        $activeCountries = Country::join('curriculum_vitaes as cv','cv.national_country_id','=','countries.id')
                            ->select('countries.*')
                            ->where('countries.enable',1)
                            ->groupby('cv.national_country_id')
                            ->get();
         $activeOcuupations = Occupations::join('curriculum_vitaes as cv','cv.occupation_id','=','occupations.id')
                            ->select('occupations.*')
                            ->where('occupations.enable',1)
                            ->groupby('cv.occupation_id')
                            ->get();
        return view('allcvs',compact('results','activeCountries','activeOcuupations'));
    }
    public function adminviewprocessingcv($dec)
    {
        if($dec == 'today'){
            $from = date('Y-m-d 00:00:00');
        }elseif($dec == 'month'){
            $from = date('Y-m-01 00:00:00');
        }elseif($dec == 'all'){
            $from = date('2020-01-01 00:00:00');
        }
        $to = date('Y-m-d 23:59:59');
        $results = CurriculumVitae::join('curriculum_vitae_connects as c','c.cv_id','=','curriculum_vitaes.id')
                                    ->select('curriculum_vitaes.*')
                                    ->where('c.status',1)
                                    ->wherebetween('c.created_at',[$from,$to])
                                    ->get();
        $activeCountries = Country::join('curriculum_vitaes as cv','cv.national_country_id','=','countries.id')
                            ->select('countries.*')
                            ->where('countries.enable',1)
                            ->groupby('cv.national_country_id')
                            ->get();
         $activeOcuupations = Occupations::join('curriculum_vitaes as cv','cv.occupation_id','=','occupations.id')
                            ->select('occupations.*')
                            ->where('occupations.enable',1)
                            ->groupby('cv.occupation_id')
                            ->get();
        return view('allcvs',compact('results','activeCountries','activeOcuupations'));
    }
    public function allCVs(){
        if(Auth::check()){
           // $results = CurriculumVitae::where('status',1)->where('cv_lock',0)->where('is_deleted',0)->orderby('id','desc')->get();
            $results = CurriculumVitae::where('status',1)->orderby('id','desc')->get();
            $activeCountries = Country::join('curriculum_vitaes as cv','cv.national_country_id','=','countries.id')
                                ->select('countries.*')
                                ->where('countries.enable',1)
                                ->groupby('cv.national_country_id')
                                ->get();
             $activeOcuupations = Occupations::join('curriculum_vitaes as cv','cv.occupation_id','=','occupations.id')
                                ->select('occupations.*')
                                ->where('occupations.enable',1)
                                ->groupby('cv.occupation_id')
                                ->get();
            return view('allcvs',compact('results','activeCountries','activeOcuupations'));
        }
        return view('landing');
    }

    public function getCVS(Request $request){
        $data = $request->all();
        $ageStart = 1;
        $ageEnd = 100;
        if($data['age'] != 0 && !empty($data['age'])){
            $age = explode('-', $data['age']);
            $ageStart = $age[0];
            $ageEnd = $age[1];
        }
        $occupation = $data['occupation'];
        $country = $data['country'];
        $religion = $data['religion'];
        //$results = CurriculumVitae::where('status',1)->where('cv_lock',0)->where('is_deleted',0)
        $results = CurriculumVitae::where('status',1)
                                    ->where(function ($q) use($occupation,$country,$religion){
                                        if($occupation != 0) {
                                            $q->where('occupation_id',$occupation);
                                        }
                                        if($country != 0) {
                                            $q->where('national_country_id',$country);
                                        }
                                        if($religion != 0) {
                                            $q->where('religion',$religion);
                                        }

                                    })->orderby('id','desc')->get();

        return response()->json([
                                    'st' => 'ok',
                                    'html'=> View::make('renderHtml/cvs',['results' => $results])->render(),
                                ]);
    }

    public function getRegister($role)

    {

        // Show the page

        return view('register',compact('role'));

    }

    public function getRegisterTab()
    {
        return view('registerTab');
    }

    public function update(Request $request)

    {

        $rules = array(

            'pic' => 'mimes:jpg,jpeg,bmp,png|max:10000',

            'first_name'=>'required',

            'last_name'=>'required'

        );

        $message=['pic.mimes' => 'Please upload image types : jpg,jpeg,bmp,png !'];



        // Create a new validator instance from our validation rules

        $validator = Validator::make($request->all(), $rules,$message);



        // If validation fails, we'll exit the operation now.

        if ($validator->fails()) {

            // Ooops.. something went wrong

            return Redirect::back()->withInput()->withErrors($validator);

        }



        $user = Auth::user();

        //update values

        $user->first_name = $request->get('first_name');

        $user->last_name = $request->get('last_name');

        $user->email = $request->get('email');

        $user->gender = $request->get('gender');





        if ($password = $request->get('password')) {

            $user->password = Hash::make($password);

        }

        // is new image uploaded?

        if ($file = $request->file('pic')) {

            $fileName = $file->getClientOriginalName();

            $extension = $file->getClientOriginalExtension() ?: 'png';

            $folderName = '/uploads/users/';

            $destinationPath = public_path() . $folderName;

            $safeName = rand(000000000,999999999) . '.' . $extension;

            $file->move($destinationPath, $safeName);



            //delete old pic if exists

            if (File::exists(public_path() . $folderName . $user->pic)) {

                File::delete(public_path() . $folderName . $user->pic);

            }



            //save new file path into db

            $user->pic = $safeName;



        }



        // Was the user updated?

        if ($user->save()) {

            // Prepare the success message

            $success = 'Record has been updated.';



            // Redirect to the user page

            return Redirect::back()->with('success', $success);

        }



        // Prepare the error message

        $error = Lang::get('users/message.error.update');





        // Redirect to the user page

        return Redirect::back()->withInput()->with('error', $error);

    }

    public function myAccount()

    {

        $user = Auth::user();

        $countries = [];

        return view('user_account', compact('user', 'countries'));

    }

    public function getLogout()

    {

        // Log the user out

        Auth::logout();



        // Redirect to the users page

        return redirect('/')->with('success', 'You have successfully logged out!');

    }
}
