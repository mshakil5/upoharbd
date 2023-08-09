<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ContactMailController; 
use App\Http\Controllers\Admin\HelpController; 
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\BeneficiaryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\HumanitarianAidController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Agent\AgentController;
use App\Http\Controllers\User\UserController;



/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::group(['prefix' =>'admin/', 'middleware' => ['auth', 'is_admin']], function(){
  
    //profile end
    //admin registration
    Route::get('register','App\Http\Controllers\Admin\AdminController@adminindex')->name('admin.registration');
    Route::post('register','App\Http\Controllers\Admin\AdminController@adminstore');
    Route::get('register/{id}/edit','App\Http\Controllers\Admin\AdminController@adminedit');
    Route::put('register/{id}','App\Http\Controllers\Admin\AdminController@adminupdate');
    Route::get('register/{id}', 'App\Http\Controllers\Admin\AdminController@admindestroy');
    //admin registration end
    Route::get('active-user','App\Http\Controllers\Admin\AdminController@activeuser');
    //agent registration
    Route::get('agent-register','App\Http\Controllers\Admin\AdminController@agentindex');
    Route::post('agent-register','App\Http\Controllers\Admin\AdminController@agentstore');
    Route::get('agent-register/{id}/edit','App\Http\Controllers\Admin\AdminController@agentedit');
    Route::put('agent-register/{id}','App\Http\Controllers\Admin\AdminController@agentupdate');
    Route::get('agent-register/{id}', 'App\Http\Controllers\Admin\AdminController@agentdestroy');
    // certificate update
    // Route::post('image-upload', 'App\Http\Controllers\Admin\AdminController@agentCertificateUpdate')->name('image.upload.post');
    //agent registration end
    //user registration
    Route::get('user-register','App\Http\Controllers\Admin\AdminController@userindex')->name('alluser');;
    Route::post('user-register','App\Http\Controllers\Admin\AdminController@userstore');
    Route::get('user-register/{id}/edit','App\Http\Controllers\Admin\AdminController@useredit');
    Route::put('user-register/{id}','App\Http\Controllers\Admin\AdminController@userupdate');
    Route::get('user-register/{id}', 'App\Http\Controllers\Admin\AdminController@userdestroy');
    //user registration end
    //code master 
    Route::resource('softcode','App\Http\Controllers\Admin\SoftcodeController');
    Route::resource('master','App\Http\Controllers\Admin\MasterController');
    //code master end
    //company details
    Route::resource('company-detail','App\Http\Controllers\Admin\CompanyDetailController');
    //company details end
    //slider 
    Route::resource('sliders','App\Http\Controllers\Admin\SliderController');
    Route::get('activeslider','App\Http\Controllers\Admin\SliderController@activeslider');
    //slider end
    Route::resource('seo-settings','App\Http\Controllers\Admin\SeoSettingController');


    Route::resource('role','App\Http\Controllers\RoleController');
    Route::post('roleupdate','App\Http\Controllers\RoleController@roleUpdate');
    Route::resource('staff','App\Http\Controllers\StaffController');


    // blog Category 
    Route::get('/blog-category', [BlogController::class, 'category'])->name('admin.blog_category');
    Route::post('/blog-category', [BlogController::class, 'categorystore']);
    Route::get('/blog-category/{id}/edit', [BlogController::class, 'categoryedit']);
    Route::put('/blog-category/{id}', [BlogController::class, 'categoryupdate']);
    Route::get('/blog-category/{id}', [BlogController::class, 'categorydelete']);

    // blog  
    Route::get('/blog', [BlogController::class, 'index'])->name('admin.blog');
    Route::post('/blog', [BlogController::class, 'store']);
    Route::get('/blog/{id}/edit', [BlogController::class, 'edit']);
    Route::put('/blog/{id}', [BlogController::class, 'update']);
    Route::get('/blog/{id}', [BlogController::class, 'delete']);
    


    // photo
    Route::get('/photo', [ImageController::class, 'index'])->name('admin.photo');
    Route::post('/photo', [ImageController::class, 'store']);
    Route::get('/photo/{id}/edit', [ImageController::class, 'edit']);
    Route::put('/photo/{id}', [ImageController::class, 'update']);
    Route::get('/photo/{id}', [ImageController::class, 'delete']);

    

    // help-type
    Route::get('/help-type', [HelpController::class, 'helptype'])->name('admin.helptype');
    Route::post('/help-type', [HelpController::class, 'helptypestore']);
    Route::get('/help-type/{id}/edit', [HelpController::class, 'helptypeedit']);
    Route::put('/help-type/{id}', [HelpController::class, 'helptypeupdate']);
    Route::get('/help-type/{id}', [HelpController::class, 'helptypedelete']);

    Route::get('/need-approve-donation', [DonationController::class, 'getNotApproveDonation'])->name('admin.notapprovedonation');
    Route::get('/approve-donation', [DonationController::class, 'approveDonation']);
    
    Route::get('/show-images/{id}', [ImageController::class, 'showImage'])->name('showimg');

    // service
    Route::get('/service', [ServiceController::class, 'index'])->name('admin.service');
    Route::post('/service', [ServiceController::class, 'store']);
    Route::get('/service/{id}/edit', [ServiceController::class, 'edit']);
    Route::put('/service/{id}', [ServiceController::class, 'update']);
    Route::get('/service/{id}', [ServiceController::class, 'delete']);

    
    // humanitarian-aid
    Route::get('/humanitarian-aid', [HumanitarianAidController::class, 'index'])->name('admin.humanitarianaid');
    Route::post('/humanitarian-aid', [HumanitarianAidController::class, 'store']);
    Route::get('/humanitarian-aid/{id}/edit', [HumanitarianAidController::class, 'edit']);
    Route::put('/humanitarian-aid/{id}', [HumanitarianAidController::class, 'update']);
    Route::get('/humanitarian-aid/{id}', [HumanitarianAidController::class, 'delete']);

    // contact mail 
    Route::get('/contact-mail', [ContactMailController::class, 'index'])->name('admin.contact-mail');
    Route::get('/contact-mail/{id}/edit', [ContactMailController::class, 'edit']);
    Route::put('/contact-mail/{id}', [ContactMailController::class, 'update'])->name('admin.contact.update');

    
    Route::get('/complains', [FrontendController::class, 'getAllComplain'])->name('admin.complain');
});
//admin part end

