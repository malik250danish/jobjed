<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Mail;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{

    public function index()
    {
        return view('login');
        //return view('auth.login');
    }  
     
    public function getLogout()

    {

        // Log the user out

        Auth::logout();



        // Redirect to the users page

        return redirect('admin/login');
       // return redirect('admin/login')->with('success', 'You have successfully logged out!');

    } 

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email',$request->get('email'))->first();
        if($user && $user->is_activated == 0){
            return redirect("login")->withError('Your email is not confirmed,please verify your email.');
        }
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
            return redirect()->intended('/')->withSuccess('Signed in');
        }
  
        return redirect("/")->withError('Login details are not valid');
    }



    public function registration()
    {
        return view('auth.registration');
    }
      
    public function confirmEmail($email,$id){
        $user = User::find($id);
        if($email == $user->email){
            if($user->is_activated == 1){
                return redirect("/")->withSuccess('Thanks your email is already confirmed, now you are enable to login.');
            }
            $user->is_activated = 1;
            $user->activated_at = date('Y-m-d H:i:s');
            $user->save();
            return redirect("/")->withSuccess('Your email is confirmed, now you are enable to login.');
        }
        return redirect("my-account")->withError('Mismatched email.');
    }
    public function customRegistration(Request $request,$role)
    {  
        $data = $request->all();
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        $countryCode = $data['countryCode'];
        if(substr($data['phone'], 0, 1) === '0'){ 
            $phone_number = preg_replace('/^0/',$countryCode, $data['phone']);
        }elseif(substr($data['phone'], 0, strlen($countryCode)) === $countryCode){
            $phone_number = $data['phone'];
        }else{
            $phone_number = $countryCode.$data['phone'];
        }
        $data['phone'] = $phone_number; 
        unset($data['countryCode']);
        $check = $this->create($data,$role);
        if($check == true){
            $user = User::find($check->id); 
            $data = array(

                'user' => $user,
                'activationUrl' => url('confirm-email/'.$user->email.'/'.$user->id),

            );
            // Send the activation code through email

            Mail::send('emails.register-activate', $data, function ($m) use ($user) {
                $m->to($user->email, $user->first_name . ' ' . $user->last_name);
                $m->subject('Welcome ' . $user->first_name);
            });

            return redirect("/")->withSuccess('Verification email sent, please confirm your mail.');
            //return redirect("my-account")->withSuccess('You have signed-in');
        }else{
            return redirect()->back()->withError('Something went wrong');
        }
        
    }


    public function create(array $data,$role)
    {
        unset($data['_token']);
        unset($data['subscribed']);
        $role_id = 3;
        if($role == 'admin'){
            $role_id = 1;
        }
        if($role == 'employer'){
            $role_id = 2;
        }
        $data['role_id'] = $role_id;
        $data['password'] = Hash::make($data['password']);
        return User::create($data);
    }    
    

    public function dashboard()
    {
        // if(Auth::check()){
        //     return view('dashboard');
        // }
        return view('dashboard');
        //return redirect("login")->withSuccess('You are not allowed to access');
    }
    

    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('/');
    }
}