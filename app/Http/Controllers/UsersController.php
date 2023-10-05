<?php namespace App\Http\Controllers;



use Illuminate\Support\Str;

use App\Http\Requests\UserRequest;

use App\Models\User;

use Carbon\Carbon;

use Cartalyst\Sentinel\Laravel\Facades\Activation;

use File;

use Hash;

use Illuminate\Http\Request;

use Lang;

use Mail;

use Redirect;

use Sentinel;

use URL;

use View;

use Datatables;

use Validator;



class UsersController extends JoshController

{



    /**

     * Show a list of all the users.

     *

     * @return View

     */

    public function index()

    {

        // Grab all the users

        $users = User::All();

        // Show the page

        return view('admin.users.index', compact('users'));

    }

    public function view($dec)

    {

        // Grab all the users

        $users = User::All();

        // Show the page

        return view('admin.users.view', compact('users','dec'));

    }



    /*

     * Pass data through ajax call

     */

    public function todaydata(Request $request)

    {
        $from = date('Y-m-d 00:00:00');
        $to = date('Y-m-d 23:59:59');
        $users = User::wherebetween('created_at',[$from,$to])
        ->get(['id', 'first_name', 'last_name', 'role_id','email','created_at']);




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
    public function monthdata(Request $request)

    {
        $from = date('Y-m-01 00:00:00');
        $to = date('Y-m-d 23:59:59');
        $users = User::wherebetween('created_at',[$from,$to])
        ->get(['id', 'first_name', 'last_name', 'role_id','email','created_at']);




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
            $users = User::wherebetween('created_at',[$from,$to])
            ->get(['id', 'first_name', 'last_name', 'role_id','email','created_at']);
        }else{
            $users = User::get(['id', 'first_name', 'last_name', 'role_id','email','created_at']);
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



    /**

     * Create new user

     *

     * @return View

     */

    public function create()

    {

        // Get all the available groups

        $groups = Sentinel::getRoleRepository()->all();



        if(count(Sentinel::getUser()->UserGroups) < 1){

            $sevenmingroup = \App\Group::get();

        }else{

            $sevenmingroup = \App\Group::join('7min_user_group as ug','ug.group_id','=','7min_group.id')->select('7min_group.*')->where('ug.user_id',Sentinel::getUser()->id)->get();

        }

        //dd($sevenmingroup);

        $countries = $this->countries;

        // Show the page

        return view('admin.users.create', compact('groups', 'countries','sevenmingroup'));

    }



    /**

     * User create form processing.

     *

     * @return Redirect

     */

    public function store(UserRequest $request)

    {

        //upload image

        if ($file = $request->file('pic_file')) {

            $fileName = $file->getClientOriginalName();

            $extension = $file->getClientOriginalExtension() ?: 'png';

            $folderName = '/uploads/users/';

            $destinationPath = public_path() . $folderName;

            $safeName = str_random(10) . '.' . $extension;

            $file->move($destinationPath, $safeName);

            $request['pic'] = $safeName;

        }

        //check whether use should be activated by default or not

        $activate = $request->get('activate') ? true : false;



        try {

            // Register the user

            $request->merge(['api_token' =>  Str::random(60)]);

            $user = Sentinel::register($request->except('_token','sevenmingroup', 'password_confirm', 'group', 'activate', 'pic_file'), $activate);



            //add user to 'User' group

            $role = Sentinel::findRoleById($request->get('group'));

            if ($role) {

                $role->users()->attach($user);



                # # # Seven Minute User Gropu Attach

                if(!empty($request->get('sevenmingroup')) && $request->get('sevenmingroup') > 0){

                   $SevenMinuteUserGroup = new \App\SevenMinuteUserGroup();

                   $SevenMinuteUserGroup->user_id  = $user->id;

                   $SevenMinuteUserGroup->group_id  = $request->get('sevenmingroup');

                   $SevenMinuteUserGroup->save();

                }

            }

            //check for activation and send activation mail if not activated by default

            if (!$request->get('activate')) {

                // Data to be used on the email view

                $data = array(

                    'user' => $user,

                    'activationUrl' => URL::route('activate', [$user->id, Activation::create($user)->code]),

                );



                // Send the activation code through email

                Mail::send('emails.register-activate', $data, function ($m) use ($user) {

                    $m->to($user->email, $user->first_name . ' ' . $user->last_name);

                    $m->subject('Welcome ' . $user->first_name);

                });

            }



            // Redirect to the home page with success menu

            return Redirect::route('admin.users.index')->with('success', Lang::get('users/message.success.create'));



        } catch (LoginRequiredException $e) {

            $error = Lang::get('admin/users/message.user_login_required');

        } catch (PasswordRequiredException $e) {

            $error = Lang::get('admin/users/message.user_password_required');

        } catch (UserExistsException $e) {

            $error = Lang::get('admin/users/message.user_exists');

        }



        // Redirect to the user creation page

        return Redirect::back()->withInput()->with('error', $error);

    }



    /**

     * User update.

     *

     * @param  int $id

     * @return View

     */

    public function edit(User $user = null)

    {

        // Get this user groups



        //$userRoles = $user->getRoles()->pluck('name', 'id')->all();
        $userRoles = [];

        // Get a list of all the available groups

        $roles = Sentinel::getRoleRepository()->all();



       // $status = Activation::completed($user);

        $status = true;

        $countries = $this->countries;



        // Show the page

        return view('admin.users.edit', compact('user', 'roles', 'userRoles', 'countries', 'status'));

    }



    /**

     * User update form processing page.

     *

     * @param  User $user

     * @param UserRequest $request

     * @return Redirect

     */

    public function update($user,Request $request)

    {
        $user = User::find($user);
        if($request->has('pic_file')) {

            $rules = array(

                'pic_file' => 'image|mimes:jpg,jpeg,bmp,png',

            );



            $validator = Validator::make($request->only('pic_file'), $rules);



            if ($validator->fails()) {

                return Redirect::back()

                    ->withInput()->withErrors($validator);

            }

        }

        try {

            $user->first_name = $request->get('first_name');

            $user->last_name = $request->get('last_name');

            $user->email = $request->get('email');

            $user->gender = $request->get('gender');

            $user->city = $request->get('city');



            if ($password = $request->has('password')) {

                $user->password = Hash::make($request->password);

            }





            // is new image uploaded?

            if ($file = $request->file('pic_file')) {

                $extension = $file->getClientOriginalExtension() ?: 'png';

                $folderName = '/uploads/users/';

                $destinationPath = public_path() . $folderName;

                $safeName = str_random(10) . '.' . $extension;

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

                $success = Lang::get('users/message.success.update');



                // Redirect to the user page

                return Redirect::back()->with('success', $success);

            }



            // Prepare the error message

            $error = Lang::get('users/message.error.update');

        } catch (UserNotFoundException $e) {

            // Prepare the error message

            $error = Lang::get('users/message.user_not_found', compact('user'));

            // Redirect to the user management page

            return Redirect::route('admin.users.index')->with('error', $error);

        }



        // Redirect to the user page

        return Redirect::back()->withInput()->with('error', $error);

    }



    /**

     * Show a list of all the deleted users.

     *

     * @return View

     */

    public function getDeletedUsers()

    {

        // Grab deleted users

        $users = User::onlyTrashed()->get();



        // Show the page

        return view('admin.deleted_users', compact('users'));

    }





    /**

     * Delete Confirm

     *

     * @param   int $id

     * @return  View

     */

    public function getModalDelete($id = null)

    {

        $model = 'users';

        $confirm_route = $error = null;

        try {

            // Get user information

            $user = Sentinel::findById($id);



            // Check if we are not trying to delete ourselves

            if ($user->id === Sentinel::getUser()->id) {

                // Prepare the error message

                $error = Lang::get('users/message.error.delete');



                return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));

            }

        } catch (UserNotFoundException $e) {

            // Prepare the error message

            $error = Lang::get('users/message.user_not_found', compact('id'));

            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));

        }

        $confirm_route = route('admin.users.delete', ['id' => $user->id]);

        return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));

    }



    /**

     * Delete the given user.

     *

     * @param  int $id

     * @return Redirect

     */

    public function destroy($id = null)

    {

        try {

            // Get user information

            $user = Sentinel::findById($id);



            // Check if we are not trying to delete ourselves

            if ($user->id === Sentinel::getUser()->id) {

                // Prepare the error message

                $error = Lang::get('admin/users/message.error.delete');



                // Redirect to the user management page

                return Redirect::route('admin.users.index')->with('error', $error);

            }



            // Delete the user

            //to allow soft deleted, we are performing query on users model instead of Sentinel model

            //$user->delete();

            User::destroy($id);



            // Prepare the success message

            $success = Lang::get('users/message.success.delete');



            // Redirect to the user management page

            return Redirect::route('admin.users.index')->with('success', $success);

        } catch (UserNotFoundException $e) {

            // Prepare the error message

            $error = Lang::get('admin/users/message.user_not_found', compact('id'));



            // Redirect to the user management page

            return Redirect::route('admin.users.index')->with('error', $error);

        }

    }



    /**

     * Restore a deleted user.

     *

     * @param  int $id

     * @return Redirect

     */

    public function getRestore($id = null)

    {

        try {

            // Get user information

            $user = User::withTrashed()->find($id);



            // Restore the user

            $user->restore();



            // create activation record for user and send mail with activation link

            $data = array(

                'user' => $user,

                'activationUrl' => URL::route('activate', [$user->id, Activation::create($user)->code]),

            );



            // Send the activation code through email

            Mail::send('emails.register-activate', $data, function ($m) use ($user) {

                $m->to($user->email, $user->first_name . ' ' . $user->last_name);

                $m->subject('Dear ' . $user->first_name . '! Active your account');

            });





            // Prepare the success message

            $success = Lang::get('users/message.success.restored');



            // Redirect to the user management page

            return Redirect::route('admin.deleted_users')->with('success', $success);

        } catch (UserNotFoundException $e) {

            // Prepare the error message

            $error = Lang::get('users/message.user_not_found', compact('id'));



            // Redirect to the user management page

            return Redirect::route('admin.deleted_users')->with('error', $error);

        }

    }



    /**

     * Display specified user profile.

     *

     * @param  int $id

     * @return Response

     */

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

            return Redirect::route('admin.users.index')->with('error', $error);

        }



        // Show the page

        return view('admin.users.show', compact('user'));



    }



    public function passwordreset($id, Request $request)

    {

        $data = $request->all();

        $user = Sentinel::findUserById($id);

        $password = $request->get('password');

        $user->password = Hash::make($password);

        $user->save();

    }



    public function lockscreen($id){

        $user = Sentinel::findUserById($id);

        return view('admin.lockscreen',compact('user'));

    }



    public function postLockscreen(Request $request){

        $password = Sentinel::getUser()->password;

        if(Hash::check($request->password,$password)){

            return 'success';

        }

        else{

            return 'error';

        }

    }







}

