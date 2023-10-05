<?php

namespace App\Http\Controllers;

use App\Group;
use App\Models\User;
use App\Models\Country;
use Datatables;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Redirect;
use Cartalyst\Sentinel\Native\Facades\Sentinel;


class CompanyController extends Controller
{
    public function show($id)

    {

        try {

            // Get the user information

            $user = Sentinel::findUserById($id);



            //get country name

            if ($user->country) {

                $user->country = $this->countries[$user->country];

            }



        } catch (UserNotFoundException $e) {

            // Prepare the error message

            $error = Lang::get('users/message.user_not_found', compact('id'));



            // Redirect to the user management page

            return Redirect::route('admin.company.index')->with('error', $error);

        }



        // Show the page

        return view('admin.company.show', compact('user'));



    }
    public function show_index(){
        $user=User::where('role_id','=',4)->get();

        return view('admin.company.index',compact('user'));
    }

    public function data(Request $request)

    {
        if($request->has('dec')){
            $dec = $request->get('dec');
            if($dec == 'today'){
                $from = date('Y-m-d 00:00:00');
            }elseif($dec == 'month'){
                $from = date('Y-m-01 00:00:00');
            }elseif($dec == 'all'){
                $from = date('2020-01-01 00:00:00');
            }
            $to = date('Y-m-d 23:59:59');
            $users = User::wherebetween('created_at',[$from,$to])->where('role_id','=',4)
            ->get(['id', 'first_name', 'last_name', 'role_id','email','created_at']);
        }else{
            $users = User::where('role_id','=',4)->get(['id', 'first_name', 'last_name', 'role_id','email','created_at']);
        }




        return Datatables::of($users)

            ->editColumn('created_at',function(User $user) {

                return $user->created_at->diffForHumans();

            })

            ->addColumn('status',function($user){

                return 'Activated';



            })

             ->addColumn('groups',function($user){


                if($user->role_id == 1){
                    return 'Admin';
                }elseif($user->role_id == 1){
                    return 'Employer';
                }elseif($user->role_id == 4){
                    return 'Company';
                }else{
                    return 'Worker';
                }

            })

            ->addColumn('actions',function($user) {

                $actions = '<a href='. url('admin/users/show/'.$user->id) .'><i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i></a>';

               // $actions .= '<a href='. url('admin/users/edit/'.$user->id) .'><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="update user"></i></a>';

                if ($user->id != 1) {

                    $actions .= '<a href='. url('admin/users/confirm-delete/'.$user->id) .' data-toggle="modal" data-target="#delete_confirm"><i class="livicon" data-name="user-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete user"></i></a>';

                }

                return $actions;

            })

            ->rawColumns(['actions'])

            ->make(true);

    }
    public function add_company()

    {

        // Get all the available groups

        $groups = Sentinel::getRoleRepository()->all();




        // if(count(Sentinel::getUser()->UserGroups) < 1){

        //     $sevenmingroup = Group::get();

        // }else{

        //     $sevenmingroup = \App\Group::join('7min_user_group as ug','ug.group_id','=','7min_group.id')->select('7min_group.*')->where('ug.user_id',Sentinel::getUser()->id)->get();

        // }

        //dd($sevenmingroup);


      $countries=Country::get();
        // Show the page

        return view('admin.company.create', compact('groups','countries'));

    }
    public function store(Request $request)
    {
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name=$request->last_name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->phone=$request->phone;
        $user->city=$request->email;
        $user->role_id=4;
        $user->gender=$request->gender;
        if ($file = $request->file('pic_file')) {

            $extension = $file->getClientOriginalExtension() ?: 'png';

            $folderName = '/uploads/users/';

            $destinationPath = public_path() . $folderName;

            $safeName = Str::random(10) . '.' . $extension;

            $file->move($destinationPath, $safeName);

            //delete old pic if exists
            if (File::exists(public_path($folderName . $user->pic))) {
                File::delete(public_path($folderName . $user->pic));
            }




            //save new file path into db

            $user->pic = $safeName;


            $user->save();
            return redirect()->back();
        }

        $user->save();
        return redirect()->back();

    }
}
