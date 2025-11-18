<?php

use App\Http\Controllers\Admin\ProfileController as ProfileControllerAlias;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\ClarifyController;
use App\Http\Controllers\Backend\ConnectController;
use App\Http\Controllers\Backend\FeatureController;
use App\Http\Controllers\Backend\FinanceController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Backend\UsabilityController;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*Load the home page**/
Route::get('/', [HomeController::class ,'index']);


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

Route::middleware('auth')->group(function () {
            /* Group Controller with Resource*/
            Route::resources([
                'testimonials'  => TestimonialController::class,
                'features'  => FeatureController::class,
                'connects' => ConnectController::class,
            ]);

            Route::get('get-slider' , [SliderController::class, 'getSlider'])->name('get.slider');
            Route::post('update-slider' , [SliderController::class, 'updateSlider'])->name('update.slider');
            Route::post('/edit-slider/{id}' , [SliderController::class, 'editSlider']);

            Route::post('/edit-features/{id}' , [SliderController::class, 'editFeature']);
            Route::post('/edit-reviews/{id}' , [SliderController::class, 'editReview']);
            Route::post('/edit-answers/{id}' , [SliderController::class, 'editAnswer']);


            Route::get('/get-clarifies' , [ClarifyController::class, 'getClarify'])->name('get.clarifies');
            Route::post('update-clarifies' , [ClarifyController::class, 'updateClarify'])->name('update.clarifies');
            Route::post('/edit-clarify/{id}' , [ClarifyController::class, 'editClarify']);

           Route::get('/get-finances' , [FinanceController::class, 'getFinance'])->name('get.finances');
           Route::post('/update-finances' , [FinanceController::class, 'updateFinance'])->name('update.finances');
          // Route::post('/edit-finance/{id}' , [ClarifyController::class, 'editFinance']);

            Route::get('/get/usability' ,     [UsabilityController::class, 'getUsability'])->name('get.usability');
            Route::post('/update-usability' , [UsabilityController::class, 'updateUsability'])->name('update.usability');
            Route::post('/update-connect/{id}' , [ConnectController::class, 'updateConnect']);


  // Route::resource('/testimonials', TestimonialController::class);
});


require __DIR__.'/auth.php';
