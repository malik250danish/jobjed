<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\OccupationsController;
use App\Http\Controllers\ImageCropperController;
use App\Http\Controllers\AdminFrontEndController;
use App\Http\Controllers\CurriculumVitaeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/




Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'as' => 'auth.'], function () {
	Route::get('/', [AdminFrontEndController::class, 'index']);
	Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
	# Logout
    Route::get('logout', [CustomAuthController::class, 'getLogout']);
	# # # State Settings
	Route::group(['prefix' => 'curriculamvitae'], function () {
		Route::any('/', [CurriculumVitaeController::class, 'index']);
		Route::get('connect', [CurriculumVitaeController::class, 'Connect']);
		Route::get('completed', [CurriculumVitaeController::class, 'Completed']);
		Route::get('canceled', [CurriculumVitaeController::class, 'Canceled']);
		Route::get('add', [CurriculumVitaeController::class, 'getForm']);
		Route::post('add', [CurriculumVitaeController::class, 'save']);
		Route::post('reject/{id}', [CurriculumVitaeController::class, 'reject']);
		Route::any('update/{id}', [CurriculumVitaeController::class, 'update']);
		Route::get('download/{id}', [CurriculumVitaeController::class, 'download']);
		Route::get('print/{id}', [CurriculumVitaeController::class, 'print']);
		Route::get('changestatus/{st}/{id}', [CurriculumVitaeController::class, 'updateStatus']);
		Route::get('edit/{id}', [CurriculumVitaeController::class, 'edit']);
		Route::post('edit/{id}', [CurriculumVitaeController::class, 'updateCV']);
		Route::get('{id}/{st}', [CurriculumVitaeController::class, 'acceptReject']);
	});
	Route::group(['prefix' => 'settings'], function () {
		# # # Country Settings
		Route::group(['prefix' => 'countries'], function () {
			Route::get('/', [CountryController::class, 'index']);
			Route::get('changestatus/{st}/{id}', [CountryController::class, 'updateStatus']);
		});
		# # # State Settings
		Route::group(['prefix' => 'occupations'], function () {
			Route::any('/', [OccupationsController::class, 'index']);
			Route::any('add', [OccupationsController::class, 'save']);
			Route::any('update/{id}', [OccupationsController::class, 'update']);
			Route::get('changestatus/{st}/{id}', [OccupationsController::class, 'updateStatus']);
		});
	});
	# User Management

    Route::group(array('prefix' => 'users'), function () {

       	Route::get('view/{dec}',[UsersController::class,'view']);
       	Route::get('/',[UsersController::class,'index']);
       	Route::get('data',[UsersController::class,'data']);
       	Route::any('update/{user}',[UsersController::class,'update']);
       	Route::get('todaydata',[UsersController::class,'todaydata']);
       	Route::get('monthdata',[UsersController::class,'monthdata']);
       	Route::any('create',[UsersController::class,'create']);
    	Route::post('create',[UsersController::class,'store']);
    	Route::get('{user}/delete',[UsersController::class,'destroy']);
    	Route::get('{user}/confirm-delete',[UsersController::class,'getModalDelete']);
    	Route::get('{user}/restore',[UsersController::class,'getRestore']);
    	Route::post('{user}/passwordreset',[UsersController::class,'passwordreset']);
        Route::get('show/{user}',[UsersController::class,'show']);
        Route::get('edit/{user}',[UsersController::class,'edit']);

    });

    Route::group(array('prefix'=>'company'),function(){
      Route::get('company',[CompanyController::class,'show_index']);
      Route::get('add-company',[CompanyController::class,'add_company']);
      Route::get('data',[CompanyController::class,'data']);
      Route::post('store-company',[CompanyController::class,'store'])->name('store-company');
    });

    Route::resources(['users' =>UsersController::class]);
});

Route::get('admin/cv/connect/{dec}', [FrontEndController::class, 'adminviewconnectcv']);
Route::get('admin/cv/processing/{dec}', [FrontEndController::class, 'adminviewprocessingcv']);
Route::get('admin/cv/{dec}', [FrontEndController::class, 'adminviewcv']);
Route::group(['prefix' => 'admin'], function () {
	# # # State Settings
	Route::get('login', [AdminFrontEndController::class, 'login']);
	Route::post('login', [AdminFrontEndController::class, 'dologin']);
	Route::get('/', [AdminFrontEndController::class, 'index']);
});
Route::group(array('middleware' => 'auth'), function () {
    Route::get('my-account',[FrontEndController::class, 'myAccount']);
    Route::put('my-account',[FrontEndController::class, 'update']);
	Route::get('cvconnect/{id}', [CurriculumVitaeController::class, 'cvConnect']);
});
Route::get('logout', [FrontEndController::class, 'getLogout']);
Route::get('register',[FrontEndController::class, 'getRegisterTab']);
Route::get('register/{role}',[FrontEndController::class, 'getRegister']);

Route::get('/', [FrontEndController::class, 'index']);
Route::get('guest', [FrontEndController::class, 'guest']);
Route::get('all', [FrontEndController::class, 'allCVs']);
Route::post('crop-image-upload', [ImageCropperController::class, 'uploadCropImage']);
Route::post('load_work_experience', [OccupationsController::class, 'loadWorkExperience']);
Route::post('checkRecordAlreadyExist', [CurriculumVitaeController::class, 'checkRecordAlreadyExist']);
Route::post('add_more_previous_employment', [FrontEndController::class, 'addMorePreviousEmployment']);
Route::post('getcvs', [FrontEndController::class, 'getCVS']);
Route::get('/detail/{id}', [CurriculumVitaeController::class, 'detailView']);
Route::get('/cv/{id}', [CurriculumVitaeController::class, 'openView']);
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration/{role}', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('confirm-email/{email}/{id}', [CustomAuthController::class, 'confirmEmail']);
Route::get('upload/cv', [CurriculumVitaeController::class, 'openCVform']);
Route::post('upload/cv', [CurriculumVitaeController::class, 'save']);
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
