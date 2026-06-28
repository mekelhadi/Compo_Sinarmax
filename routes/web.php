<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GoogleController;

// ADMIN CONTROLLERS
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CompanyAboutController;
use App\Http\Controllers\CompanyStatisticController;
use App\Http\Controllers\OurPrincipleController;
use App\Http\Controllers\OurTeamController;
use App\Http\Controllers\ProjectClientController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\HeroSectionController;
use App\Http\Controllers\Admin\ContentController;

/*
|--------------------------------------------------------------------------
| FRONTEND ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/team', [FrontController::class, 'team'])->name('front.team');
Route::get('/about', [FrontController::class, 'about'])->name('front.about');
Route::get('/appointment', [FrontController::class, 'appointment'])->name('front.appointment');
Route::get('/ourservice', [FrontController::class, 'ourservice'])->name('front.ourservice');
Route::get('/news', [FrontController::class, 'news'])->name('front.news');
Route::get('/products', [FrontController::class, 'products'])->name('front.products');

Route::post('/appointment/store', [FrontController::class, 'appointment_store'])
    ->name('front.appointment_store');

Route::get('/news/details1', [FrontController::class, 'news_details1'])->name('front.news_details1');
Route::get('/news/details2', [FrontController::class, 'news_details2'])->name('front.news_details2');
Route::get('/news/details3', [FrontController::class, 'news_details3'])->name('front.news_details3');

/*
|--------------------------------------------------------------------------
| LANGUAGE SWITCH
|--------------------------------------------------------------------------
*/

Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['id', 'en'])) {
        return redirect()->back()->withCookie(cookie()->forever('locale', $locale));
    }
    return redirect()->back();
})->name('lang.switch');

/*
|--------------------------------------------------------------------------
| GOOGLE LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/auth/google', [GoogleController::class, 'redirect'])->name('google.redirect');
Route::get('/auth/google/callback', [GoogleController::class, 'callback'])->name('google.callback');

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | PROFILE
    |--------------------------------------------------------------------------
    */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /*
    |--------------------------------------------------------------------------
    | ADMIN ROUTES
    |--------------------------------------------------------------------------
    */

    Route::prefix('admin')->name('admin.')->group(function () {

        Route::resource('products', ProductController::class)
            ->middleware('can:manage products');

        Route::resource('statistics', CompanyStatisticController::class)
            ->middleware('can:manage statistics');

        Route::resource('principles', OurPrincipleController::class)
            ->middleware('can:manage principles');

        Route::resource('testimonials', TestimonialController::class)
            ->middleware('can:manage testimonials');

        Route::resource('clients', ProjectClientController::class)
            ->middleware('can:manage clients');

        Route::resource('teams', OurTeamController::class)
            ->middleware('can:manage teams');

        Route::resource('abouts', CompanyAboutController::class)
            ->middleware('can:manage abouts');

        Route::resource('appointments', AppointmentController::class)
            ->middleware('can:manage appointments');

        // ⚠️ FIX: hindari spasi di permission
        Route::resource('hero_sections', HeroSectionController::class)
            ->middleware('can:manage hero_sections');

        Route::prefix('contents')->name('contents.')->group(function () {
            Route::get('/', [ContentController::class, 'index'])->name('index');
            Route::get('/create', [ContentController::class, 'create'])->name('create');
            Route::post('/', [ContentController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [ContentController::class, 'edit'])->name('edit');
            Route::put('/{id}', [ContentController::class, 'update'])->name('update');
            Route::delete('/{id}', [ContentController::class, 'destroy'])->name('destroy');
            Route::post('/upload-image', [ContentController::class, 'uploadImage'])->name('upload-image');
        })->middleware('can:manage contents');
    });
});

require __DIR__.'/auth.php';