// all users part start

Route::group(['prefix' =>'admin/', 'middleware' => ['auth']], function(){


    Route::get('/dashboard', [HomeController::class, 'adminHome'])->name('admin.dashboard');

    //profile
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::put('profile/{id}', [AdminController::class, 'adminProfileUpdate']);
    Route::post('changepassword', [AdminController::class, 'changeAdminPassword']);
    Route::put('image/{id}', [AdminController::class, 'adminImageUpload']);
    
    // beneficiary  
    Route::get('/beneficiary', [BeneficiaryController::class, 'index'])->name('admin.beneficiary');
    Route::post('/beneficiary', [BeneficiaryController::class, 'store']);
    Route::get('/beneficiary/{id}/edit', [BeneficiaryController::class, 'edit']);
    Route::put('/beneficiary/{id}', [BeneficiaryController::class, 'update']);
    Route::get('/beneficiary/{id}', [BeneficiaryController::class, 'delete']);

    // donation  
    Route::get('/make-donation/{id}', [BeneficiaryController::class, 'makeDonation'])->name('admin.makedonation');
    Route::get('/beneficiary-details/{id}', [BeneficiaryController::class, 'beneficiaryDetails'])->name('admin.beneficiarydetails');
    
    Route::post('/update-beneficiary-helptype', [BeneficiaryController::class, 'changeHelpType']);


    Route::post('/donation-store', [DonationController::class, 'donation']);
    // Humanitarian Assistance

    Route::get('/humanitarian-assistance', [DonationController::class, 'humanitarianAssistance'])->name('admin.humanitarianAssistance');
    Route::post('humanitarian-assistance', [DonationController::class, 'humanitarianAssistance'])->name('humanitarianAssistance.search');

});
// all users part end