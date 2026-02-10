<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\backend\AboutUsController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\CustomerController;
use App\Http\Controllers\backend\LocaleController;
use App\Http\Controllers\backend\NewslatestController;
use App\Http\Controllers\backend\OurTeamController;
use App\Http\Controllers\backend\ProjectController;
use App\Http\Controllers\frontend\FreelancersController;
use App\Http\Controllers\Send\ApplicationController;
use App\Http\Controllers\Send\ContactController;
use App\Models\Customer;
use App\Models\NewsLatest;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     $showAboutUs = DB::table('about_us')->get();
//     $showOurTeam = DB::table('our_team')->get();
//     $showCustomer = Customer::all();
//     $projects = Project::orderBy('created_at', 'ASC')->get();
//     return view('frontend.layout.index', compact(
//     'showAboutUs',
// 'showOurTeam',
// 'showCustomer',
// 'projects'
//     ));
// })->name('home');

Route::get('/', function () {

    $showAboutUs = DB::table('about_us')->get();
    $showOurTeam = DB::table('our_team')->orderBy('order')->get();
    $showCustomer = Customer::all();
    $projects = Project::orderBy('created_at', 'ASC')->get();

    // 🔹 Static News Data (ONE SOURCE)
    $news = NewsLatest::all();

    return view('frontend.layout.index', compact(
        'showAboutUs',
        'showOurTeam',
        'showCustomer',
        'projects',
        'news'
    ));
})->name('home');



// 🔹 News Detail Route
Route::get('/news/{id}', function ($id) {
    $newsdetails = NewsLatest::all();
    $item = collect($newsdetails)->firstWhere('id', $id);
    abort_if(!$item, 404);

    return view('frontend.page.detail-news', compact('item'));

})->name('news.show');

Route::get('/show/{slug}', function ($slug) {
    $projects = Project::where('slug', $slug)->firstOrFail();

    // ✅ Decode category ONCE
    $categories = is_array($projects->category)
        ? $projects->category
        : json_decode($projects->category ?? '[]', true);

    return view('frontend.page.show.index', compact('projects', 'categories'));
})->name('show');

// Route for switch Langage
Route::get('/lang/{lang}', action: [LocaleController::class, 'switch'])
    ->name('lang.switch');

Route::get('/freelancers', [FreelancersController::class, 'Freelancers'])->name('freelancer');

Route::post('/contact-send', [ContactController::class, 'send'])->name('contact.send');
Route::post('/application-send', [ApplicationController::class, 'send'])->name('application.send');

//=========================================== Profile View and Update=============================
Route::get('/admin/profile', [AuthController::class,'profile'])->name('profile')->middleware('auth');
Route::post('/admin/submit_profile',[AuthController::class,'submitUpdateUser'])->name('submit.update.profile');
// ==== Route Loing and Register ====
Route::get('/login',[AuthController::class,'login'])->name('login');
Route::get('/register', [AuthController::class,'register'])->name('register');
Route::post('/submit/register', [AuthController::class,'submitRegister'])->name('submit.register');
Route::post('/submit/login', [AuthController::class,'submitLogin'])->name('submit.login');
// ==== Route Logout ====
Route::get('/logout',[AuthController::class,'logout'])->name('logout');
Route::post('/submit/logout',[AuthController::class,'submitLogout'])->name('logout.submit');
                                                  

Route::middleware(['auth'])->group(function(){
    // Admin Dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin');
    Route::get('/dashboard/panel', [AdminController::class, 'welcomToAdmin'])->name('welcome');

    // ============================================ @@ Our Team ===================================================
    Route::get('/add/ourteam',[OurTeamController::class,'addOurTeam'])->name('add_team');
    Route::get('/view/ourteam', [OurTeamController::class,'viewOurTeam'])->name('view_team');
    Route::post('/submit/addteam',[OurTeamController::class,'submitAddOurTeam'])->name('submit.add.team');
    // Update our team
    Route::get('/update/team/{id}', [OurTeamController::class,'updateTeam'])->name('update.team');
    Route::post('/submit/updateteam', [OurTeamController::class,'submitToUpdateTeam'])->name('submit.update.team');

    Route::post('/team/reorder', [OurTeamController::class, 'reorder'])->name('team.reorder');

    // Remove our team
    Route::post('/remove/our_team', [OurTeamController::class,'submitToRemoveTeam'])->name('remove.our.team');
    // ============================================ @@ About Us  ===================================================
    Route::get('/add/about',[AboutUsController::class,'addAbout'])->name('add_about');
    Route::get('/view/about', [AboutUsController::class,'viewAbout'])->name('view_about');
    Route::post('/submit/about',[AboutUsController::class,'submitAddAbout'])->name('submit.add.about');
    // Update our about
    Route::get('/update/about/{id}', [AboutUsController::class,'updateAbout'])->name('update.about');
    Route::post('/submit/edit/about', [AboutUsController::class,'submitToUpdateAbout'])->name('submit.update.about');
    // Remove our about
    Route::post('/remove/about', [AboutUsController::class,'submitToRemoveAbout'])->name('remove.about');
    // ============================================ @@ Our Customer  ===================================================
    Route::resource('customer', CustomerController::class);
    Route::delete('customer/{id}/image/{index}', [CustomerController::class, 'deleteImage'])
    ->name('customer.image.delete');

    Route::resource('project', ProjectController::class)->except(['show', 'destroy']);
    Route::delete('/project/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');

    Route::resource('newslatest', NewslatestController::class);
    Route::delete('newslatest/{id}/image/{index}', [NewslatestController::class, 'deleteImage'])
    ->name('newslatest.image.delete');


});