<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\CurriculumVitae;
use App\Models\Notification;
use App\Models\LanguageGrip;
use App\Models\CurriculumVitaeConnect;
use App\Models\CurriculamVitaePerviousWork;
use App\Models\CurriculamVitaeWorkExperience;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Cartalyst\Stripe\Stripe;
//use Spatie\Browsershot\Browsershot;
use Redirect;
use Mail;
use PDF;

use Illuminate\Http\Request;

class CurriculumVitaeController extends Controller
{
    public function checkRecordAlreadyExist(Request $request){
        $results = \App\Models\CurriculumVitae::where('passport_number',$request->get('passport_number'))->get();
        if(count($results)){
            return response()->json([
                                    'st' => 'err',
                                    'msg'=> 'Record already exist with this passport number.',
                                ]);
        }
        return response()->json([
                                    'st' => 'ok',
                                    'msg'=> 'Every thing ok.',
                                ]);

    }
    public function download($id){


        $fileName = 'CV_'.$id;

        //return Browsershot::url('detail/'.base64_encode($id))->save($fileName.'.pdf');

        $result = CurriculumVitae::find($id);
        return PDF::loadView('cv/detailPage',compact('result'))
                    ->setOptions(['defaultFont' => 'dejavu sans','isRemoteEnabled'=>true])
                    ->download($fileName.'.pdf');

    }

