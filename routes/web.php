<?php

use App\Http\Controllers\Admin\ProfileController as ProfileControllerAlias;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


});

Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

/**2FA**/
Route::post('/admin/login',  [AdminController::class, 'AdminLogin2FA'])->name('admin.login');
Route::get('/verify',  [AdminController::class, 'ShowVerification'])->name('custom.verification.form');
Route::post('/verify',  [AdminController::class, 'VerificationVerify'])->name('custom.verification.verify');

/**BREEZE*/
//Route::get('/admin/login',  [AdminController::class, 'AdminLogin'])->name('admin.login');

/**Admin Profile*/

Route::middleware('auth')->group(function () {

Route::get('/profile',  [ProfileControllerAlias::class, 'profile'])->name('admin.profile');
Route::post('/profile/store',  [ProfileControllerAlias::class, 'store'])->name('profile.store');
Route::post('/admin/password/store',  [ProfileControllerAlias::class, 'update'])->name('admin.password.update');
});

require __DIR__.'/auth.php';
