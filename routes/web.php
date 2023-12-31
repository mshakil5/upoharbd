<?php

use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\BeneficiaryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// cache clear
Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cleared!";
 });
//  cache clear

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home-page', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/', [FrontendController::class, 'index'])->name('homepage');
Route::get('/about', [FrontendController::class, 'about'])->name('frontend.about');
Route::get('/contact', [FrontendController::class, 'contact'])->name('frontend.contact');
Route::get('/country', [FrontendController::class, 'country'])->name('frontend.country');
Route::get('/blog', [FrontendController::class, 'blog'])->name('frontend.blog');
Route::get('/blog/{id}', [FrontendController::class, 'blogDetails'])->name('blogdtl');


Route::get('/service/{name}', [FrontendController::class, 'serviceDetails'])->name('frontend.servicedetails');
Route::get('/service-download/{id}', [FrontendController::class, 'serviceDownload'])->name('service.download');


Route::get('/help/{name}', [FrontendController::class, 'helpDetails'])->name('help.details');
Route::get('/help-download/{id}', [FrontendController::class, 'helpDownload'])->name('help.download');

Route::get('/disaster-download/{id}', [FrontendController::class, 'disasterDownload'])->name('disaster.download');
Route::get('/form-download/{id}', [FrontendController::class, 'formDownload'])->name('form.download');

Route::get('/beneficiary-print/{id}', [BeneficiaryController::class, 'printBeneficiary'])->name('admin.beneficiary.print');

Route::post('/complain-store', [FrontendController::class, 'complainStore'])->name('contact.store');


/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::group(['prefix' =>'user/', 'middleware' => ['auth', 'is_user']], function(){
  
    Route::get('user-dashboard', [HomeController::class, 'userHome'])->name('user.dashboard');
});
  
/*------------------------------------------
--------------------------------------------
All Agent Routes List
--------------------------------------------
--------------------------------------------*/
Route::group(['prefix' =>'agent/', 'middleware' => ['auth', 'is_agent']], function(){
  
    Route::get('agent-dashboard', [HomeController::class, 'agentHome'])->name('agent.dashboard');
});
  