    public function openView($id){
        $result = CurriculumVitae::find($id);
        return view('cv.detail',compact('result'));
    }
    public function getForm(){
        return view('admin.curriculamvitae.add');
    }
    public function openCVform(){
        return view('cv.add');
    }
    public function edit($id){
        $result = CurriculumVitae::find(base64_decode($id));
        return view('admin.curriculamvitae.edit',compact('result'));
    }
    public function Connect(){

        if(Auth::getUser()->role_id == 1){
            $results = CurriculumVitae::join('curriculum_vitae_connects as cvc','cvc.cv_id','=','curriculum_vitaes.id')
                                        ->whereIN('cvc.status',[0,1])->where('cvc.is_deleted',0)
                                        ->select('curriculum_vitaes.*','cvc.employer_id','cvc.status as connectstatus')
                                        ->get();
        }elseif(Auth::getUser()->role_id == 4){

            $results = CurriculumVitae::join('curriculum_vitae_connects as cvc','cvc.cv_id','=','curriculum_vitaes.id')
            ->whereIN('cvc.status',[0,1])->where('cvc.is_deleted',0)->where('curriculum_vitaes.user_id',Auth::user()->id)
            ->select('curriculum_vitaes.*','cvc.employer_id','cvc.status as connectstatus')
            ->get();
        }else{
            $results = CurriculumVitae::join('curriculum_vitae_connects as cvc','cvc.cv_id','=','curriculum_vitaes.id')
                                        ->whereIN('cvc.status',[0,1])->where('cvc.is_deleted',0)
                                        ->select('curriculum_vitaes.*','cvc.employer_id','cvc.status as connectstatus')
                                        ->where('cvc.employer_id',Auth::getUser()->id)
                                        ->get();
        }
        return view('admin.curriculamvitae.connect',compact('results'));
    }
    public function Completed(){
        if(Auth::getUser()->role_id == 4){
        $results = CurriculumVitae::join('curriculum_vitae_connects as cvc','cvc.cv_id','=','curriculum_vitaes.id')
                                        ->whereIN('cvc.status',[2])->where('curriculum_vitaes.user_id',Auth::user()->id)
                                        ->select('curriculum_vitaes.*','cvc.employer_id','cvc.status as connectstatus')
                                        ->get();
                                        return view('admin.curriculamvitae.completed',compact('results'));
        }else{
            $results = CurriculumVitae::join('curriculum_vitae_connects as cvc','cvc.cv_id','=','curriculum_vitaes.id')
                                        ->whereIN('cvc.status',[2])
                                        ->select('curriculum_vitaes.*','cvc.employer_id','cvc.status as connectstatus')
                                        ->get();
                                        return view('admin.curriculamvitae.completed',compact('results'));
        }

    }
    public function Canceled(){
        if(Auth::getUser()->role_id == 4){
            $results = CurriculumVitae::join('curriculum_vitae_connects as cvc','cvc.cv_id','=','curriculum_vitaes.id')
            ->where('cvc.is_deleted',1)->where('curriculum_vitaes.user_id',Auth::user()->id)
            ->select('curriculum_vitaes.*','cvc.employer_id','cvc.reason','cvc.status as connectstatus')
            ->get();
return view('admin.curriculamvitae.canceled',compact('results'));
        }else{
            $results = CurriculumVitae::join('curriculum_vitae_connects as cvc','cvc.cv_id','=','curriculum_vitaes.id')
            ->where('cvc.is_deleted',1)
            ->select('curriculum_vitaes.*','cvc.employer_id','cvc.reason','cvc.status as connectstatus')
            ->get();
return view('admin.curriculamvitae.canceled',compact('results'));
        }

    }
    public function acceptReject($id,$status){
        if($status == 'complete'){
            CurriculumVitaeConnect::where('cv_id',$id)->update(['status' => 2]);
            return Redirect::back()->with('success', 'Request delete after complete processing.');
        }else{
            $employeer = User::join('curriculum_vitae_connects as cvc','cvc.employer_id','=','users.id')
                                ->select('users.*')->where('cvc.cv_id',$id)->first();
            CurriculumVitae::where('id',$id)->update(['is_deleted' => 1,'deleted_at' => date('Y-m-d H:i:s')]);
            CurriculumVitaeConnect::where('cv_id',$id)->update(['status' => 1]);
            Mail::send('emails.accept',  ['employeer' => $employeer], function ($m) use ($employeer) {
                $m->to($employeer->email, $employeer->first_name . ' ' . $employeer->last_name);
                $m->subject('Accept Request');

            });
            return Redirect::back()->with('success', 'Request Accepted, CV has been soft deleted.');
        }
    }
    public function reject($id,Request $request){
        $data = $request->all();
        unset($data['_token']);
        unset($data['cancel']);
        $data['is_deleted'] = 1;
        $data['deleted_at'] = date('Y-m-d H:i:s');
        $employeer = User::join('curriculum_vitae_connects as cvc','cvc.employer_id','=','users.id')
                                ->select('users.*')->where('cvc.cv_id',$id)->first();
        CurriculumVitae::where('id',$id)->update(['cv_lock'=>0]);
        CurriculumVitaeConnect::where('cv_id',$id)->update($data);
        Mail::send('emails.reject',  ['employeer' => $employeer,'data' => $data], function ($m) use ($employeer) {
            $m->to($employeer->email, $employeer->first_name . ' ' . $employeer->last_name);
            $m->subject('Cancel Request');

        });
        return Redirect::back()->with('success', 'Request Canceled, CV has been unlocked.');

    }
    public function detailView($id){
        $result = CurriculumVitae::find(base64_decode($id));
        Notification::where('cv_id',$result->id)->update(['status'=> 1]);
        return view('cv.detailPage',compact('result'));
    }
    public function print($id){
        $result = CurriculumVitae::find(base64_decode($id));
        return view('cv.print',compact('result'));
    }
    public function cvConnect($id,Request $request)
    {
        if($request->has('stripeToken')){
            $stripe = Stripe::make(env('STRIPE_API_KEY'),env('STRIPE_API_VERSION'));
            $charge = $stripe->charges()->create([
                'source' => $request->get('stripeToken'),
                'amount' => 1000,
                'currency' => 'usd'
            ]);
            if(!isset($charge['id'])) return Redirect::back()->with('error', 'Request denied due to payment error.');
        }else{
            return Redirect::back()->with('error', 'Request denied due to payment error.');
        }

        // $checkExistRecord = CurriculumVitaeConnect::where('employer_id',Auth::user()->id)->where('is_deleted',0)->count();
        // if($checkExistRecord > 0){
        //     return Redirect::back()->with('error', 'Your request already pending for accept. Please contact to support.');
        // }
        $CurriculumVitae = CurriculumVitae::find($id);
        if($CurriculumVitae->cv_lock == 1){
            return Redirect::back()->with('error', 'CV already locked.');
        }
        CurriculumVitaeConnect::create([
            'employer_id' => Auth::user()->id,
            'cv_id' => $id,
            'charge_id' => $charge['id'],
        ]);
        $CurriculumVitae->cv_lock = 1;
        $CurriculumVitae->save();
        $employeer = User::find(Auth::user()->id);
        $cv = CurriculumVitae::find($id);
        // $adminmail = env('MAIL_ADMIN_ADDRESS');
        // Mail::send('emails.new-request',  ['employeer' => $employeer,'cv' => $cv], function ($m) use ($adminmail) {
        //     $m->to($adminmail, 'Hello Admin');
        //     $m->subject('New Employee Request');

        // });
        // if($employeer){
        //     Mail::send('emails.employeer-request-response',  ['employeer' => $employeer,'cv' => $cv], function ($m) use ($employeer) {
        //         $m->to($employeer->email, $employeer->first_name . ' ' . $employeer->last_name);
        //         $m->subject('Request Forwerded');

        //     });
        // }
        // Mail::send('emails.new-request',  ['employeer' => $employeer,'cv' => $cv], function ($m) {
        //     $m->to('zeeshanzaheer574@gmail.com', 'Hello Admin');
        //     $m->subject('New Employee Request');

        // });

        return Redirect::back()->with('success', 'CV locked for you.');
    }
    public function index(Request $request){
       // $results = CurriculumVitae::where('is_deleted',0)->where('cv_lock',0)->orderby('id','desc')->get();
       if(Auth::getUser()->role_id == 4){
        $results = CurriculumVitae::orderby('id','desc')->where('user_id',Auth::user()->id)->get();
       }else{
        $results = CurriculumVitae::orderby('id','desc')->get();
       }


        return view('admin.curriculamvitae.index',compact('results'));
    }
    public function updateStatus($st,$id){
        CurriculumVitae::where('id', $id)->update(['status' => $st]);
        return Redirect::back()->withInput()->with('success', 'Record has been updated.');
    }
    public function save(Request $request){
        $data = $request->all();
        $work_experience = [];
        $langauge_grip = [];
        $previous_work = [];
        unset($data['_token']);
        if(isset($data['work_experience'])){
            $work_experience = $data['work_experience'];
            unset($data['work_experience']);
        }
        if(isset($data['langauge_grip'])){
            $langauge_grip = $data['langauge_grip'];
            unset($data['langauge_grip']);
        }
        $countryCode = $data['countryCode'];
        if(substr($data['phone'], 0, 1) === '0'){

            $phone_number = preg_replace('/^0/',$countryCode, $data['phone']);

        }elseif(substr($data['phone'], 0, strlen($countryCode)) === $countryCode){

            $phone_number = $data['phone'];

        }else{

            $phone_number = $countryCode.$data['phone'];

        }
        $data['phone'] = $phone_number;
        $data['user_id']=Auth::user()->id;
        unset($data['countryCode']);
        //dd($langauge_grip);
        if ($file = $request->file('cv')) {

            $fileName = $file->getClientOriginalName();

            $extension = $file->getClientOriginalExtension() ?: 'png';

            $folderName = '/uploads/cv/';

            $destinationPath = public_path() . $folderName;

            $safeName = rand(0000000000,999999999) . '.' . $extension;

            $file->move($destinationPath, $safeName);

            $data['cv'] = $safeName;

        }
        if(isset($data['cropper_top_img']) && !empty($data['cropper_top_img'])){
            $data['pic'] = $data['cropper_top_img'];
            unset($data['cropper_top_img']);
        }else{
            if ($file = $request->file('pic')) {

                $fileName = $file->getClientOriginalName();

                $extension = $file->getClientOriginalExtension() ?: 'png';

                $folderName = '/uploads/profile/';

                $destinationPath = public_path() . $folderName;

                $safeName = rand(0000000000,999999999) . '.' . $extension;

                $file->move($destinationPath, $safeName);

                $data['pic'] = $safeName;

            }
            unset($data['cropper_top_img']);
        }

        if ($file = $request->file('full_pic')) {

            $fileName = $file->getClientOriginalName();

            $extension = $file->getClientOriginalExtension() ?: 'png';

            $folderName = '/uploads/profile/';

            $destinationPath = public_path() . $folderName;

            $safeName = rand(0000000000,999999999) . '.' . $extension;

            $file->move($destinationPath, $safeName);

            $data['full_pic'] = $safeName;

        }
        $contract_period = $data['previous_contract'];
        $previous_country_id = $data['previous_country_id'];
        $previous_work_dec = $data['previous_employment_dec'];
        unset($data['previous_country_id']);
        unset($data['previous_contract']);
        unset($data['previous_employment_dec']);
        $CurriculumVitae = CurriculumVitae::create($data);
        if($CurriculumVitae){
            if(count($work_experience)){
                foreach($work_experience as $experince){
                    $data = [];
                    $data['work'] = $experince;
                    $data['work_status'] = 1;
                    self::save_work_experince($CurriculumVitae->id,$data);
                }
            }
            if(count($contract_period) && count($previous_country_id) && $previous_work_dec == 1) {
                foreach($contract_period as $key => $val){
                    if(empty($val)) continue;
                    $previous_work['contract_period'] = $val;
                    $previous_work['country_id'] = $previous_country_id[$key];
                    self::save_previous_work($CurriculumVitae->id,$previous_work);
                }

            }
            if(count($langauge_grip)){
                foreach($langauge_grip as $key => $val){
                    $data = [];
                    $data['language_id'] = $key;
                    $data[$val] = 1;
                    self::save_language_grip($CurriculumVitae->id,$data);
                }
            }
            $CurriculumVitae = CurriculumVitae::find($CurriculumVitae->id);
            Notification::create([
                                'cv_id' => $CurriculumVitae->id,
                                'message' => $CurriculumVitae->name.' upload cv',
                                ]);
            Mail::send('emails.cv',  ['result' => $CurriculumVitae], function ($m){
                //$m->to('seecvs22@gmail.com', 'Hello Admin');
                $m->to('zeeshanzaheer574@gmail.com', 'Hello Admin');
                $m->to('asrarulhasan@gmail.com', 'Hello Admin');
                $m->subject('New CV');

            });
        }
        return Redirect::back()->withInput()->with('success', 'Record has been created.');
    }

