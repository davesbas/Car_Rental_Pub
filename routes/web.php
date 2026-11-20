<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\PenyewaanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserProfileController;
use App\Models\Penyewaan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Login :
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionLogin', [LoginController::class, 'actionLogin'])->name('actionLogin');

//register :
Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/actionRegister', [RegisterController::class, 'actionRegister'])->name('actionRegister');
Route::get('/verify/{verify_key}', [RegisterController::class, 'verify'])->name('verify');

Route::get('logout', [LoginController::class, 'actionLogout'])->name('actionLogout')->middleware('auth');
Route::post('/updateProfile', [RegisterController::class, 'updateProfile'])->name('updateProfile');

Route::post('/updateProfilePicture', [RegisterController::class, 'updateProfilePicture'])->name('updateProfilePicture');


// Untuk fungsi CRUD dan Admin Page :
Route::resource('/user', UserController::class);
Route::resource('/kendaraan', KendaraanController::class);
Route::resource('/penyewaan', PenyewaanController::class);

Route::get('/home_admin', [UserController::class, 'count']); // To count User, Kendaraan and Penyewaan data dynamically
// --------------------------

// User Page :
Route::get('/home_user', [HomeController::class, 'index'])->name('home_user')->middleware('auth');
Route::get('/car_user', [HomeController::class, 'indexCarUser'])->name('car_user.indexCarUser');
Route::post('/car_user/{id}', [HomeController::class, 'store'])->name('car_user.store');
Route::get('/car_user/{id}', [HomeController::class, 'create'])->name('car_user.create');

Route::get('/profile_user', function () {
    return view('user/profile_user');
});

// Route::get('/car_penyewaan', function () {
//     return view('user/car_penyewaan');
// });
// --------------------------