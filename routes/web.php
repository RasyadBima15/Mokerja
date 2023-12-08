<?php

// use App\Http\Controllers\admin\DashboardController;

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\pelamar\PelamarController;
use App\Http\Controllers\penyedia\PenyediaController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

//admin
Route::get('/admin/login', function () {
    return view('/admin/login');
})->middleware('guestAdmin')->name('adminLogin');
Route::post('/admin/login', [LoginController::class, 'authenticateAdmin'])->name("authenticate");
Route::get('/admin/dashboard', [DashboardController::class, 'viewDashboard'])->middleware('authAdmin')->name('adminDashboard');
Route::get('/admin/dashboardPenyedia', [DashboardController::class, 'viewPenyedia'])->middleware('authAdmin')->name('adminDashboardPenyedia');
Route::get('/admin/dashboardPelamar', [DashboardController::class, 'viewPelamar'])->middleware('authAdmin')->name('adminDashboardPelamar');
Route::get('/admin/dashboard/add/penyedia', function () {
    return view('admin.view.add.addPenyedia');
})->middleware('authAdmin')->name('addPenyediaView');
Route::get('/admin/dashboard/add/pelamar', function () {
    return view('admin.view.add.addPelamar');
})->middleware('authAdmin')->name('addPelamarView');
Route::post('/admin/addPenyedia', [DashboardController::class, 'addPenyedia'])->middleware('authAdmin')->name('addPenyedia');
Route::post('/admin/addPelamar', [DashboardController::class, 'addPelamar'])->middleware('authAdmin')->name('addPelamar');
Route::post('/admin/deleteUser/{userId}', [DashboardController::class, 'deleteUser'])->middleware('authAdmin')->name('deleteUser');
Route::get('/admin/logout', [LoginController::class, 'logout'])->middleware('authAdmin')->name('logout');
Route::get('/admin/dashboard/edit/{id}', [DashboardController::class, 'viewEdit'])->middleware('authAdmin')->name('viewEdit');
Route::get('/admin/dashboard/editPenyedia/{id}', [DashboardController::class, 'viewEditPenyedia'])->middleware('authAdmin')->name('viewPenyedia');
Route::get('/admin/dashboard/editPelamar/{id}', [DashboardController::class, 'viewEditPelamar'])->middleware('authAdmin')->name('viewEditPelamar');
Route::post('/admin/dashboard/edit/{id}', [DashboardController::class, 'editUser'])->middleware('authAdmin')->name('editUser');
Route::get('/admin/dashboard/backPenyedia', [DashboardController::class, 'backPenyedia'])->middleware('authAdmin')->name('backPenyedia');
Route::get('/admin/dashboard/backPelamar', [DashboardController::class, 'backPelamar'])->middleware('authAdmin')->name('backPelamar');

//login&Register
Route::get('/login', function () {
    return view('login&Register.login');
})->middleware('guest')->name('login');
Route::get('/register', function () {
    return view('login&Register.register');
})->middleware('guest')->name('register');
Route::get('/forgotPassword', function () {
    return view('login&Register.forgotPassword');
})->middleware('guest')->name('forgotPassword');
Route::post('/registerUser', [LoginController::class, 'register'])->middleware('guest')->name("registerData");
Route::post('/loginUser', [LoginController::class, 'authenticateUser'])->middleware('guest')->name("authenticateUser");

//penyedia
Route::get('/penyedia/homepage/listJobs', [PenyediaController::class, 'viewHomepage'])->middleware('authUser')->name('penyediaHomepage');
Route::get('/logout', [PenyediaController::class, 'logout'])->middleware('authUser')->name('penyediaLogout');
Route::get('/penyedia/homepage/createJob', [PenyediaController::class, 'viewCreate'])->middleware('authUser')->name('viewCreate');
Route::post('/penyedia/homepage/postJob', [PenyediaController::class, 'postJob'])->middleware('authUser')->name('postJob');
Route::get('/penyedia/edit/{id}', [PenyediaController::class, 'editView'])->middleware('authUser')->name('editView');
Route::post('/penyedia/homepage/editJob/{id}', [PenyediaController::class, 'editJob'])->middleware('authUser')->name('editJob');
Route::post('/penyedia/homepage/deleteJob/{id}', [PenyediaController::class, 'deleteJob'])->middleware('authUser')->name('deleteJob');
Route::get('/penyedia/homepage/getDetailJob/{id}', [PenyediaController::class, 'getDetailJob'])->middleware('authUser')->name('getDetailJob');
Route::get('/penyedia/homepage/getApplicants/{id}', [PenyediaController::class, 'getApplicants'])->middleware('authUser')->name('getApplicants');
Route::post('/penyedia/homepage/deleteApplicants/{id}', [PenyediaController::class, 'deleteApplicants'])->middleware('authUser')->name('deleteApplicants');
Route::get('/penyedia/homepage/getDetailApplicants/{profileId}/{job_pelamarId}', [PenyediaController::class, 'getDetailApplicants'])->middleware('authUser')->name('getDetailApplicants');
Route::post('/homepage/downloadPDF/{id}', [PenyediaController::class, 'downloadPDF'])->middleware('authUser')->name('downloadPDF');
Route::get('/penyedia/homepage/accept/{id}', [PenyediaController::class, 'acceptApplicant'])->middleware('authUser')->name('acceptApplicant');
Route::get('/penyedia/homepage/reject/{id}', [PenyediaController::class, 'rejectApplicant'])->middleware('authUser')->name('rejectApplicant');



//pelamar
Route::get('/homepage', [PelamarController::class, 'viewHomepage'])->middleware('authUser')->name('pelamarHomepage');
Route::post('/pelamar/logout', [PelamarController::class, 'logout'])->middleware('authUser')->name('logoutPelamar');
Route::post('/homepage/search', [PelamarController::class, 'viewHomepage'])->middleware('authUser')->name('search');
Route::get('/homepage/getDetailJob/{id}', [PelamarController::class, 'getDetailJobtoPelamar'])->middleware('authUser')->name('getDetailJobtoPelamar');
Route::get('/homepage/pelamarDashboard/{id}', [PelamarController::class, 'pelamarDashboard'])->middleware('authUser')->name('pelamarDashboard');
Route::post('/homepage/postProfile', [PelamarController::class, 'postProfile'])->middleware('authUser')->name('postProfile');
Route::post('/homepage/apply/{id}', [PelamarController::class, 'apply'])->middleware('authUser')->name('apply');