    public function updateCV($id,Request $request){
        CurriculamVitaeWorkExperience::where('curriculum_vitae_id',$id)->delete();
        CurriculamVitaePerviousWork::where('curriculum_vitae_id',$id)->delete();
        LanguageGrip::where('curriculum_vitae_id',$id)->delete();
        $data = $request->all();
        $work_experience = [];
        $langauge_grip = [];
        $previous_work = [];
        unset($data['_token']);
        if(isset($data['work_experience'])){
            $work_experience = $data['work_experience'];
            unset($data['work_experience']);
        }
        if(isset($data['langauge_grip'])){
            $langauge_grip = $data['langauge_grip'];
            unset($data['langauge_grip']);
        }
        // if(isset($data['previous_contract']) && !empty($data['previous_contract'])){
        //     $previous_work['contract_period'] = $data['previous_contract'];
        //     $previous_work['country_id'] = $data['previous_country_id'];
        //     unset($data['previous_country_id']);
        //     unset($data['previous_contract']);
        // }
        if(!empty($data['phone'])){
            $countryCode = $data['countryCode'];
            if(substr($data['phone'], 0, 1) === '0'){

                $phone_number = preg_replace('/^0/',$countryCode, $data['phone']);

            }elseif(substr($data['phone'], 0, strlen($countryCode)) === $countryCode){

                $phone_number = $data['phone'];

            }else{

                $phone_number = $countryCode.$data['phone'];

            }
            $data['phone'] = $phone_number;
        }else{
            unset($data['phone']);
        }

        unset($data['countryCode']);
        //dd($langauge_grip);
        if ($file = $request->file('cv')) {

            $fileName = $file->getClientOriginalName();

            $extension = $file->getClientOriginalExtension() ?: 'png';

            $folderName = '/uploads/cv/';

            $destinationPath = public_path() . $folderName;

            $safeName = rand(0000000000,999999999) . '.' . $extension;

            $file->move($destinationPath, $safeName);

            $data['cv'] = $safeName;

        }
        if(isset($data['cropper_top_img']) && !empty($data['cropper_top_img'])){
            $data['pic'] = $data['cropper_top_img'];
            unset($data['cropper_top_img']);
        }else{
            if ($file = $request->file('pic')) {

                $fileName = $file->getClientOriginalName();

                $extension = $file->getClientOriginalExtension() ?: 'png';

                $folderName = '/uploads/profile/';

                $destinationPath = public_path() . $folderName;

                $safeName = rand(0000000000,999999999) . '.' . $extension;

                $file->move($destinationPath, $safeName);

                $data['pic'] = $safeName;

            }
            unset($data['cropper_top_img']);
        }
        if ($file = $request->file('full_pic')) {

            $fileName = $file->getClientOriginalName();

            $extension = $file->getClientOriginalExtension() ?: 'png';

            $folderName = '/uploads/profile/';

            $destinationPath = public_path() . $folderName;

            $safeName = rand(0000000000,999999999) . '.' . $extension;

            $file->move($destinationPath, $safeName);

            $data['full_pic'] = $safeName;

        }
        $contract_period = $data['previous_contract'];
        $previous_country_id = $data['previous_country_id'];
        $previous_work_dec = $data['previous_employment_dec'];
        unset($data['previous_country_id']);
        unset($data['previous_contract']);
        unset($data['previous_employment_dec']);
        $CurriculumVitae = CurriculumVitae::where('id',$id)->update($data);
        if($CurriculumVitae){
            if(count($work_experience)){
                foreach($work_experience as $experince){
                    $data = [];
                    $data['work'] = $experince;
                    $data['work_status'] = 1;
                    self::save_work_experince($id,$data);
                }
            }
            if(count($contract_period) && count($previous_country_id) && $previous_work_dec == 1) {
                foreach($contract_period as $key => $val){
                    if(empty($val)) continue;
                    $previous_work['contract_period'] = $val;
                    $previous_work['country_id'] = $previous_country_id[$key];
                    self::save_previous_work($id,$previous_work);
                }

            }
           // if(count($previous_work))   self::save_previous_work($id,$previous_work);
            if(count($langauge_grip)){
                foreach($langauge_grip as $key => $val){
                    $data = [];
                    $data['language_id'] = $key;
                    $data[$val] = 1;
                    self::save_language_grip($id,$data);
                }
            }
        }
        return Redirect::back()->withInput()->with('success', 'Record has been updated.');
    }

    public static function save_previous_work($CurriculumVitae_id,$data){
        $data['curriculum_vitae_id'] = $CurriculumVitae_id;
        return CurriculamVitaePerviousWork::create($data);
    }

    public static function save_work_experince($CurriculumVitae_id,$data){
        $data['curriculum_vitae_id'] = $CurriculumVitae_id;
        return CurriculamVitaeWorkExperience::create($data);
    }
    public static function save_language_grip($CurriculumVitae_id,$data){
        $data['curriculum_vitae_id'] = $CurriculumVitae_id;
        return LanguageGrip::create($data);
    }

    public function update($id,Request $request){
        $data = $request->all();
        unset($data['_token']);
        CurriculumVitae::where('id',$id)->update($data);
        return Redirect::back()->withInput()->with('success', 'Record has been updated.');
    }
}
